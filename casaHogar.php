<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contáctanos | FUPESE</title>
   <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">
  <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
      <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="stylesheet" href="./css/casaHogar.css?v=<?= filemtime('./css/casaHogar.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>
<?php include "partials/header.php"; ?>
<main class="hogar-adultos">
<section class="hogar-adultos__hero-alt">
  <div class="hero__contenido">
    <div class="hero__logo-container">
      <img src="img/casaHogar.jpg" alt="Logo Casa Hogar HFIC" class="hero__logo" />
    </div>
    <h1 class="hero__titulo">Casas Hogar de Adultos Mayores HFIC</h1>
    <hr class="hero__divider">
  </div>
</section>


  <section class="hogar-adultos__descripcion">
    <p>
      <strong>Las Hermanas Franciscanas de la Inmaculada Concepción, Provincia Nuestra Señora de la Paz,</strong><br>
      Inauguraron el domingo 24 de septiembre del 2017 un nuevo Hogar de Adultos Mayores. Con la ayuda de la Providencia Divina, el apoyo de las fraternidades de la provincia y gestiones de <strong>FUPESE</strong> (Fundación Para La Educación, Salud y Evangelización).
    </p>
    <p>
      Motivo por lo que agradecen a los donantes.
    </p>
    <blockquote class="hogar-adultos__cita">
      “Acoger con amor misericordioso a los adultos mayores que sufren por abandono, pobreza y disminución de sus capacidades físicas y mentales, mediante una atención integral al estilo de Jesús Buen Samaritano, María Santísima y San Francisco de Asís, respetando y defendiendo la vida, ayudando a transformar el dolor y la soledad en medios para encontrarse con Cristo.”
      <cite>(cfr.CC1984, 93, 95 y 110; CC2008, 110; UNC 11)</cite>
    </blockquote>
  </section>

  <!-- Carrusel moderno de imágenes -->
<section class="hogar-adultos__galeria">
  <h2>Galería de la Casa Hogar</h2>
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="img/assets/CasaHogar/1.jpg" alt="Foto 1" />

      </div>
      <div class="swiper-slide">
        <img src="img/assets/CasaHogar/2.jpg" alt="Celebración hogar 2">
       
      </div>
      <div class="swiper-slide">
        <img src="img/assets/CasaHogar/3.jpg" alt="Celebración hogar 2">
       
      </div>
      <div class="swiper-slide">
        <img src="img/assets/CasaHogar/4.jpg" alt="Celebración hogar 2">
       
      </div>
      <div class="swiper-slide">
        <img src="img/assets/CasaHogar/5.jpg" alt="Celebración hogar 2">
      
      </div>
      
      <!-- Repite para las 5 fotos -->
    </div>

    <!-- Flechas de navegación -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    
    <!-- Paginación -->
    <div class="swiper-pagination"></div>
  </div>
</section>

</main>
  <?php include "partials/footer.php" ; ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    breakpoints: {
      768: {
        slidesPerView: 2
      },
      1024: {
        slidesPerView: 3
      }
    }
  });
</script>

</body>
</html>
