<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$isHome = $currentPage === 'index.php';

$submenuPages = ['casaHogar.php', 'becas.php', 'alianzas.php', 'galeria.php', 'donativos.php', 'becasEscolares.php'];
$isSubmenuPage = in_array($currentPage, $submenuPages);
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fundación FUPESE</title>
  <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
  <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">



</head>

<body>
  <!-- Header -->
  <header class="header">
    <div class="header__logo">
      <img src="./img/fupeselogo.png" loading="lazy" alt="Logo FUPESE">
    </div>

    <div class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <nav class="header__nav <?php echo $isHome ? 'header__nav--home' : 'header__nav--inner'; ?>">
      <ul class="nav__menu responsive-nav" id="navMenu">
        <li class="nav__item <?php echo $currentPage === 'index.php' ? 'nav__item--active' : ''; ?>"><a href="index.php">Inicio</a></li>
        <li class="nav__item <?php echo $currentPage === 'nuestra-identidad.php' ? 'nav__item--active' : ''; ?>"><a href="nuestra-identidad.php">Nuestra Identidad</a></li>
        <li class="nav__item <?php echo $currentPage === 'quienes-somos.php' ? 'nav__item--active' : ''; ?>"><a href="quienes-somos.php">Quienes somos</a></li>
        <li class="nav__item <?php echo $currentPage === 'contacto.php' ? 'nav__item--active' : ''; ?>"><a href="contacto.php">Contáctanos</a></li>

        <!-- Mostrar página del submenú como opción principal si está activa -->
        <?php if ($isSubmenuPage): ?>
          <li class="nav__item nav__item--active">
            <a href="<?php echo $currentPage; ?>">
              <?php
              switch ($currentPage) {
                case 'casaHogar.php':
                  echo 'Casa hogar';
                  break;
                case 'becas.php':
                  echo 'Becas escolares';
                  break;
                case 'alianzas.php':
                  echo 'Nuestras alianzas';
                  break;
                /* case 'galeria.php': echo 'Galería'; break; */
                case 'donativos.php':
                  echo 'Donativos';
                  break;
                case 'becasEscolares.php':
                  echo 'Becas Escolares';
                  break;
              }
              ?>
            </a>
          </li>
        <?php endif; ?>

        <!-- Submenú Más -->
        <li class="nav__item nav__item--submenu">
          <a href="#">Más</a>
          <ul class="nav__submenu">
            <?php if ($currentPage !== 'casaHogar.php'): ?>
              <li><a href="casaHogar.php">Pastoral de la Salud</a></li>
            <?php endif; ?>
            <?php if ($currentPage !== 'becasEscolares.php'): ?>
              <li><a href="becasEscolares.php">Pastoral de la Educación</a></li>
            <?php endif; ?>
            <?php if ($currentPage !== 'alianzas.php'): ?>
              <li><a href="alianzas.php">Nuestras alianzas</a></li>
            <?php endif; ?>

            <?php if ($currentPage !== 'donativos.php'): ?>
              <li><a href="donativos.php">Donativos</a></li>
            <?php endif; ?>

          </ul>
        </li>
      </ul>


    </nav>

  </header>
  <script>
    const hamburger = document.getElementById('hamburger');
    const nav = document.querySelector('.header__nav');

    hamburger.addEventListener('click', () => {
      nav.classList.toggle('active');
    });
  </script>
