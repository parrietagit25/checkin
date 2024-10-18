<?php


/*
include 'conexion/functions.php';

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

        $mail->addAttachment($firma_filename, 'Firma.png');

        $mail->isHTML(true); 
        $mail->Subject = 'GRUPO PCR - Registro de visitas '.$nombre . ' ' . $apellido;
        $mail->Body    = 'Términos y Condiciones de Visita
                            Al acceder y utilizar las instalaciones de GRUPO PCR, los visitantes aceptan cumplir con los 
                            siguientes términos y condiciones, diseñados para garantizar la seguridad, el orden y la conservación del entorno.

                            Aceptación de Normas

                            Todo visitante se compromete a respetar y acatar las normas establecidas por GRUPO PCR, las cuales están diseñadas 
                            para garantizar la seguridad y el bienestar de todos los visitantes y el correcto funcionamiento del establecimiento.
                            Comportamiento y Orden

                            Los visitantes deberán mantener un comportamiento adecuado en todo momento. Cualquier conducta que altere el orden, la paz o 
                            que afecte negativamente la experiencia de otros visitantes o el estado de las instalaciones estará sujeta a la expulsión del lugar sin previo aviso.
                            Conservación del Entorno

                            Se espera que los visitantes colaboren en la preservación del entorno, evitando causar daño a las instalaciones, mobiliario, 
                            jardines o cualquier otro bien. Está estrictamente prohibido tirar basura fuera de los recipientes designados.
                            Prohibiciones

                            Está prohibido el ingreso de objetos peligrosos, sustancias ilícitas, y cualquier elemento que pueda poner en riesgo la seguridad 
                            del lugar o de las personas. Asimismo, el consumo de alcohol fuera de las áreas autorizadas no está permitido.
                            Acceso y Responsabilidad

                            Los visitantes deben seguir las indicaciones del personal de GRUPO PCR en todo momento. Cualquier incidente o accidente 
                            que ocurra debido al incumplimiento de estas normas será responsabilidad exclusiva del visitante.
                            Uso de las Instalaciones

                            Las instalaciones deberán ser utilizadas exclusivamente para los fines permitidos. El uso indebido de cualquier espacio o recurso 
                            dentro de GRUPO PCR será sancionado y puede resultar en la expulsión del visitante.
                            Política de Fotografías y Videos

                            La toma de fotografías y videos está permitida solo en las áreas designadas. No se permite el uso de drones sin autorización previa.
                            Modificaciones de los Términos

                            GRUPO PCR se reserva el derecho de modificar estos términos y condiciones en cualquier momento, sin previo aviso. Cualquier 
                            cambio será publicado en nuestras plataformas oficiales y entrará en vigor inmediatamente.
                            Al ingresar a nuestras instalaciones, usted acepta estos términos y condiciones. Su cooperación es fundamental para mantener un entorno 
                            seguro y ordenado para todos.';

        $mail->AltBody = 'Visitas Grupo PCR';

        $mail->send();
        //echo 'El mensaje ha sido enviado correctamente';
    } catch (Exception $e) {
        //echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    $response = [
        'success' => false,
        'message' => 'Error al guardar el usuario'
    ];
}

header('Content-Type: application/json');
echo json_encode($response); */
?>
