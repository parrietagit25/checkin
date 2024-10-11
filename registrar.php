<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  

include 'conexion/functions.php';

$db = new Check_in();

if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['firma'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $firma = $_POST['firma'];  

    $firma = str_replace('data:image/png;base64,', '', $firma);
    $firma = str_replace(' ', '+', $firma);
    $firma_data = base64_decode($firma);

    $file = 'firmas/' . uniqid() . '.png';
    file_put_contents($file, $firma_data);

    $guardar_user = $db->insert_user($nombre, $apellido, $email, $file);

    if ($guardar_user) {
        echo "Registro completado con éxito";

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

            $mail->addAttachment($file);  

            $mail->isHTML(true);
            $mail->Subject = 'Bienvenido a GRUPO PCR - Terminos y Condiciones';

            $cuerpo = '
                <h1>Términos y Condiciones de Visitas a GRUPO PCR</h1>
                <p>Estimado(a) ' . $nombre . ' ' . $apellido . ',</p>
                <p>Gracias por registrarse como visitante en nuestras instalaciones. Al ingresar, acepta los siguientes términos:</p>
                <ul>
                    <li>Respetar las normas de seguridad y comportamiento adecuado.</li>
                    <li>Portar siempre la identificación de visitante.</li>
                    <li>No ingresar a áreas restringidas sin autorización.</li>
                    <li>El uso de dispositivos electrónicos está limitado a áreas permitidas.</li>
                </ul>
                <p>Adjunta a este correo se encuentra la firma electrónica que has realizado.</p>
                <p>Atentamente,</p>
                <p><strong>GRUPO PCR</strong></p>
            ';

            $mail->Body = $cuerpo;

            $mail->send();
            echo 'Correo enviado exitosamente.';
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

    $buscar_email = $db->buscar_email($email);
    while ($list = $buscar_email -> fetch_assoc()) {
        $contar = $list['contar'];
    }

    if ($contar >= 1) {
        $desplegar_datos = $db->desplegar_datos($email);
        while ($list = $desplegar_datos -> fetch_assoc()) {
            $id = $list['id'];
            $nombre = $list['nombre'];
            $apellido = $list['apellido'];
            $email = $list['email'];
            $departamento = $list['departamento'];
        }
   ?>

    <div>
        <p>Bienvenido <b><?php echo $nombre. ' ' .$apellido; ?></b> a Grupo PCR</p>
        <select class="form-control" id="miSelect" onchange="habilitar_boton()">
            <option value="">Seleccionar</option>
                <?php 
                $todos_emple = $db->todos_2($email);
                foreach ($todos_emple as $key => $value) { ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo utf8_encode($value['nombre']). ' ' .utf8_encode($value['apellido']); ?></option>
                <?php } ?>
        </select>
        <br>
        <br>
        <a class="btn btn-lg btn-primary" id="solicitar_boton" href="#" role="button" onclick="solicitar_reg()" style="display:none;">Solicitar &raquo;</a>
    </div> <?php
    }

} else {
    echo "Error: No se recibieron todos los datos.";
}

?>
