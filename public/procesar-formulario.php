<?php
// public/procesar-formulario.php — Paso 2 (con acuse y reCAPTCHA)
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', '0');
header('Content-Type: application/json; charset=UTF-8');

$root = dirname(__DIR__);
require_once $root . '/lib/Csrf.php';
require_once $root . '/lib/Mailer.php';

$configPath = $root . '/config/mail.php';
if (!file_exists($configPath)) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Configuración no encontrada.']);
    exit;
}
$config = require $configPath;

use FUPESE\Security\Csrf;
use FUPESE\Mail\Mailer;

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['ok' => false, 'error' => 'Método no permitido.']);
        exit;
    }

    Csrf::validate($_POST['csrf_token'] ?? '');

    // reCAPTCHA (opcional pero recomendado)
    $rec = $config['recaptcha'] ?? [];
    $recSecret = $rec['secret'] ?? '';
    $recVersion = strtolower($rec['version'] ?? 'v2');
    $captchaToken = $_POST['g-recaptcha-response'] ?? ($_POST['captcha_token'] ?? '');
    if (!empty($recSecret)) {
        $ok = verifyRecaptcha($recSecret, $captchaToken, $recVersion, (float)($rec['min_score'] ?? 0.5));
        if (!$ok) {
            throw new \RuntimeException('Captcha inválido.');
        }
    }

    // Rate limit (sencillo)
    session_start();
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $key = 'fupese_rate_' . sha1($ip);
    $now = time();
    $window = 15 * 60;
    $maxReq = 5;
    $_SESSION[$key] = array_values(array_filter(($_SESSION[$key] ?? []), fn($t) => ($now - $t) < $window));
    if (count($_SESSION[$key]) >= $maxReq) {
        http_response_code(429);
        echo json_encode(['ok' => false, 'error' => 'Demasiados intentos, inténtalo más tarde.']);
        exit;
    }

    // Inputs
    $nombre   = trim((string)($_POST['nombre'] ?? ''));
    $correo   = trim((string)($_POST['correo'] ?? ''));
    $telefono = trim((string)($_POST['telefono'] ?? ''));
    $mensaje  = trim((string)($_POST['mensaje'] ?? ''));

    if ($nombre === '' || $correo === '' || $mensaje === '') {
        throw new \RuntimeException('Por favor completa los campos requeridos.');
    }
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        throw new \RuntimeException('Correo inválido.');
    }
    if (mb_strlen($nombre) > 120 || mb_strlen($correo) > 180 || mb_strlen($telefono) > 40) {
        throw new \RuntimeException('Datos demasiado largos.');
    }
    if (mb_strlen($mensaje) > 5000) {
        throw new \RuntimeException('Mensaje excede el límite.');
    }

    $mailer = new Mailer($config);
    $result = $mailer->sendContactWithAck([
        'nombre' => $nombre,
        'correo' => $correo,
        'telefono' => $telefono,
        'mensaje' => $mensaje,
    ]);

    $_SESSION[$key][] = $now;

    echo json_encode([
        'ok' => true,
        'message' => 'Mensaje enviado. Revisa tu correo para el acuse de recibo.',
        'admin_ok' => (bool)$result['admin_ok'],
        'ack_ok'   => (bool)$result['ack_ok']
    ]);

} catch (\Throwable $e) {
    error_log('[FUPESE] Form error: ' . $e->getMessage());
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'No se pudo procesar tu solicitud.']);
    exit;
}

// Verifica reCAPTCHA (v2 checkbox o v3)
function verifyRecaptcha(string $secret, string $token, string $version='v2', float $minScore=0.5): bool {
    if (!$token) { return false; }
    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    $post = http_build_query(['secret'=>$secret,'response'=>$token, 'remoteip'=>($_SERVER['REMOTE_ADDR'] ?? null)]);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $post,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
    ]);
    $raw = curl_exec($ch);
    if ($raw === false) { return false; }
    $data = json_decode($raw, true);
    if (!$data || empty($data['success'])) { return false; }

    if ($version === 'v3') {
        $score = (float)($data['score'] ?? 0.0);
        return $score >= $minScore;
    }
    return true; // v2 con success=true
}
