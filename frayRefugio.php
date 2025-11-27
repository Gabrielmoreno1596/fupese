<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  $isHome = $currentPage === 'index.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fray Refugio | Fundación FUPESE</title>
  <link rel="stylesheet" href="css/styles.css">
   <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">

  <style>
    .fray-refugio {
      padding: 7rem 5rem;
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
    }

    .fray-refugio__title {
      font-size: 3rem;
      font-weight: bold;
      color: #333;
      margin-bottom: 20px;
    }

    .fray-refugio__description {
      font-size: 1.2rem;
      color: #555;
      margin-bottom: 50px;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .gallery__item {
      background: #f9f9f9;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      position: relative;
    }

    .gallery__item img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .gallery__item h3 {
      font-size: 1.2rem;
      color: #222;
      margin-bottom: 10px;
    }

    .gallery__item p {
      font-size: 0.95rem;
      color: #666;
    }

    .logo-placeholder {
      position: absolute;
      top: 10px;
      left: 10px;
      width: 50px;
      height: 50px;
      background: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      color: #666;
    }

    @media (max-width: 600px) {
      .fray-refugio__title {
        font-size: 2rem;
      }

      .gallery__item {
        padding: 15px;
      }
    }
  </style>
</head>
<body>
<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>

<section class="fray-refugio">
  <h1 class="fray-refugio__title">FRAY REFUGIO</h1>
  <p class="fray-refugio__description">
    Este espacio está dedicado a visibilizar el valioso trabajo de asistencia social realizado por nuestra casa hogar. A continuación presentamos cinco momentos representativos del proyecto.
  </p>

  <div class="gallery">
    <div class="gallery__item">
      <div class="logo-placeholder" ><img  src="img/fupeselogo.png" alt=""></div>
      <img src="img/1.1.jpg" alt="Foto 1">
      <h3>Título de la Foto 1</h3>
      <p>Descripción breve de lo que representa esta imagen en el contexto de la casa hogar.</p>
    </div>
    <div class="gallery__item">
      <div class="logo-placeholder">Logo</div>
      <img src="img/foto2.jpg" alt="Foto 2">
      <h3>Título de la Foto 2</h3>
      <p>Descripción breve de lo que representa esta imagen en el contexto de la casa hogar.</p>
    </div>
    <div class="gallery__item">
      <div class="logo-placeholder">Logo</div>
      <img src="img/foto3.jpg" alt="Foto 3">
      <h3>Título de la Foto 3</h3>
      <p>Descripción breve de lo que representa esta imagen en el contexto de la casa hogar.</p>
    </div>
    <div class="gallery__item">
      <div class="logo-placeholder">Logo</div>
      <img src="img/foto4.jpg" alt="Foto 4">
      <h3>Título de la Foto 4</h3>
      <p>Descripción breve de lo que representa esta imagen en el contexto de la casa hogar.</p>
    </div>
    <div class="gallery__item">
      <div class="logo-placeholder">Logo</div>
      <img src="img/foto5.jpg" alt="Foto 5">
      <h3>Título de la Foto 5</h3>
      <p>Descripción breve de lo que representa esta imagen en el contexto de la casa hogar.</p>
    </div>
  </div>
</section>

<?php include"partials/footer.php"; ?>

</body>
</html>
