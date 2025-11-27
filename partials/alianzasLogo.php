<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contáctanos | FUPESE</title>
  <link rel="stylesheet" href="../fupese_php_site/css/styles.css">
  <link rel="stylesheet" href="../fupese_php_site/css/alianzas.css">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>

  <div class="swiper alianzas__swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862206/alternativaDigital_gus4pa.webp" alt="Alternativa Digital"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862206/MinesterioDesarrolloSocial_ykzven.webp" alt="Ministerio de Desarrollo Social"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862205/Fundacion-siman_jwtrxe.webp" alt="Fundación Simán"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862204/fundaci%C3%B3n-Atlantida_g5dfcu.webp" alt="Fundación Atlantida"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862203/Electrolact-medic_mvs4ik.webp" alt="Electrolact Medic"></div>

      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862202/polloCampestre_hqe2la.webp" alt="Pollo Campestre"></div>

      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862201/bancoAlimentos_kcku5z.webp" alt="Banco de Alimentos"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862200/cafeRiko_fhjjxw.webp" alt="Café Riko"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862200/GLC_brh2fn.webp" alt="GLC"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862199/paill_cpzn52.webp" alt="Paill"></div>


      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862200/capri_g7itod.webp" alt="Capri"></div>


      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1750862200/grupoDinant_zwwh3h.webp" alt="Grupo Dinant"></div>
      <div class="swiper-slide"><img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1751652163/HostalShutitoto_ur3cm0.webp" alt="Hostal Koltin Suchitoto"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      const swiper = new Swiper('.alianzas__swiper', {
        loop: true,
        slidesPerView: 4,
        spaceBetween: 40,
        speed: 2500,
        autoplay: {
          delay: 0,
          disableOnInteraction: false,
        },
        freeMode: true,
        freeModeMomentum: false,
        grabCursor: true,
        breakpoints: {
          320: {
            slidesPerView: 2,
            spaceBetween: 20
          },
          640: {
            slidesPerView: 3,
            spaceBetween: 30
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 40
          },
        }
      });
    </script>


</body>

</html>