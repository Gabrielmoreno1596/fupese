<?php
// lib/Csrf.php (copiado para paso 2)
namespace FUPESE\Security;
class Csrf {
    public static function init(): void {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            @ini_set('session.cookie_httponly', '1');
            @ini_set('session.cookie_samesite', 'Lax');
            session_start();
        }
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        if (!isset($_SESSION['csrf_time'])) {
            $_SESSION['csrf_time'] = time();
        }
    }
    public static function token(): string {
        self::init();
        return $_SESSION['csrf_token'];
    }
    public static function field(): string {
        $t = htmlspecialchars(self::token(), ENT_QUOTES, 'UTF-8');
        return '<input type="hidden" name="csrf_token" value="'.$t.'">';
    }
    public static function validate(?string $token, int $ttlSeconds = 7200): void {
        self::init();
        if (!$token || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
            http_response_code(400);
            throw new \RuntimeException('CSRF token inválido.');
        }
        if (!empty($_SESSION['csrf_time']) && (time() - $_SESSION['csrf_time']) > $ttlSeconds) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $_SESSION['csrf_time'] = time();
            http_response_code(400);
            throw new \RuntimeException('CSRF token expirado. Recarga el formulario.');
        }
    }
}
