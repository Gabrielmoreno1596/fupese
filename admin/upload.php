<?php
session_start();
header('Content-Type: application/json');

// 1. Verificar sesión admin
if (!isset($_SESSION['admin'])) {
    die(json_encode(['error' => 'Acceso no autorizado']));
}

// 2. Configuración de seguridad
$allowedTypes = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp'
];
$maxFileSize = 2 * 1024 * 1024; // 2MB

// 3. Validar sección/subsección
$section = preg_replace('/[^a-z\-]/', '', $_POST['section'] ?? '');
$subsection = preg_replace('/[^a-z\-]/', '', $_POST['subsection'] ?? '');

$sections = [
    'inicio' => [
        'title' => 'Inicio',
        'subsections' => [
            'bienvenida' => ['title' => 'Imagen de Bienvenida', 'max_images' => 1],
            'areas-principales' => ['title' => 'Áreas Principales', 'max_images' => 1],
            'proyectos-actuales' => ['title' => 'Proyectos Actuales', 'max_images' => 4]
        ]
    ],
    'identidad' => [
        'title' => 'Nuestra Identidad',
        'subsections' => [
            'fundamentos' => ['title' => 'Fundamentos', 'max_images' => 1],
            'ejes-estrategicos' => ['title' => 'Ejes Estratégicos', 'max_images' => 1],
            'objetivo' => ['title' => 'Objetivo Institucional', 'max_images' => 1],
            'principios' => ['title' => 'Principios', 'max_images' => 1],
            'heroes' => ['title' => 'Nuestros Héroes', 'max_images' => 6]
        ]
    ],
    'quienes-somos' => [
        'title' => 'Quiénes Somos',
        'subsections' => [
            'general' => ['title' => 'Imágenes Generales', 'max_images' => 4]
        ]
    ],
    'contacto' => [
        'title' => 'Contáctanos',
        'subsections' => [
            'general' => ['title' => 'Imagen General', 'max_images' => 1]
        ]
    ],
    'hogar' => [
        'title' => 'Casa Hogar',
        'subsections' => [
            'general' => ['title' => 'Imágenes Generales', 'max_images' => 4]
        ]
    ],
    'becas' => [
        'title' => 'Becas Escolares',
        'subsections' => [
            'general' => ['title' => 'Imágenes Generales', 'max_images' => 12]
        ]
    ],
    'alianzas' => [
        'title' => 'Nuestras Alianzas',
        'subsections' => [
            'general' => ['title' => 'Imágenes Generales', 'max_images' => 12]
        ]
    ],
    'galeria' => [
        'title' => 'Galería',
        'subsections' => [
            'general' => ['title' => 'Imágenes Generales', 'max_images' => 25]
        ]
    ]
];

// Convertir a formato plano para validación
$validSections = [];
foreach ($sections as $key => $data) {
    $validSections[$key] = array_keys($data['subsections']);
}

if (!isset($validSections[$section]) || !in_array($subsection, $validSections[$section])) {
    die(json_encode(['error' => 'Sección no válida']));
}

// 4. Directorio destino
$baseDir = __DIR__ . '/../img/uploads/';
$uploadDir = $baseDir . $section . '/' . $subsection . '/';

// Crear carpeta si no existe
if (!file_exists($uploadDir)) {
    $oldUmask = umask(0);
    $dirCreated = mkdir($uploadDir, 0777, true);
    umask($oldUmask);

    if (!$dirCreated) {
        die(json_encode(['error' => 'No se pudo crear directorio']));
    }

    // Protección del directorio
    file_put_contents($uploadDir . '.htaccess', 
        "deny from all\nphp_flag engine off\nRemoveHandler .php .phtml .php3");
}

// 5. Procesar archivos
$results = [];
foreach ($_FILES['images']['tmp_name'] as $i => $tmpName) {
    $originalName = $_FILES['images']['name'][$i];
    $fileError = $_FILES['images']['error'][$i];
    $fileSize = $_FILES['images']['size'][$i];

    if ($fileError !== UPLOAD_ERR_OK) {
        $results[] = ['file' => $originalName, 'error' => 'Error ' . $fileError];
        continue;
    }

    // Validar tipo MIME real
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $tmpName);
    finfo_close($finfo);

    if (!isset($allowedTypes[$mime])) {
        $results[] = ['file' => $originalName, 'error' => 'Tipo no permitido'];
        continue;
    }

    // Validar tamaño
    if ($fileSize > $maxFileSize) {
        $results[] = ['file' => $originalName, 'error' => 'Archivo demasiado grande'];
        continue;
    }

    // Sanitizar nombre original
    $safeName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', basename($originalName));
    $targetPath = $uploadDir . $safeName;

    // Sobrescribir el archivo si ya existe
    $content = file_get_contents($tmpName);
    if ($content === false) {
        $results[] = ['file' => $originalName, 'error' => 'No se pudo leer el archivo temporal'];
        continue;
    }

    $bytesWritten = file_put_contents($targetPath, $content);
    if ($bytesWritten === false || $bytesWritten === 0) {
        $results[] = ['file' => $originalName, 'error' => 'Error al escribir archivo'];
        continue;
    }

    // Verificar integridad
    if (filesize($targetPath) !== $fileSize) {
        unlink($targetPath);
        $results[] = ['file' => $originalName, 'error' => 'Error de integridad'];
        continue;
    }

    $results[] = ['file' => $originalName, 'success' => $safeName];
}

// 6. Respuesta final
$successCount = count(array_filter($results, fn($r) => isset($r['success'])));
if ($successCount > 0) {
    echo json_encode([
        'success' => true,
        'count' => $successCount,
        'files' => array_map(fn($r) => $r['success'], array_filter($results, fn($r) => isset($r['success']))),
        'section' => $section,
        'subsection' => $subsection
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'No se pudo subir ningún archivo',
        'details' => $results
    ]);
}
?>
