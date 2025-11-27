

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contáctanos | FUPESE</title>
   <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">
     <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
        <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="stylesheet" href="css/alianzas.css?v=<?= filemtime('css/alianzas.css') ?>">
  <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body>
<?php include "partials/header.php"; ?>
<main class="alianzas">
  <section class="alianzas__contenedor">
    <h2 class="alianzas__titulo">Nuestras Alianzas</h2>
    <p class="alianzas__subtitulo">Colaboradores que hacen posible nuestra misión</p>

    <?php include "partials/alianzasLogo.php" ; ?>
  </section>
</main>

  <?php include "partials/footer.php" ; ?>





</body>
</html>
