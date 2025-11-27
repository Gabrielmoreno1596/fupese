<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $telefono = htmlspecialchars(trim($_POST["telefono"]));
    $correo = htmlspecialchars(trim($_POST["correo"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    if (empty($nombre) || empty($correo) || empty($mensaje)) {
        echo "<script>alert('Por favor completa todos los campos requeridos.'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Correo electrónico inválido.'); window.history.back();</script>";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP Gmail
        $mail->addCustomHeader('X-Mailer', 'PHP/' . phpversion());
$mail->addCustomHeader('X-Priority', '3'); // prioridad normal
$mail->addCustomHeader('X-MSMail-Priority', 'Normal');
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sitioweb.fupese@gmail.com'; // TU CORREO GMAIL
        $mail->Password   = 'ospo vrat vbdk mzio'; // (contraseña de aplicación)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // Remitente y destinatario
$mail->setFrom('sitioweb.fupese@gmail.com', 'Formulario FUPESE');
$mail->addAddress('fupese.contacto@gmail.com', 'SITIO WEB FUPESE');
$mail->addReplyTo($correo, $nombre); // <- Esto es nuevo
$mail->addReplyTo($correo, $nombre);
$mail->addCustomHeader('X-Mailer', 'PHP/' . phpversion());
$mail->addCustomHeader('X-Priority', '3');
$mail->addCustomHeader('X-MSMail-Priority', 'Normal');

$mail->isHTML(true);
$mail->Subject = "📬 Mensaje de $nombre desde formulario FUPESE";
$mail->Body    = "
    <h2>Nuevo mensaje recibido</h2>
    <p><b>Nombre:</b> $nombre</p>
    <p><b>Teléfono:</b> $telefono</p>
    <p><b>Correo electrónico:</b> $correo</p>
    <p><b>Mensaje:</b><br>$mensaje</p>
";
$mail->AltBody = "Nuevo mensaje recibido\nNombre: $nombre\nTeléfono: $telefono\nCorreo: $correo\nMensaje:\n$mensaje"; // <- Esto es nuevo


        $mail->send();
        header("Location: contacto.php?exito=1");
exit;

    } catch (Exception $e) {
        
    }
} else {
   
    exit;
}
?>
