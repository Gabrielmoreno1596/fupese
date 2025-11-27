<?php
if (mail("gabriel.moreno.1596@gmail.com", "Prueba de correo", "Este es un correo de prueba")) {
    echo "Correo enviado correctamente.";
} else {
    echo "Fallo el envío de correo.";
}
?>
