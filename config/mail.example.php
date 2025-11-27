<?php
// config/mail.example.php (Paso 2)
// Copia como config/mail.php y completa en el servidor.

return [
  'smtp' => [
    'host'   => getenv('SMTP_HOST') ?: 'smtp.fupese.com', // o el host SMTP de tu hosting
    'port'   => (int)(getenv('SMTP_PORT') ?: 587),
    'user'   => getenv('SMTP_USER') ?: 'contacto@fupese.com',
    'pass'   => getenv('SMTP_PASS') ?: '',
    'secure' => getenv('SMTP_SECURE') ?: 'tls', // tls o ssl
  ],
  'mail' => [
    'from_email' => getenv('FROM_EMAIL') ?: 'contacto@fupese.com',
    'from_name'  => getenv('FROM_NAME')  ?: 'Fundación FUPESE',
    'to_email'   => getenv('TO_EMAIL')   ?: 'fundacion@fupese.com', // correo principal de la fundación
    'to_name'    => getenv('TO_NAME')    ?: 'Fundación FUPESE',
    // Opcional: copia oculta a otro buzón interno
    'bcc_email'  => getenv('BCC_EMAIL')  ?: '',
  ],
  // Opcional: DKIM (recomendado si tu hosting lo soporta)
  'dkim' => [
    'domain'   => getenv('DKIM_DOMAIN')   ?: 'fupese.com',
    'selector' => getenv('DKIM_SELECTOR') ?: '',   // p.ej. "default"
    'private_key_path' => getenv('DKIM_PRIVKEY') ?: '', // ruta segura fuera del docroot
    'passphrase' => getenv('DKIM_PASSPHRASE') ?: '',
  ],
  // reCAPTCHA V2 ("checkbox") o V3 (score). Usa UNO: define SECRET y SITE_KEY en el server y HTML.
  'recaptcha' => [
    'provider' => 'google', // 'google'
    'site_key' => getenv('RECAPTCHA_SITE_KEY') ?: '',
    'secret'   => getenv('RECAPTCHA_SECRET')   ?: '',
    'version'  => getenv('RECAPTCHA_VERSION')  ?: 'v2', // 'v2' o 'v3'
    'min_score'=> (float)(getenv('RECAPTCHA_MIN_SCORE') ?: 0.5) // solo v3
  ],
];
