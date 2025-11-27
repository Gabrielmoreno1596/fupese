<?php
// test_upload_env.php
header('Content-Type: text/plain');
echo "=== DIAGNÓSTICO DE SUBIDA DE ARCHIVOS ===\n\n";

// 1. Verificar sesión y permisos
session_start();
echo "1. Verificación de sesión admin: ";
echo isset($_SESSION['admin']) ? "✓ OK\n" : "✗ No autenticado\n";

// 2. Verificar directorio de uploads
$uploadDir = '../img/uploads/test_' . time() . '/';
echo "\n2. Prueba de directorio:\n";
echo "Intentando crear: $uploadDir\n";

if (!mkdir($uploadDir, 0755, true)) {
    echo "✗ Error creando directorio\n";
    echo "Permisos padre: " . substr(sprintf('%o', fileperms('../img/uploads/')), -4) . "\n";
    echo "Usuario: " . get_current_user() . "\n";
} else {
    echo "✓ Directorio creado\n";
    
    // 3. Verificar escritura
    $testFile = $uploadDir . 'test.txt';
    echo "\n3. Prueba de escritura:\n";
    if (file_put_contents($testFile, 'Prueba')) {
        echo "✓ Archivo creado\n";
        echo "Tamaño: " . filesize($testFile) . " bytes\n";
        unlink($testFile);
    } else {
        echo "✗ Error escribiendo archivo\n";
    }
    
    rmdir($uploadDir);
}

// 4. Verificar configuración PHP
echo "\n4. Configuración PHP relevante:\n";
$settings = [
    'file_uploads',
    'upload_max_filesize',
    'post_max_size',
    'memory_limit',
    'max_execution_time',
    'upload_tmp_dir',
    'open_basedir'
];

foreach ($settings as $setting) {
    echo "$setting: " . ini_get($setting) . "\n";
}

// 5. Verificar funciones deshabilitadas
echo "\n5. Funciones deshabilitadas:\n";
echo "disable_functions: " . ini_get('disable_functions') . "\n";

// 6. Probar subida simulada
echo "\n6. Prueba de subida simulada:\n";
$tmpFile = tempnam(sys_get_temp_dir(), 'test');
file_put_contents($tmpFile, 'Contenido de prueba');

if (move_uploaded_file($tmpFile, $uploadDir . 'test_moved.txt')) {
    echo "✓ move_uploaded_file funciona\n";
} else {
    echo "✗ move_uploaded_file falló\n";
    
    // Intentar con copy
    if (copy($tmpFile, $uploadDir . 'test_copy.txt')) {
        echo "✓ copy funciona\n";
        unlink($uploadDir . 'test_copy.txt');
    } else {
        echo "✗ copy también falló\n";
    }
}

unlink($tmpFile);
?>