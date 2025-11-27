<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Configuración completa de secciones y subsecciones
$sections = [
    'inicio' => [
        'title' => 'Inicio',
        'subsections' => [
            'bienvenida' => [
                'title' => 'Imagen de Bienvenida',
                'max_images' => 1
            ],
            'areas-principales' => [
                'title' => 'Áreas Principales',
                'max_images' => 1
            ],
            'proyectos-actuales' => [
                'title' => 'Proyectos Actuales',
                'max_images' => 4
            ]
        ]
    ],
    'identidad' => [
        'title' => 'Nuestra Identidad',
        'subsections' => [
            'fundamentos' => [
                'title' => 'Fundamentos',
                'max_images' => 1
            ],
            'ejes-estrategicos' => [
                'title' => 'Ejes Estratégicos',
                'max_images' => 1
            ],
            'objetivo' => [
                'title' => 'Objetivo Institucional',
                'max_images' => 1
            ],
            'principios' => [
                'title' => 'Principios',
                'max_images' => 1
            ],
            'heroes' => [
                'title' => 'Nuestros Héroes',
                'max_images' => 6
            ]
        ]
    ],
    'quienes-somos' => [
        'title' => 'Quiénes Somos',
        'subsections' => [
            'general' => [
                'title' => 'Imágenes Generales',
                'max_images' => 4
            ]
        ]
    ],
    'contacto' => [
        'title' => 'Contáctanos',
        'subsections' => [
            'general' => [
                'title' => 'Imagen General',
                'max_images' => 1
            ]
        ]
    ],
    'hogar' => [
        'title' => 'Casa Hogar',
        'subsections' => [
            'general' => [
                'title' => 'Imágenes Generales',
                'max_images' => 4
            ]
        ]
    ],
    'becas' => [
        'title' => 'Becas Escolares',
        'subsections' => [
            'general' => [
                'title' => 'Imágenes Generales',
                'max_images' => 12
            ]
        ]
    ],
    'alianzas' => [
        'title' => 'Nuestras Alianzas',
        'subsections' => [
            'general' => [
                'title' => 'Imágenes Generales',
                'max_images' => 12
            ]
        ]
    ],
    'galeria' => [
        'title' => 'Galería',
        'subsections' => [
            'general' => [
                'title' => 'Imágenes Generales',
                'max_images' => 25
            ]
        ]
    ],
   
];

// Obtener sección y subsección activa
$current_section = $_GET['section'] ?? 'inicio';
$current_subsection = $_GET['subsection'] ?? array_key_first($sections[$current_section]['subsections']);

// Validar secciones
if (!array_key_exists($current_section, $sections) || 
    !array_key_exists($current_subsection, $sections[$current_section]['subsections'])) {
    header("Location: index.php");
    exit;
}

// Obtener imágenes actuales
$section_folder = "../img/uploads/$current_section/$current_subsection/";
$current_images = [];

