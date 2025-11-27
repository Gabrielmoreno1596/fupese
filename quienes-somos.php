<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuestra Identidad | FUPESE</title>
  <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
  <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="stylesheet" href="css/quienesSomos.css?v=<?= filemtime('css/quienesSomos.css') ?>">
  <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">

</head>

<body>

  <?php include("partials/header.php"); ?>


  <main class="principal">
    <section class="identidad">
      <div class="identidad__carrusel">
        <button class="flecha izquierda" onclick="moverCarrusel(-1)">&#10094;</button>
        <div class="identidad__imagenes" id="carrusel">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747953630/4_ujsr1g.webp" alt="Imagen 1"
            loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747953630/3_fybtwt.webp" alt="Imagen 2"
            loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747953629/2_bxq30q.webp" alt="Imagen 3"
            loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747953629/1_vlpstu.webp" alt="Imagen 3"
            loading="lazy">
        </div>
        <button class="flecha derecha" onclick="moverCarrusel(1)">&#10095;</button>
      </div>

      
      <div class="identidad__texto">
        <h2>QUIENES SOMOS</h2>
        <ul>
          <li><strong>FUPESE</strong> posee su personeria juridica otorgada por el Ministerio de Gobernacion de El Salvador en 2009.</li>
          <li>Fue fundada por las Hermanas Franciscanas de la Inmaculada Concepcion, Provincia Nuestra Senora de la Paz.</li>
          <li>Su mision se centra en <strong>educacion, salud, evangelizacion</strong>.</li>
          <li>Trabaja con ninos, adolescentes, jovenes y adultos mayores en la mejora de sus capacidades de vida.</li>
          <li>Se sostiene economicamente por empresas altruistas y por personas Amigas de la Fundacion.</li>
        </ul>
      </div>
    </section>
    <?php include("partials/apoyanos.php"); ?>
  </main>

  <?php include("partials/footer.php"); ?>

  <script>
    const carrusel = document.getElementById('carrusel');
    const slides = Array.from(carrusel.children);
    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[slides.length - 1].cloneNode(true);

    carrusel.appendChild(firstClone);
    carrusel.insertBefore(lastClone, slides[0]);

    let indice = 1;
    const totalConClones = slides.length + 2;

    const setTransform = (withTransition = true) => {
      carrusel.style.transition = withTransition ? 'transform 0.5s ease-in-out' : 'none';
      carrusel.style.transform = `translateX(-${indice * 100}%)`;
    };

    // Posicionar al primer slide real
    setTransform(false);

    function moverCarrusel(direccion) {
      indice += direccion;
      setTransform(true);
    }

    carrusel.addEventListener('transitionend', () => {
      if (indice === totalConClones - 1) {
        indice = 1;
        setTransform(false);
      } else if (indice === 0) {
        indice = totalConClones - 2;
        setTransform(false);
      }
    });

    setInterval(() => moverCarrusel(1), 5000); // avance automático cada 5 segundos
  </script>
</body>

</html>
