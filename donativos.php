<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donativos | FUPESE</title>
  <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">
  <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
  <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="stylesheet" href="./css/donativos.css?v=<?= filemtime('./css/donativos.css') ?>">
</head>

<body>

  <?php include "partials/header.php"; ?>

  <section class="donation">
    <div class="donation__bg-shape"></div>
    <div class="container">
      <div class="donation__header">
        <span class="donation__pill">Haz tu donativo</span>
        <h2 class="donation__title">Cada aporte sostiene educacion, salud y esperanza</h2>
        <p class="donation__lede">Transforma tu generosidad en becas, jornadas medicas y acompanamiento espiritual.</p>
      </div>

      <div class="donation__grid">
        <div class="donation__info">
          <div class="donation__panel">
            <h3>Impacto inmediato</h3>
            <ul>
              <li>Becas escolares</li>
              <li>Jornadas medicas y medicamentos</li>
              <li>Alimentacion y acompanamiento a adultos mayores</li>
            </ul>
            <div class="donation__cta">
              <span class="donation__cta-label">Cuenta con nosotros</span>
              <span class="donation__cta-note">Cada mes reportamos el uso de fondos.</span>
            </div>
          </div>

          <div class="donation__banks">
            <div class="donation__bank-card">
              <p class="donation__bank-label">Cuenta de ahorro</p>
              <p class="donation__bank-number">003040385823</p>
              <p class="donation__bank-name">Banco Agricola</p>
            </div>
            <div class="donation__bank-card">
              <p class="donation__bank-label">Cuenta corriente</p>
              <p class="donation__bank-number">5520045155</p>
              <p class="donation__bank-name">Banco Agricola</p>
            </div>
            <div class="donation__bank-card">
              <p class="donation__bank-label">Cuenta corriente</p>
              <p class="donation__bank-number">201579067</p>
              <p class="donation__bank-name">BAC Credomatic</p>
            </div>
          </div>
        </div>

        <div class="donation__options">
          <p class="donation__impact">Elige un monto y convierte tu apoyo en oportunidades reales.</p>
          <div class="donation__cards">
            <div class="donation__card">
              <div class="donation__badge">$5</div>
              <h4>Material basico</h4>
              <p>Cuadernos y utiles para un estudiante.</p>
            </div>
            <div class="donation__card donation__card--highlight">
              <div class="donation__badge">$10</div>
              <h4>Consulta medica</h4>
              <p>Cubre medicamentos esenciales.</p>
            </div>
            <div class="donation__card">
              <div class="donation__badge">$15</div>
              <h4>Canasta solidaria</h4>
              <p>Alimentos para una familia en necesidad.</p>
            </div>
            <div class="donation__card">
              <div class="donation__badge">$20</div>
              <h4>Beca parcial</h4>
              <p>Apoyo escolar mensual con seguimiento.</p>
            </div>
            <div class="donation__card">
              <div class="donation__badge">$25</div>
              <h4>Apoyo integral</h4>
              <p>Combina educacion, salud y acompanamiento.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include "partials/footer.php"; ?>
</body>

</html>