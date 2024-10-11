<?php
include 'conexion/functions.php';
$db = new Check_in();

$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON, true);

$nombre = $data['nombre'];
$apellido = $data['apellido'];
$email = $data['email'];
$firma_base64 = $data['firma'];

$firma_data = explode(',', $firma_base64)[1];
$firma_decoded = base64_decode($firma_data);

$firma_filename = "firmas/" . uniqid() . ".png";

file_put_contents($firma_filename, $firma_decoded);

$insert_result = $db->insert_user($nombre, $apellido, $email, $firma_filename);

if ($insert_result) {
    $usuarios = $db->todos_2();

    $response = [
        'success' => true,
        'message' => "$nombre $apellido",
        'usuarios' => $usuarios 
    ];
} else {
    $response = [
        'success' => false,
        'message' => 'Error al guardar el usuario'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);

/* 
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

*/

?>
