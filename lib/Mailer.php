<?php
// lib/Mailer.php — Paso 2 (admin + acuse al visitante)
namespace FUPESE\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

class Mailer {
    private array $smtp;
    private array $mail;
    private array $dkim;
    private PHPMailer $m;

    public function __construct(array $config) {
        $this->smtp = $config['smtp'] ?? [];
        $this->mail = $config['mail'] ?? [];
        $this->dkim = $config['dkim'] ?? [];

        // Composer autoload typical path
        $vendor = __DIR__ . '/../vendor/autoload.php';
        if (is_file($vendor)) { require_once $vendor; }
        $vendor2 = __DIR__ . '/../../vendor/autoload.php';
        if (is_file($vendor2)) { require_once $vendor2; }

        $this->m = new PHPMailer(true);
        $this->configure();
    }

    private function configure(): void {
        $m = $this->m;
        $m->CharSet = 'UTF-8';
        $m->isSMTP();
        $m->Host       = $this->smtp['host']   ?? 'localhost';
        $m->SMTPAuth   = true;
        $m->Username   = $this->smtp['user']   ?? '';
        $m->Password   = $this->smtp['pass']   ?? '';
        $m->Port       = (int)($this->smtp['port'] ?? 587);
        $secure        = strtolower((string)($this->smtp['secure'] ?? 'tls'));
        $m->SMTPSecure = ($secure === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $m->Timeout    = 20;

        $fromEmail = $this->mail['from_email'] ?? 'no-reply@fupese.com';
        $fromName  = $this->mail['from_name']  ?? 'FUPESE';
        $m->setFrom($fromEmail, $fromName);

        // Envelope sender/Return-Path para rebotes (si tu hosting lo permite)
        if (method_exists($m, 'Sender')) {
            $m->Sender = $fromEmail;
        }

        // DKIM opcional
        if (!empty($this->dkim['private_key_path']) && is_file($this->dkim['private_key_path'])) {
            $m->DKIM_domain = $this->dkim['domain'] ?? '';
            $m->DKIM_selector = $this->dkim['selector'] ?? '';
            $m->DKIM_private = file_get_contents($this->dkim['private_key_path']);
            $m->DKIM_passphrase = $this->dkim['passphrase'] ?? '';
            $m->DKIM_identity = $fromEmail;
        }
    }

    /**
     * Envía notificación al buzón institucional y acuse al visitante.
     * @param array $data ['nombre','correo','telefono','mensaje']
     * @return array ['admin_ok'=>bool,'ack_ok'=>bool]
     */
    public function sendContactWithAck(array $data): array {
        $nombre   = $this->clip($data['nombre'] ?? '', 120);
        $correo   = $this->clip($data['correo'] ?? '', 180);
        $telefono = $this->clip($data['telefono'] ?? '', 40);
        $mensaje  = $this->clip($data['mensaje'] ?? '', 5000);

        // 1) Admin notification
        $adminOk = false;
        try {
            $m = clone $this->m;
            $toEmail = $this->mail['to_email'] ?? '';
            $toName  = $this->mail['to_name']  ?? 'Contacto FUPESE';
            if ($toEmail) { $m->addAddress($toEmail, $toName); }
            if (!empty($this->mail['bcc_email'])) {
                $m->addBCC($this->mail['bcc_email']);
            }
            if ($correo && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $m->addReplyTo($correo, $nombre ?: $correo);
            }
            $m->Subject = 'Nuevo formulario recibido — Sitio FUPESE';
            $body = $this->renderAdminText($nombre, $correo, $telefono, $mensaje);
            $m->isHTML(false);
            $m->Body = $body;
            $m->AltBody = $body;
            $adminOk = $m->send();
        } catch (\Throwable $e) {
            error_log('[FUPESE] Admin mail error: ' . $e->getMessage());
        }

        // 2) Acknowledgement to visitor
        $ackOk = false;
        if ($correo && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            try {
                $ack = clone $this->m;
                $ack->addAddress($correo, $nombre ?: $correo);
                $ack->Subject = 'Hemos recibido tu mensaje — FUPESE';
                $html = $this->renderAckHtml($nombre);
                $text = $this->renderAckText($nombre);
                $ack->isHTML(true);
                $ack->Body    = $html;
                $ack->AltBody = $text;
                $ackOk = $ack->send();
            } catch (\Throwable $e) {
                error_log('[FUPESE] Ack mail error: ' . $e->getMessage());
            }
        }

        return ['admin_ok' => $adminOk, 'ack_ok' => $ackOk];
    }

    private function renderAdminText(string $n, string $c, string $t, string $m): string {
        $lines = [
            "Nuevo mensaje recibido desde el sitio FUPESE",
            "-------------------------------------------",
            "Nombre:   {$n}",
            "Correo:   {$c}",
            "Teléfono: {$t}",
            "",
            "Mensaje:",
            $m,
            "",
            "— Enviado automáticamente por el sitio web FUPESE —"
        ];
        return implode("\n", $lines);
    }

    private function renderAckHtml(string $n): string {
        $n = $n ?: 'Amigo/a';
        return <<<HTML
<!doctype html>
<html lang="es">
<meta charset="utf-8">
<body style="font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;line-height:1.5;margin:0;padding:24px;background:#f7f7f7;color:#222;">
  <div style="max-width:640px;margin:auto;background:#fff;border-radius:12px;padding:24px;border:1px solid #eee;">
    <h2 style="margin-top:0;">¡Gracias, {$n}!</h2>
    <p>Hemos recibido tu mensaje correctamente. Nuestro equipo de la Fundación FUPESE lo revisará y te responderá a la brevedad.</p>
    <p>Este es un acuse automático — por favor no respondas a este correo.</p>
    <hr style="border:none;border-top:1px solid #eee;margin:16px 0;">
    <p style="font-size:13px;color:#666;">Si no reconoces este envío, puedes ignorar este mensaje.</p>
  </div>
</body>
</html>
HTML;
    }

    private function renderAckText(string $n): string {
        $n = $n ?: 'Amigo/a';
        return "Gracias, {$n}. Hemos recibido tu mensaje en FUPESE. Te responderemos pronto. (Este es un acuse automático)";
    }

    private function clip(string $s, int $max): string {
        $s = preg_replace("/[\r\n]+/", " ", $s);
        $s = trim($s);
        if (mb_strlen($s, 'UTF-8') > $max) {
            $s = mb_substr($s, 0, $max, 'UTF-8');
        }
        return $s;
    }
}
