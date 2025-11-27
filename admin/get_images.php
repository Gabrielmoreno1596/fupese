<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('HTTP/1.1 403 Forbidden');
    exit;
}

$section = preg_replace('/[^a-z\-]/', '', $_GET['section'] ?? '');
$subsection = preg_replace('/[^a-z\-]/', '', $_GET['subsection'] ?? '');

$imageDir = "../img/uploads/$section/$subsection/";
$images = [];

if (file_exists($imageDir)) {
    foreach (glob($imageDir . '*.{jpg,jpeg,png,webp}', GLOB_BRACE) as $file) {
        $images[] = [
            'name' => basename($file),
            'size' => filesize($file),
            'modified' => filemtime($file)
        ];
    }
}

// Ordenar por nombre (numérico)
usort($images, function($a, $b) {
    return strnatcmp($a['name'], $b['name']);
});

header('Content-Type: application/json');
echo json_encode($images);
?>