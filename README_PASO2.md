# Paso 2 — Composer + envío dual (admin + acuse) + reCAPTCHA

## 1) Composer
En el servidor/local:
```
cd /ruta/proyecto
composer install
```
Esto instala `phpmailer/phpmailer` y habilita el autoload PSR-4 para `FUPESE\`.

## 2) Configuración
Copia `config/mail.example.php` a `config/mail.php` y rellena:
- SMTP del **dominio** (p.ej. `contacto@fupese.com` como remitente).
- `to_email` = correo principal de la fundación (destino de notificaciones).
- Opcional: DKIM (si tu hosting lo ofrece).
- reCAPTCHA: define `site_key` y `secret` (V2 checkbox o V3 score).

## 3) Formulario
- Inserta `<?php echo \FUPESE\Security\Csrf::field(); ?>` dentro del `<form>`.
- Si usas reCAPTCHA V2, añade el widget con tu `site_key` y el script de Google.
- El form POSTea a `public/procesar-formulario.php` y recibe JSON.

## 4) Qué hace ahora
- Envía **dos correos**:
  1) Notificación al buzón institucional (`to_email`, con BCC opcional).
  2) **Acuse** (auto-reply) al visitante.
- Verifica CSRF y (si configuras) reCAPTCHA.
- Rate-limit 5 envíos / 15 min / IP.

## 5) Entregabilidad (muy importante)
- Crea el buzón `contacto@fupese.com` en tu hosting.
- Configura **SPF, DKIM y DMARC** en DNS del dominio:
  - SPF: incluye el host SMTP de tu proveedor.
  - DKIM: genera clave en cPanel (o proveedor) y agrega el registro `TXT` con el `selector`.
  - DMARC: `v=DMARC1; p=quarantine; rua=mailto:postmaster@fupese.com` (ajusta a tus políticas).
- Usa `from_email` del mismo dominio que envía (no mezclar Gmail con dominio propio).

## 6) Seguridad adicional
- Mantén `config/mail.php` **fuera de Git** (usa `.gitignore`).
- Forzar HTTPS y cabeceras de seguridad en `.htaccess`.
- Rotar contraseñas de app si cambias de proveedor o hay incidentes.

## 7) Cambios rápidos en tus páginas
- Si ya tienes formularios, solo:
  - Agrega el campo CSRF.
  - Inserta widget reCAPTCHA V2 si lo deseas.
  - Actualiza `action` a `public/procesar-formulario.php` (o a tu ruta preferida).

¡Con esto ya queda listo para tu caso de uso: remitente `contacto@fupese.com`, acuse al visitante y copia al correo principal de la fundación!
