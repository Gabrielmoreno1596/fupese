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

## Despliegue en cPanel (Git Version Control) — resolución de bloqueos

Si en cPanel aparece el mensaje de que el despliegue "tarda" o está pendiente:

1. **Verifica la salida del deploy:** En _cPanel → Git Version Control → Manage_ revisa el historial. Si hay un deploy en cola o con errores, suele quedar "pendiente" hasta que termine o se cancele.
2. **Fuerza el HEAD actual:** Pulsa **Deploy HEAD Commit** para que ejecute el `post-receive` desde el último commit en `work` (o la rama configurada). Esto reinicia la cola si quedó atascada.
3. **Actualiza desde remoto:** Si el repositorio del servidor tiene cambios locales, primero haz `cd /home/<usuario>/repos/<repo> && git status`. Si hay archivos modificados, guárdalos o descártalos antes de volver a desplegar.
4. **Revisa hooks pesados:** Despliegues lentos suelen deberse a scripts posteriores (p. ej. `composer install`). Ejecuta esos pasos por SSH para ver si fallan o tardan demasiado y corrige dependencias (memoria/disk quota).
5. **Limpia la caché de la app:** Si usas OpCache o caché de plantillas, reinicia el servicio PHP-FPM desde cPanel para evitar que un despliegue exitoso parezca "congelado".

Con estos pasos puedes desbloquear la cola de despliegue y reducir el tiempo de espera sin modificar el código fuente.
