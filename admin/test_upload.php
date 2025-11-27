<?php
// Test de configuración del servidor
header('Content-Type: text/plain');
echo "=== Prueba de Configuración ===\n\n";

// 1. Verificar permisos
$testDir = __DIR__.'/../img/uploads/test/';
if (!file_exists($testDir)) {
    if (!mkdir($testDir, 0755, true)) {
        die("✗ No se pudo crear el directorio de prueba\n");
    }
    echo "✓ Directorio de prueba creado\n";
} else {
    echo "✓ Directorio de prueba existe\n";
}

// 2. Verificar escritura
$testFile = $testDir.'test_'.time().'.txt';
if (file_put_contents($testFile, 'Prueba de escritura')) {
    echo "✓ Escritura de archivos funcionando\n";
    unlink($testFile);
} else {
    echo "✗ Error en escritura de archivos\n";
}

// 3. Verificar configuración PHP
echo "\n=== Configuración PHP ===\n";
$settings = [
    'upload_max_filesize',
    'post_max_size',
    'memory_limit',
    'max_execution_time',
    'open_basedir',
    'disable_functions'
];

foreach ($settings as $setting) {
    echo "$setting: ".ini_get($setting)."\n";
}

// 4. Verificar funciones requeridas
echo "\n=== Funciones Requeridas ===\n";
$requiredFunctions = [
    'move_uploaded_file',
    'copy',
    'rename',
    'unlink',
    'finfo_open'
];

foreach ($requiredFunctions as $func) {
    echo $func.': '.(function_exists($func) ? '✓' : '✗')."\n";
}

// 5. Probar subida simulada
echo "\n=== Prueba de Subida Simulada ===\n";
$fakeFile = [
    'name' => 'test.jpg',
    'type' => 'image/jpeg',
    'tmp_name' => tempnam(sys_get_temp_dir(), 'test'),
    'error' => 0,
    'size' => 1024
];

file_put_contents($fakeFile['tmp_name'], 'datos de prueba');

if (move_uploaded_file($fakeFile['tmp_name'], $testDir.'test.jpg')) {
    echo "✓ move_uploaded_file funcionando\n";
} elseif (copy($fakeFile['tmp_name'], $testDir.'test.jpg')) {
    echo "✓ copy funcionando (fallback)\n";
} else {
    echo "✗ No se pudo mover/copiar el archivo\n";
}

// Limpieza
@unlink($testDir.'test.jpg');
?>