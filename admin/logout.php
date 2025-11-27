<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>

<?php
session_start();

// Credenciales válidas (cambia esto en producción)
$validUser = "admin";
$validPass = "fupese123"; // Cambia esto por una contraseña segura

// Procesar login
if (isset($_POST['login'])) {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    
    if ($user === $validUser && $pass === $validPass) {
        $_SESSION['admin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}

// Si ya está logueado, redirigir
if (isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FUPESE Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/fupeselogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-box">
            <img src="../img/fupeselogo.png" alt="FUPESE Logo" class="login-logo">
            <h1>Acceso Administrativo</h1>
            
            <?php if (isset($error)): ?>
                <div class="alert error">
                    <i class="fas fa-exclamation-circle"></i> <?= $error ?>
                </div>
            <?php endif; ?>
            
            <form method="post">
                <div class="form-group">
                    <label for="user"><i class="fas fa-user"></i> Usuario</label>
                    <input type="text" id="user" name="user" required>
                </div>
                
                <div class="form-group">
                    <label for="pass"><i class="fas fa-lock"></i> Contraseña</label>
                    <input type="password" id="pass" name="pass" required>
                </div>
                
                <button type="submit" name="login" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </button>
            </form>
        </div>
    </div>
</body>
</html>