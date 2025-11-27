# FUPESE — Refactor envío de formularios

## Archivos
- lib/Csrf.php
- lib/Mailer.php
- public/procesar-formulario.php
- config/mail.example.php
- .htaccess-security.txt
- .gitignore

## Pasos
1) Copia `config/mail.example.php` a `config/mail.php` y rellena las credenciales **en el servidor** (no en Git).
2) Asegura PHPMailer: por Composer (`composer require phpmailer/phpmailer`) o carpeta `PHPMailer/` incluida.
3) En tus formularios HTML, agrega el token CSRF:
   ```php
   <?php require_once __DIR__.'/lib/Csrf.php'; echo \FUPESE\Security\Csrf::field(); ?>
   ```
4) Envía el POST a `public/procesar-formulario.php`.
5) Opcional: habilita captcha exportando `HCAPTCHA_SECRET` o `RECAPTCHA_SECRET` y completando verificación.
6) Aplica `.htaccess-security.txt` a tu `.htaccess` del sitio.
