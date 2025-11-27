
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contáctanos | FUPESE</title>
    <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">
      <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
       <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="stylesheet" href="css/becasEscolares.css?v=<?= filemtime('css/becasEscolares.css') ?>">
    <link rel="stylesheet" href="css/contacto.css" />
</head>
<body>
<?php include "partials/header.php"; ?>

<main class="becas">
  <section class="becas__intro">
    <h1>Becas Escolares FUPESE</h1>
    <p>Conoce las instituciones aliadas a través del programa de becas FUPESE.</p> 
  </section>

  <section class="becas__instituciones">
   <!-- <h2>Instituciones Aliadas</h2> -->
    <div class="hover-cards-container">

      <div class="hover-card">
        <img src="img/institucionesBecadas-logos/cec-berlin-usulutan.png" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Complejo Educativo Católico “El Espíritu Santo”</h3>
          <p>Berlín, Usulután</p>
        </div>
      </div>

      <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747954102/cec-n-se%C3%B1ora-del-roasrio_draq8q.webp" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Complejo Educativo Católico "Nuestra Señora del Rosario"</h3>
          <p> San Marcos, San Salvador</p>
        </div>
      </div>

      <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747954107/cec-olocuilta_vbdxzn.webp" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Complejo Educativo Católico "Nuestra Señora de la Paz"</h3>
          <p> Olocuilta, La Paz</p>
        </div>
      </div>

      <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747954101/cec-ricardo-poma_uu5xy8.webp" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Complejo Educativo Católico "Ricardo Poma"</h3>
          <p>Tonacatepeque, San salvador</p>
        </div>
      </div>

      <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747954099/cec-san-miguel_xrorrx.webp" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Centro Escolar Católico "Franciscano Espíritu Santo"</h3>
          <p>San Miguel</p>
        </div>
      </div>

      <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747954099/cec-santa-clara_fqzcrx.webp" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Centro Escolar Católico "Santa Clara de Asís"</h3>
          <p>Santiago de María, Usulután</p>
        </div>
      </div>

      <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747954104/cec-zacatecoluca_mcb8lv.webp" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Complejo Educativo Católico "El Espíritu Santo"</h3>
          <p>Zacatecoluca, La Paz</p>
        </div>
      </div>
      
            <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747954105/cecfcs_m9zmk0.webp" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Centro Escolar Católico "Fray Cosme Spessotto"</h3>
          <p>La Herradura, La Paz</p>
        </div>
      </div>
      
                  <div class="hover-card">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747956504/Cec_CuidadPacificaMIguel_yveqii.png" alt="Logo institución">
        <div class="hover-card-body">
          <h3>Complejo Educativo Católico "El Espiritu Santo"</h3>
          <p>Cuidad Pacífica, San Miguel</p>
        </div>
      </div>

    </div>
  </section>
<!--
  <section class="becas__requisitos">
    <h2>Requisitos Generales</h2>
    <ul>
      <li>Ser estudiante activo de una institución aliada.</li>
      <li>Presentar constancia de notas.</li>
      <li>Completar el formulario de solicitud.</li>
      <li>Participar en actividades de voluntariado (opcional).</li>
    </ul>
  </section>

  <div class="becas__boton">
    <a href="formulario-becas.html" class="boton-aplicar">Aplicar a una beca</a>
  </div> -->
</main>

    <?php include("partials/apoyanos.php"); ?>
  <?php include "partials/footer.php" ; ?>
</body>
</html>
