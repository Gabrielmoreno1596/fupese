<?php require_once __DIR__ . '/lib/Csrf.php';
echo \FUPESE\Security\Csrf::field(); ?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contáctanos | FUPESE</title>
  <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">
  <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
  <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="stylesheet" href="css/contacto.css?v=<?= filemtime('css/contacto.css') ?>">
</head>

<body>
  <?php include "partials/header.php"; ?>

  <div id="mensajeExito" class="mensaje-exito oculto">
    ¡Mensaje enviado con éxito! Gracias por contactarnos.
  </div>

  <main class="contacto">
    <section class="contacto__contenido">
      <h2>Contáctenos</h2>
      <div class="contacto__grid">
        <div class="contacto__info">
          <p><strong>FUPESE</strong><br>
            Sede Principal Av. El Cocal #1514, Barrio San Jacinto, San Salvador.</p>
          <p>Y Sede de operaciones calle Edison #734, barrio San Jacinto, a dos cuadras al norte de la sede principal.<br><br>
            Contáctanos por:</p>
          <p><strong>Tels:</strong> (+503) 2280 4929 <br> (+503) 6853 4446 - (+503) 7892 3781<br>
            <strong>E-mail:</strong> fupese.22@gmail.com
          </p>
          <p><strong>Horario de atención:</strong><br>
            Lunes a Viernes: 8:00 a.m. a 5:00 p.m.<br>
            Sábados: 8:00 a.m. a 12:00 m.</p>

        </div>

        <form class="contacto__form" method="POST" action="procesar-formulario.php">
          <div class="form__group">
            <input type="text" name="nombre" placeholder="Nombre" required />
            <input type="tel" name="telefono" placeholder="Teléfono" required />
          </div>
          <input type="email" name="correo" placeholder="Correo electrónico" required />
          <textarea name="mensaje" placeholder="Mensaje" rows="4" required></textarea>
          <button type="submit">Enviar mensaje</button>
        </form>


        <div class="contacto__mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d969.145362139054!2d-89.190847!3d13.683196!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63310fb02c2211%3A0x62fd3e01e4c672ae!2sVITASANA!5e0!3m2!1ses-419!2sus!4v1747867176197!5m2!1ses-419!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>

  </main>

  <?php include "partials/footer.php"; ?>



  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const params = new URLSearchParams(window.location.search);
      if (params.get('exito') === '1') {
        const mensaje = document.getElementById('mensajeExito');
        mensaje.classList.remove('oculto');
        setTimeout(() => mensaje.classList.add('mostrar'), 100); // animación

        // Ocultar después de 4 segundos
        setTimeout(() => {
          mensaje.classList.remove('mostrar');
        }, 4000);

        // Eliminar el parámetro ?exito=1 de la URL sin recargar la página
        if (window.history.replaceState) {
          const url = new URL(window.location);
          url.searchParams.delete('exito');
          window.history.replaceState({}, document.title, url.toString());
        }
      }
    });
  </script>

</body>

</html>