<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería FUPESE</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./fundamentos.html">
     <link rel="icon" type="image/x-icon" href="img/fupeselogo.png">

    <style>
        :root {
            --primary-color: #267b42;       /* Verde Azul oscuro - profesional/serio */
            --secondary-color: #32924d;     /* Verde - energía/acción */
            --accent-color: #3498DB;        /* Azul claro - esperanza */
            --light-color: #ECF0F1;         /* Fondo claro */
            --dark-color: #2C3E50;          /* Texto oscuro */
            --text-color: #333333;          /* Color principal de texto */
            --transition: all 0.3s ease-in-out;
            --shadow-sm: 0 2px 5px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 10px rgba(0,0,0,0.15);
            --shadow-lg: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Estilos base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Header - Manteniendo tu estilo */


/*         .header__logo img {
            height: 60px;
        } */

/*         .nav__menu {
            display: flex;
            list-style: none;
        } */

/*         .nav__item {
            margin-left: 1.5rem;
            position: relative;
        }
 */
/*         .nav__item a {
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 0;
        } */

/*         .nav__item--active a {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--secondary-color);
        } */

 /*        .nav__item a:hover {
            color: var(--secondary-color);
        } */

/*         .nav__submenu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: var(--shadow-md);
            border-radius: 4px;
            list-style: none;
            width: 200px;
            padding: 0.5rem 0;
        } */

/*         .nav__item--submenu:hover .nav__submenu {
            display: block;
        }

        .nav__submenu li a {
            display: block;
            padding: 0.5rem 1rem;
        }

        .nav__submenu li a:hover {
            background-color: var(--light-color);
        } */

        /* Contenido principal */
        .main-content {
            max-width: 1200px;
            margin: 8rem auto;
            padding: 0 1rem;
        }

        .page-title {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            position: relative;
            padding-bottom: .7rem;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        /* Filtros de categoría */
        .category-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
            margin-top: 1rem;
        }

        .filter-btn {
            padding: 0.5rem 1.5rem;
            background-color: white;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: var(--primary-color);
            color: white;
        }

        /* Galería moderna */
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 13rem;
            margin-top: 6rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            aspect-ratio: 4/3;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .item-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 1.5rem;
            transform: translateY(100%);
            transition: var(--transition);
        }

        .gallery-item:hover .item-overlay {
            transform: translateY(0);
        }

        .item-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .item-category {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .item-description {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Modal para imágenes */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            z-index: 2000;
            overflow: auto;
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            max-width: 900px;
            margin: 2rem auto;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .modal-img {
            width: 100%;
            max-height: 70vh;
            object-fit: contain;
        }

        .modal-info {
            padding: 1.5rem;
            background-color: white;
        }

        .modal-title {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .modal-category {
            color: var(--secondary-color);
            font-weight: 500;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .modal-description {
            margin-bottom: 1.5rem;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .close-modal:hover {
            color: var(--secondary-color);
        }

        /* Footer - Manteniendo tu estilo */
/*         .footer {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 1.5rem;
            margin-top: 3rem;
        } */

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 1rem;
            }

            .header__logo {
                margin-bottom: 1rem;
            }

            .nav__menu {
                flex-direction: column;
                align-items: center;
            }

            .nav__item {
                margin: 0.5rem 0;
            }

            .nav__submenu {
                position: static;
                width: 100%;
                box-shadow: none;
            }

            .page-title {
                font-size: 2rem;
            }

            .gallery-container {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .gallery-container {
                grid-template-columns: 1fr;
            }

            .modal-content {
                margin: 1rem;
            }
        }
    </style>


</head>
<body>
    <!-- Header - Manteniendo tu estructura -->

    <?php include("partials/header.php"); ?>
<?php include("partials/nav.php"); ?>

    <!-- Contenido principal -->
    <main class="main-content">
        <h1 class="page-title">Galería FUPESE</h1>
        
        <!-- Filtros por categoría -->
        <div class="category-filters">
            <button class="filter-btn active" data-category="all">Todas</button>
            <button class="filter-btn" data-category="donaciones">Donaciones</button>
           <!-- <button class="filter-btn" data-category="ventanitas">Ventanitas de Luz</button> -->
            <button class="filter-btn" data-category="hogar">Casa Hogar</button>
            <button class="filter-btn" data-category="becas">Becas Escolares</button>
        </div>
        
        <!-- Galería de imágenes -->
        <div class="gallery-container" id="gallery">

        </div>
    </main>

    <!-- Modal para ver imágenes -->
    <div class="modal" id="imageModal">
        <span class="close-modal">&times;</span>
        <div class="modal-content">
            <img class="modal-img" id="modalImage" alt="">
            <div class="modal-info">
                <h3 class="modal-title" id="modalTitle"></h3>
                <span class="modal-category" id="modalCategory"></span>
                <p class="modal-description" id="modalDescription"></p>
            </div>
        </div>
    </div>

    <!-- Footer - Manteniendo tu estructura -->
    <?php include "partials/footer.php"; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Datos de la galería (puedes reemplazar con tus propias imágenes e información)
            const galleryData = [
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Entrega de donaciones 2025',
                    category: 'donaciones',
                    description: '-'
                },
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Entrega de donaciones 2025',
                    category: 'donaciones',
                    description: '-'
                },
             /*   {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Ventanitas de Luz - Taller educativo',
                    category: 'ventanitas',
                    description: 'Los niños participan en nuestros talleres educativos del programa Ventanitas de Luz.'
                }, */
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Casa Hogar FUPESE',
                    category: 'hogar',
                    description: 'Nuestro hogar que alberga y protege a los niños que más nos necesitan.'
                },
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Entrega de becas escolares',
                    category: 'becas',
                    description: 'Ceremonia de entrega de becas para el año escolar 2024.'
                },
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Recolección de alimentos',
                    category: 'donaciones',
                    description: 'Voluntarios recolectando alimentos para nuestra campaña navideña.'
                },
                /*{
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Ventanitas de Luz - Actividades recreativas',
                    category: 'ventanitas',
                    description: 'Actividades recreativas que fomentan el desarrollo integral de los niños.'
                }, */
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Día de juegos en Casa Hogar',
                    category: 'hogar',
                    description: 'Nuestros niños disfrutando de un día lleno de juegos y diversión.'
                },
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Taller para becados',
                    category: 'becas',
                    description: 'Taller de orientación vocacional para nuestros estudiantes becados.'
                },
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Donación de útiles escolares',
                    category: 'donaciones',
                    description: 'Empresas aliadas donando útiles escolares para el nuevo año lectivo.'
                },
                /*{
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Ventanitas de Luz - Celebración',
                    category: 'ventanitas',
                    description: 'Celebrando los logros de nuestros niños en el programa Ventanitas de Luz.'
                }, */
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Mejoras en Casa Hogar',
                    category: 'hogar',
                    description: 'Realizamos mejoras en nuestras instalaciones para mayor comodidad de los niños.'
                },
                {
                    image: 'img/uploads/galeria/general/1.jpg',
                    title: 'Graduación de becados',
                    category: 'becas',
                    description: 'Celebramos la graduación de nuestros estudiantes becados que terminaron sus estudios.'
                }
            ];

            // Elementos del DOM
            const galleryContainer = document.getElementById('gallery');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalCategory = document.getElementById('modalCategory');
            const modalDescription = document.getElementById('modalDescription');
            const closeModal = document.querySelector('.close-modal');

            // Inicializar la galería
            function initGallery() {
                galleryContainer.innerHTML = '';
                
                galleryData.forEach((item, index) => {
                    const galleryItem = document.createElement('div');
                    galleryItem.className = `gallery-item ${item.category}`;
                    galleryItem.dataset.category = item.category;
                    
                    galleryItem.innerHTML = `
                        <img src="${item.image}" alt="${item.title}" loading="lazy">
                        <div class="item-overlay">
                            <span class="item-category">${getCategoryName(item.category)}</span>
                            <h3 class="item-title">${item.title}</h3>
                            <p class="item-description">${item.description}</p>
                        </div>
                    `;
                    
                    galleryItem.addEventListener('click', () => openModal(index));
                    galleryContainer.appendChild(galleryItem);
                });
            }

            // Obtener nombre completo de la categoría
            function getCategoryName(category) {
                const categories = {
                    'donaciones': 'Donaciones',
                    'ventanitas': 'Ventanitas de Luz',
                    'hogar': 'Casa Hogar',
                    'becas': 'Becas Escolares'
                };
                return categories[category] || category;
            }

            // Abrir modal con la imagen seleccionada
            function openModal(index) {
                const item = galleryData[index];
                modalImage.src = item.image;
                modalImage.alt = item.title;
                modalTitle.textContent = item.title;
                modalCategory.textContent = getCategoryName(item.category);
                modalDescription.textContent = item.description;
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }

            // Cerrar modal
            function closeModalFunc() {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            // Filtrar galería por categoría
            function filterGallery(category) {
                const items = document.querySelectorAll('.gallery-item');
                
                items.forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // Event listeners
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    filterGallery(this.dataset.category);
                });
            });

            closeModal.addEventListener('click', closeModalFunc);
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModalFunc();
                }
            });

            // Inicializar
            initGallery();
        });
    </script>
</body>
</html>