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

$webhookUrl = "https://pcrgrupo.webhook.office.com/webhookb2/c0c0b3d9-e0e2-47fb-8907-c9ef5ea6a23f@d3479728-038d-4986-8583-0bcaa8999569/IncomingWebhook/67eb5f2f15ca4278b17595f20602e237/63f1d382-382b-46eb-9090-7fdb9cce2616";

$message = [
    "type" => "message",
    "text" => "<at>".$nombre." ".$apellido."</at>, Lo solicitan en la recepcion.",
    "entities" => [
        [
            "type" => "mention",
            "text" => "<at>".$nombre." ".$apellido."</at>",
            "mentioned" => [
                "id" => $email,
                "name" => "".$nombre." ".$apellido.""
            ]
        ]
    ]
];

$ch = curl_init($webhookUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));

$response = curl_exec($ch);

if(curl_errno($ch)){
    //echo 'Error:' . curl_error($ch);
} else {
    //echo 'Mensaje enviado correctamente a Microsoft Teams';
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

curl_close($ch); 

?>
<h2>Ya se solicito a <?php echo $nombre." ".$apellido; ?>, en momentos estara con usted.</h2>