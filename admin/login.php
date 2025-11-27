<?php
session_start();

// Credenciales válidas (debes cambiar esto en producción)
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
    <link rel="shortcut icon" href="../img/fupeselogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos específicos para la página de login */
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --error: #e74c3c;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--primary);
            color: var(--dark);
            line-height: 1.6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 400px;
        }
        
        .login-box {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            padding: 30px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-logo {
            height: 80px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        
        .login-logo:hover {
            transform: scale(1.05);
        }
        
        .login-box h1 {
            color: var(--primary);
            margin-bottom: 25px;
            font-size: 1.8rem;
        }
        
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-group input:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }
        
        .btn-login {
            background: var(--secondary);
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        
        .alert.error {
            background-color: rgba(231, 76, 60, 0.2);
            border-left: 4px solid var(--error);
            color: var(--error);
        }
        
        /* Efecto de onda al hacer hover en los inputs */
        .wave-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .wave-group .input {
            font-size: 16px;
            padding: 10px 10px 10px 5px;
            display: block;
            width: 100%;
            border: none;
            border-bottom: 1px solid #ccc;
            background: transparent;
        }
        
        .wave-group .input:focus {
            outline: none;
        }
        
        .wave-group .label {
            color: #999;
            font-size: 16px;
            font-weight: normal;
            position: absolute;
            pointer-events: none;
            left: 5px;
            top: 10px;
            display: flex;
            gap: 5px;
            align-items: center;
            transition: 0.2s ease all;
        }
        
        .wave-group .input:focus ~ .label,
        .wave-group .input:valid ~ .label {
            top: -20px;
            font-size: 14px;
            color: var(--secondary);
        }
        
        .wave-group .bar {
            position: relative;
            display: block;
            width: 100%;
        }
        
        .wave-group .bar:before,
        .wave-group .bar:after {
            content: '';
            height: 2px;
            width: 0;
            bottom: 1px;
            position: absolute;
            background: var(--secondary);
            transition: 0.2s ease all;
        }
        
        .wave-group .bar:before {
            left: 50%;
        }
        
        .wave-group .bar:after {
            right: 50%;
        }
        
        .wave-group .input:focus ~ .bar:before,
        .wave-group .input:focus ~ .bar:after {
            width: 50%;
        }
        
        /* Responsive */
        @media (max-width: 480px) {
            .login-box {
                padding: 20px;
            }
            
            .login-box h1 {
                font-size: 1.5rem;
            }
        }
    </style>
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
                <div class="wave-group">
                    <input type="text" id="user" name="user" class="input" required>
                    <span class="bar"></span>
                    <label class="label">
                        <i class="fas fa-user"></i>
                        <span>Usuario</span>
                    </label>
                </div>
                
                <div class="wave-group">
                    <input type="password" id="pass" name="pass" class="input" required>
                    <span class="bar"></span>
                    <label class="label">
                        <i class="fas fa-lock"></i>
                        <span>Contraseña</span>
                    </label>
                </div>
                
                <button type="submit" name="login" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </button>
            </form>
        </div>
    </div>
</body>
</html>