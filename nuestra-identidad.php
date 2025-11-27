

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuestra Comunidad | FUPESE</title>
     <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
      <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="stylesheet" href="css/nuestraIdentidad.css?v=<?= filemtime('css/nuestraIdentidad.css') ?>">
   <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">
<style>
    .swiper-slide img {
    width: 150px;
    height: 150px;
    object-fit: contain;
    border-radius: 50%;
    border: 4px solid #f0f0f0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.4s ease, box-shadow 0.3s ease;
    
  }
</style>

</head>
<body>
<?php include("partials/header.php"); ?>
<?php include("partials/nav.php"); ?>
<main class="fupese-main" style="margin-top: 0;">
  <!-- MISIÓN (Fondo blanco) -->
  <section class="seccion-blanca">
    <div class="contenido">
      <h2>Misión</h2>
      <p class="parrafos">
        Somos una entidad sin fines de lucro, que mediante gestión cooperativa, nacional e internacional, apoya los servicios de educación, salud 
        y evangelización, contribuyendo a la transformación y desarrollo de la persona humana en beneficio de las comunidades más vulnerables del 
        país y Latinoamérica.
      </p>
    </div>
  </section>

  <!-- VISIÓN (Fondo con imagen) -->
  <section class="seccion-overlay fupese-vision">
    <div class="contenido">
      <h2 class="subtitle">Visión</h2>
      <p class="parrafos">
        Ser una fundación reconocida por el apoyo efectivo a los servicios integrales de educación, salud y evangelización, sin discriminación alguna,
        en relación con los valores humanos, cristianos, franciscanos y la práctica de las obras de misericordia.
      </p>
    </div>
  </section>

  <!-- PRINCIPIOS (Fondo blanco) -->
  <section class="seccion-blanca">
    <div class="contenido">
      <h2>Principios</h2>
      <p class="parrafos">
        La fundación tiene como eje central los valores humanos, cristianos y franciscanos, por ello declara como
        principios fundamentales: la fe, esperanza, solidaridad, fraternidad, sencillez, humildad, respeto, servicio, generosidad, fidelidad,
        lealtad, ecología, paz, armonía, alegría, confianza y amor.
      </p>
      <ul class="lista-principios">
        <li>Solidaridad con los más necesitados</li>
        <li>Respeto a la dignidad humana</li>
        <li>Transparencia y compromiso</li>
        <li>Servicio con amor y dedicación</li>
        <li>Promoción de la fe y los valores cristianos</li>
      </ul>
    </div>
  </section>

  <!-- Reseña histórica (Fondo oscuro con imagen) -->
  <section class="seccion-overlay fupese-resena">
    <div class="contenido">
    <div class="contenido">
        <h2 class="subtitle" >Reseña Histórica</h2>
      <p class="parrafos">En el año 2007, en la Provincia de Nuestra Señora de La Paz, de la Congregación de Hermanas "Franciscanas de la Inmaculada Concepción" por convocatoria de la Madre Provincial Rosario López Centeno, ante las nuevas necesidades surgidas en relación a lo económico y jurídico se tuvo la necesidad de crear la figura legal de FUNDACIÓN que ayudara a buscar apoyo para los apostolados de la Provincia.</p>
      <p class="parrafos">Se realizaron varias reuniones y se determinó el nombre de la Fundación, logo, misión, visión y valores, contratando asesoría técnica y jurídica para redactar los Estatutos y su correspondiente trámite legal.</p>
    </div>
  </section>

  <!-- Línea de tiempo (blanco) -->
  <section class="seccion-blanca">
    <div class="contenido">
      <h2>Línea del Tiempo</h2>
      <div class="timeline">
         <div class="timeline-item">
      <div class="fecha">2007</div>
      <div class="detalle">
        <h3>Orígenes de la Fundación</h3>
        <p>Inicio del proceso de creación de la Fundación para apoyar los apostolados de la Provincia.</p>
      </div>
    </div>
    <div class="timeline-item">
      <div class="fecha">22 Ene 2008</div>
      <div class="detalle">
        <h3 class="subtitle">Decreto de Creación</h3>
        <p class="parrafos">El órgano Ejecutivo de El Salvador emite el decreto No. 38 que establece legalmente la Fundación.</p>
      </div>
    </div>
    <div class="timeline-item">
      <div class="fecha">28 Abr 2009</div>
      <div class="detalle">
        <h3>Nombre oficial: FUPESE</h3>
        <p class="parrafos">La Fundación comienza operaciones bajo el nombre "FUPESE".</p>
      </div>
    </div>
    <div class="timeline-item">
      <div class="fecha">27 May 2009</div>
      <div class="detalle">
        <h3>Publicación de Estatutos</h3>
        <p class="parrafos">Publicación oficial en el Diario Oficial Tomo 383.</p>
      </div>
    </div>
      </div>
    </div>
  </section>

  <!-- Fundamento Legal (oscuro) -->
  <section class="seccion-overlay fupese-legal">
    <div class="contenido">
      <h2 class="subtitle">Fundamento Legal</h2>
      <p class="parrafos"><strong>Art. 1.</strong> Fundación FUPESE fue legalmente establecida el 28 de abril de 2009.</p>
      <p class="parrafos"><strong>Art. 2.</strong> Los Estatutos le confieren carácter de Persona Jurídica conforme a la Ley de Fundaciones sin Fines de Lucro.</p>
      <div class="resaltado parrafo">La Fundación cuenta con reconocimiento oficial por instituciones públicas y privadas.</div>
    </div>
  </section>

  <!-- Evolución sede (blanco) -->
  <section class="seccion-blanca">
    <div class="contenido">
      <h2>Evolución de la Sede Institucional</h2>
      <p class="parrafos"><strong>2009 - 2013:</strong> Complejo Educativo Católico "Nuestra Señora del Rosario", San Marcos.</p>
      <p class="parrafos"><strong>2014 - 2023:</strong> Av. El Cocal #1514, San Jacinto, San Salvador.</p>
      <p class="parrafos"><strong>2024 - Actualidad:</strong> La sede de operaciones de FUPESE se trasladó a Calle Edison N.º 734, Barrio San Jacinto, San Salvador, quedando como sede principal en Avenida El Cocal N.º 1514 del mismo barrio.</p>
    </div>
  </section>


    <?php include("partials/apoyanos.php"); ?>
  </main>
 <?php include "partials/footer.php"; ?>


</body>
</html>