if (file_exists($section_folder)) {
    $current_images = glob($section_folder . '*.{jpg,jpeg,png,webp}', GLOB_BRACE);
    natsort($current_images);
    $current_images = array_values($current_images);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin FUPESE - Gestión de Imágenes</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/fupeselogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <img src="../img/fupeselogo.png" alt="Logo FUPESE" class="admin-logo">
            <h1>Panel de Control FUPESE</h1>
            <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
        </header>
        
        <!-- Menú principal de secciones -->
        <nav class="main-menu">
            <ul>
                <?php foreach ($sections as $key => $section): ?>
                    <li class="<?= $current_section === $key ? 'active' : '' ?>">
                        <a href="?section=<?= $key ?>&subsection=<?= array_key_first($section['subsections']) ?>">
                            <?= $section['title'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        
        <!-- Submenú de subsecciones -->
        <nav class="submenu">
            <ul>
                <?php foreach ($sections[$current_section]['subsections'] as $key => $subsection): ?>
                    <li class="<?= $current_subsection === $key ? 'active' : '' ?>">
                        <a href="?section=<?= $current_section ?>&subsection=<?= $key ?>">
                            <?= $subsection['title'] ?>
                            <span class="badge"><?= count($current_images) ?>/<?= $subsection['max_images'] ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="section-content">
            <h2>
                <?= $sections[$current_section]['title'] ?> - 
                <?= $sections[$current_section]['subsections'][$current_subsection]['title'] ?>
                <small>(<?= count($current_images) ?>/<?= $sections[$current_section]['subsections'][$current_subsection]['max_images'] ?> imágenes)</small>
            </h2>
            
            <!-- Formulario de subida -->
 <!-- Formulario de subida mejorado -->
<div class="upload-section">
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="hidden" name="section" value="<?= $current_section ?>">
        <input type="hidden" name="subsection" value="<?= $current_subsection ?>">
        
        <div class="file-upload-area" id="dropZone">
            <input type="file" id="fileInput" name="images[]" multiple 
                   accept="image/jpeg,image/png,image/webp">
            <label for="fileInput">
                <i class="fas fa-cloud-upload-alt"></i>
                <span>Arrastra archivos aquí o haz clic</span>
                <small>Formatos aceptados: JPG, PNG, WEBP (Máx. 2MB cada uno)</small>
            </label>
        </div>
        
        <div id="filePreview" class="preview-container"></div>
        
        <div class="upload-actions">
            <button type="submit" class="btn-upload">
                <i class="fas fa-upload"></i> Subir Imágenes Seleccionadas
                <span id="selectedCount">0</span>
            </button>
            <div class="upload-status" id="uploadStatus"></div>
        </div>
    </form>
    
</div>
            
            <!-- Galería de imágenes -->
            <div class="image-gallery">
                <?php if (empty($current_images)): ?>
                    <p class="no-images">No hay imágenes en esta sección aún.</p>
                <?php else: ?>
                    <?php foreach ($current_images as $index => $image): ?>
                        <div class="image-card">
                            <img src="<?= $image ?>?t=<?= time() ?>" alt="Imagen <?= $index + 1 ?>">
                            <div class="image-actions">
                                <span class="image-number">Imagen <?= $index + 1 ?></span>
                                <span class="image-path"><?= basename($image) ?></span>
                                <a href="delete_image.php?file=<?= urlencode(basename($image)) ?>&section=<?= $current_section ?>&subsection=<?= $current_subsection ?>" 
                                   class="btn-delete" 
                                   onclick="return confirm('¿Eliminar esta imagen?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elementos del DOM
    const uploadForm = document.getElementById('uploadForm');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const dropZone = document.getElementById('dropZone');
    const selectedCount = document.getElementById('selectedCount');
    const uploadStatus = document.getElementById('uploadStatus');
    const btnUpload = document.querySelector('.btn-upload');
    
    // Variables de estado
    let currentFiles = [];
    
    // ======================
    //  MANEJO DE DRAG & DROP
    // ======================
    
    // Prevenir comportamientos por defecto
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    // Resaltar zona de drop
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight() {
        dropZone.classList.add('highlight');
    }
    
    function unhighlight() {
        dropZone.classList.remove('highlight');
    }
    
    // Manejar archivos soltados
    dropZone.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }
    
    // ======================
    //  MANEJO DE ARCHIVOS
    // ======================
    
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });
    
    function handleFiles(files) {
        currentFiles = Array.from(files);
        updateFilePreview();
        updateSelectedCount();
    }
    
    function updateSelectedCount() {
        selectedCount.textContent = currentFiles.length;
        btnUpload.disabled = currentFiles.length === 0;
    }
    
    function updateFilePreview() {
        filePreview.innerHTML = '';
        
        if (currentFiles.length === 0) return;
        
        currentFiles.forEach((file, index) => {
            const previewItem = document.createElement('div');
            previewItem.className = 'preview-item';
            
            // Verificar tipo de archivo
            if (!file.type.match('image.*')) {
                previewItem.innerHTML = `
                    <div class="file-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>${file.name} - Formato no soportado</span>
                        <button class="btn-remove" data-index="${index}">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            } else if (file.size > 2 * 1024 * 1024) {
                previewItem.innerHTML = `
                    <div class="file-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>${file.name} - Muy grande (${(file.size/1024/1024).toFixed(2)}MB)</span>
                        <button class="btn-remove" data-index="${index}">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            } else {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewItem.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <div class="file-info">
                            <span>${file.name}</span>
                            <small>${(file.size/1024/1024).toFixed(2)} MB</small>
                            <button class="btn-remove" data-index="${index}">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                    
                    // Agregar evento al botón de eliminar
                    previewItem.querySelector('.btn-remove').addEventListener('click', function() {
                        const index = parseInt(this.getAttribute('data-index'));
                        currentFiles.splice(index, 1);
                        updateFilePreview();
                        updateSelectedCount();
                    });
                };
                
                reader.readAsDataURL(file);
            }
            
            filePreview.appendChild(previewItem);
        });
    }
    
    // ======================
    //  MANEJO DE SUBIDA
    // ======================
    
    uploadForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Validar que hay archivos
        if (currentFiles.length === 0) {
            showAlert('No hay archivos seleccionados', 'error');
            return;
        }
        
        // Crear FormData y agregar archivos
        const formData = new FormData(uploadForm);
        
        // Limpiar archivos previos y agregar los actuales
        for (let i = 0; i < currentFiles.length; i++) {
            formData.append('images[]', currentFiles[i]);
        }
        
        // Configurar estado de subida
        btnUpload.disabled = true;
        btnUpload.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subiendo...';
        uploadStatus.innerHTML = '<i class="fas fa-info-circle"></i> Subiendo archivos, por favor espera...';
        
        try {
            const response = await fetch('upload.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (!response.ok) {
                throw new Error(result.error || 'Error en el servidor');
            }
            
            if (result.success) {
                // Mostrar resultados
                let successCount = result.count || 0;
                let errorCount = (result.results || []).filter(r => r.error).length;
                
                let message = `Se subieron ${successCount} archivos correctamente`;
                if (errorCount > 0) {
                    message += `, ${errorCount} con errores`;
                }
                
                showAlert(message, 'success');
                uploadStatus.innerHTML = `<i class="fas fa-check-circle"></i> ${message}`;
                
                // Actualizar galería después de 1.5 segundos
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            } else {
                throw new Error(result.error || 'No se pudo completar la subida');
            }
        } catch (error) {
            console.error('Error en subida:', error);
            showAlert(error.message, 'error');
            uploadStatus.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${error.message}`;
        } finally {
            btnUpload.disabled = false;
            btnUpload.innerHTML = '<i class="fas fa-upload"></i> Subir Imágenes Seleccionadas';
        }
    });
    
    // ======================
    //  FUNCIONES AUXILIARES
    // ======================
    
    function showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            ${message}
        `;
        
        const container = document.querySelector('.admin-container');
        container.insertBefore(alertDiv, container.firstChild);
        
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
});
</script>
</body>
</html>