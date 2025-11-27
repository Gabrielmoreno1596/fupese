<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="FUPESE - Fondo Universitario Para la Empleabilidad y el Sostenimiento Estudiantil">
  <title>FUPESE | Inicio</title>
  <link rel="stylesheet" href="css/styles.css?v=<?= filemtime('css/styles.css') ?>">
  <link rel="stylesheet" href="css/headerStyle.css?v=<?= filemtime('css/headerStyle.css') ?>">
  <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">
  <title>Apoya la Educación en El Salvador | Fundación FUPESE</title>
  <meta name="description"
    content="Fundación FUPESE trabaja por la educación y el bienestar de niños y jóvenes en El Salvador. Descubre cómo puedes ayudar.">

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

</head>

<body>
  <?php include("partials/header.php"); ?>
  <section class="bienvenida">

    <div class="bienvenida__fondo" id="heroSlides" data-slides='["https://res.cloudinary.com/dcsjgrfb8/image/upload/v1749503645/portada_ocxwua.webp","https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747953315/1__1__qlbg2i.webp","https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748103918/3_n7ud7o.webp"]'>
      <img class="bienvenida__slide is-active" src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1749503645/portada_ocxwua.webp" alt="Imagen de bienvenida">
      <img class="bienvenida__slide" src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747953315/1__1__qlbg2i.webp" alt="Imagen de bienvenida 2">
    </div>
    <div class="bienvenida__overlay"></div>
    <div class="bienvenida__contenido">
      <h1>Bienvenidos a Fundación FUPESE</h1>
      <p class="bienvenida__subtitulo">"Lo que hacemos hoy, sonará hasta la eternidad"</p>
      <a href="#identidad2" class="btn-cta">Conócenos</a>
    </div>
  </section>


  <main class="principal">
    <section class="que-hacemos" id="identidad">
      <h2>¿Qué hacemos?</h2>
    </section>

    <section class="historia" id="quienes">
      <div class="historia__fondo">
        <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747953315/1__1__qlbg2i.webp" loading="lazy"
          alt="Imagen de historia">
      </div>
      <div class="historia__contenido video">
        <div class="video__wrapper">
          <video src="https://res.cloudinary.com/dcsjgrfb8/video/upload/v1749503251/video_index_i4rbsn.mp4"
            loading="lazy" controls autoplay muted></video>
        </div>
      </div>
    </section>

    <section class="areas" id="areas">
      <h2>Áreas Principales</h2>
      <p class="areas__intro">Nuestros frentes de acción combinan educación, salud y acompañamiento espiritual para
        transformar comunidades.</p>
      <div class="areas__grid">

        <div class="areas__item">
          <span class="areas__pill">Educación</span>
          <div class="areas__icon"><img
              src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747969440/pastoral-educacion_h5xmam.webp"
              loading="lazy" alt="Pastoral de la Educación"></div>
          <h3>Pastoral de la Educación</h3>
          <p>Impulsamos el desarrollo estudiantil con becas, mentorías y acompañamiento a familias.</p>
          <div class="areas__meta">Becas escolares · Acompañamiento integral</div>
        </div>

        <div class="areas__item">
          <span class="areas__pill">Salud</span>
          <div class="areas__icon"><img
              src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747969440/pastoral-salud_dn74f9.webp"
              loading="lazy" alt="Pastoral de la Salud" width="150" height="150"></div>
          <h3>Pastoral de la Salud</h3>
          <p>Brindamos jornadas médicas, atención a adultos mayores y apoyo a hogares de cuidado.</p>
          <div class="areas__meta">Clínicas móviles · Protección de mayores</div>
        </div>

        <div class="areas__item">
          <span class="areas__pill">Espiritualidad</span>
          <div class="areas__icon"><img
              src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1747969440/Pastoral-evangelizacion_whbmrj.webp"
              loading="lazy" alt="Pastoral de Evangelización"></div>
          <h3>Pastoral de Evangelización</h3>
          <p>Formación espiritual, preparación sacramental y misiones que fortalecen la fe y el servicio.</p>
          <div class="areas__meta">Misiones · Formación · Comunidad</div>
        </div>
      </div>
    </section>


    <section class="historia" id="identidad2">
      <div class="historia__fondo">
        <img src="./img/uploads/inicio/areas-principales/2.jpg" loading="lazy" alt="Imagen de historia">
      </div>
      <div class="historia__contenido">
        <h2>Nuestra historia</h2>
        <p>Desde nuestros inicios, en FUPESE hemos trabajado con compromiso para brindar esperanza, apoyo y amor a
          quienes más lo necesitan.</p>
        <a href="reseña-historica.php" class="historia__leer-mas">Leer más...</a>
      </div>
    </section>

    <section class="evidencias-impacto" id="evidencias">
      <div class="comoAyudamos">¿Cómo Ayudamos?</div>
      <div class="evidencias__grupo">
        <h2>Pastoral de la Educación</h2>
        <h3>Apadrinamiento de estudiantes en las diferentes Instituciones</h3>
        <p>Apoyamos a niños y jóvenes en distintas instituciones educativas a través de becas y seguimiento
          personalizado.</p>
        <div class="evidencias__fotos">
          <img src="img/assets/EstudiantesBecados/1.jpg" alt="Estudiantes beneficiados 1">
          <img src="img/assets/EstudiantesBecados/2.jpg" alt="Estudiantes beneficiados 2">
          <img src="img/assets/EstudiantesBecados/3.jpg" alt="Estudiantes beneficiados 2">
          <img src="img/assets/EstudiantesBecados/4.jpg" alt="Estudiantes beneficiados 2">
          <img src="img/assets/EstudiantesBecados/5.jpg" alt="Estudiantes beneficiados 2">
          <!-- <img src="img/assets/EstudiantesBecados/6.jpg" alt="Estudiantes beneficiados 2"> -->
          <img src="img/assets/EstudiantesBecados/7.jpg" alt="Estudiantes beneficiados 2">
        </div>
      </div>

      <div class="evidencias__grupo">
        <h2>Pastoral de la Salud</h2>
        <h3>Apoyamos al Hogar de adultos mayores de Alegría</h3>
        <p>Espacios de fe, cuidado y compañía para nuestros adultos mayores.</p>
        <div class="evidencias__fotos">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748105027/5_eu8uiw.webp"
            alt="Celebración hogar 1" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748105026/1_lwhskp.webp"
            alt="Celebración hogar 2" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748105025/2_tecqmk.webp"
            alt="Celebración hogar 2" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748105024/3_diwchg.webp"
            alt="Celebración hogar 2" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748105024/4_dnt1wz.webp"
            alt="Celebración hogar 2" loading="lazy">
        </div>
      </div>

      <div class="evidencias__grupo">
        <h3>Pastoral Asistencial</h3>
        <p>Atención médica y espiritual a personas vulnerables en comunidades.</p>
        <div class="evidencias__fotos">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748104224/3_ve3jd7.webp"
            alt="Consulta pastoral 1" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748104223/2_jppiic.webp"
            alt="Consulta pastoral 2" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748104223/1_xmkdsl.webp"
            alt="Consulta pastoral 2" loading="lazy">
        </div>
      </div>

      <div class="evidencias__grupo">
        <h2>Pastoral de Evangelización</h2>
        <p>Atención Espiritual, Preparación de Sacramentos y Participación en misiones de Semana Santa.</p>
        <div class="evidencias__fotos">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748103918/1_fhbkq9.webp"
            alt="Consulta pastoral 1" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748103918/3_n7ud7o.webp"
            alt="Consulta pastoral 2" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748103918/5_qgfxio.webp"
            alt="Consulta pastoral 2" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748103918/2_n5sb8y.webp"
            alt="Consulta pastoral 2" loading="lazy">
          <img src="https://res.cloudinary.com/dcsjgrfb8/image/upload/v1748103917/4_kjfoda.webp"
            alt="Consulta pastoral 2" loading="lazy">
        </div>
      </div>
    </section>

  </main>

  <!-- Lightbox para evidencias -->
  <div class="lightbox" id="lightbox" aria-modal="true" role="dialog" aria-hidden="true">
    <button class="lightbox__close" type="button" aria-label="Cerrar">X</button>
    <button class="lightbox__prev" type="button" aria-label="Anterior">&lt;</button>
    <div class="lightbox__content">
      <img class="lightbox__img" src="" alt="">
      <div class="lightbox__caption"></div>
    </div>
    <button class="lightbox__next" type="button" aria-label="Siguiente">&gt;</button>
  </div>

  <?php include("partials/footer.php"); ?>


  <script>
    // Secuencia de imágenes del hero con crossfade
    (function () {
      const container = document.getElementById('heroSlides');
      if (!container) return;

      const data = container.dataset.slides;
      const slides = data ? JSON.parse(data) : [];
      if (slides.length < 2) return;

      const imgs = container.querySelectorAll('.bienvenida__slide');
      imgs[0].src = slides[0];
      imgs[1].src = slides[1 % slides.length];

      let current = 0; // índice del slide actual en el array
      let activeNode = 0; // 0 o 1: cuál <img> está visible

      const swap = () => {
        const nextIndex = (current + 1) % slides.length;
        const incoming = imgs[activeNode ^ 1];
        const outgoing = imgs[activeNode];

        incoming.src = slides[nextIndex];
        requestAnimationFrame(() => {
          incoming.classList.add('is-active');
          outgoing.classList.remove('is-active');
          activeNode = activeNode ^ 1;
          current = nextIndex;
        });
      };

      setInterval(swap, 3000);
    })();
  </script>

  <script>
    // Lightbox para sección "Cómo ayudamos"
    (function () {
      const galleryImages = Array.from(document.querySelectorAll('.evidencias-impacto .evidencias__fotos img'));
      const lightbox = document.getElementById('lightbox');
      if (!lightbox || !galleryImages.length) return;

      const imgEl = lightbox.querySelector('.lightbox__img');
      const captionEl = lightbox.querySelector('.lightbox__caption');
      const btnClose = lightbox.querySelector('.lightbox__close');
      const btnPrev = lightbox.querySelector('.lightbox__prev');
      const btnNext = lightbox.querySelector('.lightbox__next');
      let currentIndex = 0;

      const open = (idx) => {
        currentIndex = idx;
        const { src, alt } = galleryImages[currentIndex];
        imgEl.src = src;
        imgEl.alt = alt || '';
        captionEl.textContent = alt || 'Imagen';
        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        btnClose.focus();
      };

      const close = () => {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        imgEl.src = '';
      };

      const show = (delta) => {
        if (!galleryImages.length) return;
        currentIndex = (currentIndex + delta + galleryImages.length) % galleryImages.length;
        open(currentIndex);
      };

      galleryImages.forEach((img, idx) => {
        img.setAttribute('tabindex', '0');
        img.addEventListener('click', () => open(idx));
        img.addEventListener('keydown', (ev) => {
          if (ev.key === 'Enter' || ev.key === ' ') {
            ev.preventDefault();
            open(idx);
          }
        });
      });

      btnClose.addEventListener('click', close);
      btnPrev.addEventListener('click', () => show(-1));
      btnNext.addEventListener('click', () => show(1));

      lightbox.addEventListener('click', (ev) => {
        if (ev.target === lightbox) close();
      });

      document.addEventListener('keydown', (ev) => {
        if (!lightbox.classList.contains('is-open')) return;
        if (ev.key === 'Escape') close();
        if (ev.key === 'ArrowRight') show(1);
        if (ev.key === 'ArrowLeft') show(-1);
      });
    })();
  </script>

  <script>
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const imgs = entry.target.querySelectorAll('img[data-src]');
          imgs.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
          });
          obs.unobserve(entry.target);
        }
      });
    });

    document.querySelectorAll('.bloque-imagenes').forEach(section => {
      observer.observe(section);
    });
  </script>

</body>

</html>
