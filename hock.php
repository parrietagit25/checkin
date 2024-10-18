<?php
include 'conexion/functions.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';  
$db = new Check_in();
$algo = $db->getUserId($_POST['id_usuario']);
foreach ($algo as $key => $value) {
    $nombre = $value['nombre'];
    $apellido = $value['apellido'];
    $email = $value['email'];
}

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';    
    $mail->SMTPAuth   = true;
    $mail->Username   = 'notificaciones@grupopcr.com.pa';
    $mail->Password   = 'ghhpsqstqbfyscpc';    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   
    $mail->Port       = 587;

    $mail->setFrom('notificaciones@grupopcr.com.pa', 'GRUPO PCR');
    $mail->addAddress($email, $nombre . ' ' . $apellido); 

    //$mail->addAttachment($file);  

    $mail->isHTML(true);
    $mail->Subject = 'Alguien lo solicita en recepcion';

    $cuerpo = '
        <h1>Buen dia </h1>
        <p>Estimado(a) ' . $nombre . ' ' . $apellido . ',</p>
        <p>Estas siendo solicitado en el Lobby de TCP</p>';

    $mail->Body = $cuerpo;

    $mail->send();
    //echo 'Correo enviado exitosamente.';
} catch (Exception $e) {
    //echo "Error al enviar el correo: {$mail->ErrorInfo}";
}

?>
<h2>Ya se solicito a <?php echo $nombre." ".$apellido; ?>, en momentos estara con usted.</h2>