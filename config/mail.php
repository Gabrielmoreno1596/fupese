<?php
return [
    'smtp' => [
        'host' => getenv('SMTP_HOST') ?: 'smtp.gmail.com',
        'port' => (int)(getenv('SMTP_PORT') ?: 587),
        'user' => getenv('SMTP_USER') ?: '',
        'pass' => getenv('SMTP_PASS') ?: '',
        'secure' => 'tls'
    ],
    'mail' => [
        'from_email' => 'contacto@fupese.com',
        'from_name'  => 'Formulario FUPESE',
        'to_email'   => 'fupese.contacto@gmail.com',
        'to_name'    => 'SITIO WEB FUPESE'
    ]
];
