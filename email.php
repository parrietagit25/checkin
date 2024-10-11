<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Instanciar PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor de correo
    $mail->isSMTP();
    $mail->Host       = 'smtp.ejemplo.com';  // Especifica el servidor SMTP
    $mail->SMTPAuth   = true;                 // Habilita la autenticación SMTP
    $mail->Username   = 'tu-email@ejemplo.com';  // Usuario SMTP
    $mail->Password   = 'tu-contraseña';         // Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Habilita encriptación TLS
    $mail->Port       = 587;  // Puerto TCP para TLS

    // Destinatarios
    $mail->setFrom('tu-email@ejemplo.com', 'Tu Nombre');
    $mail->addAddress('destinatario@ejemplo.com', 'Destinatario');     // Añade un destinatario

    // Contenido del correo
    $mail->isHTML(true);                                  // Habilita el formato HTML
    $mail->Subject = 'Asunto del correo';
    $mail->Body    = 'Este es el cuerpo del mensaje <b>en HTML</b>';
    $mail->AltBody = 'Este es el cuerpo del mensaje en texto plano';

    // Enviar correo
    $mail->send();
    echo 'El mensaje ha sido enviado correctamente';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}


