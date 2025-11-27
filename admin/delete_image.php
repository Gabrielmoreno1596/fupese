<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Validar parámetros
$required = ['file', 'section', 'subsection'];
foreach ($required as $param) {
    if (!isset($_GET[$param])) {
        header("Location: index.php?error=missing_data");
        exit;
    }
}

$filename = basename($_GET['file']);
$section = $_GET['section'];
$subsection = $_GET['subsection'];
$filepath = "../img/uploads/$section/$subsection/$filename";

// Eliminar archivo
if (file_exists($filepath)) {
    if (unlink($filepath)) {
        // Renumerar imágenes restantes
        $images = glob("../img/uploads/$section/$subsection/*.{jpg,jpeg,png,webp}", GLOB_BRACE);
        natsort($images);
        
        foreach ($images as $index => $image) {
            $newNumber = $index + 1;
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $newName = "../img/uploads/$section/$subsection/$newNumber.$extension";
            
            if ($image !== $newName) {
                rename($image, $newName);
            }
        }
        
        $params = [
            'section' => $section,
            'subsection' => $subsection,
            'success' => 'deleted'
        ];
    } else {
        $params = [
            'section' => $section,
            'subsection' => $subsection,
            'error' => 'delete_failed'
        ];
    }
} else {
    $params = [
        'section' => $section,
        'subsection' => $subsection,
        'error' => 'file_not_found'
    ];
}

header("Location: index.php?" . http_build_query($params));
exit;
?>