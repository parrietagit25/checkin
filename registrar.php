<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  

include 'conexion/functions.php';

$db = new Check_in();

if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['firma'], $_POST['foto'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $firma = $_POST['firma'];  
    $foto = $_POST['foto'];  // Foto en base64

    // Proceso para guardar la firma
    $firma = str_replace('data:image/png;base64,', '', $firma);
    $firma = str_replace(' ', '+', $firma);
    $firma_data = base64_decode($firma);

    $firma_file = 'firmas/' . uniqid() . '.png';
    file_put_contents($firma_file, $firma_data);

    // Proceso para guardar la foto
    $foto = str_replace('data:image/png;base64,', '', $foto);
    $foto = str_replace(' ', '+', $foto);
    $foto_data = base64_decode($foto);

    $foto_file = 'fotos/' . uniqid() . '.png';  // Guardar en el directorio 'fotos'
    file_put_contents($foto_file, $foto_data);

    // Insertar usuario en la base de datos, ahora también con la ruta de la foto
    $guardar_user = $db->insert_user($nombre, $apellido, $email, $firma_file, $foto_file);  // Asumiendo que la función ahora acepta foto

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

            // Adjuntar firma y foto al correo
            $mail->addAttachment($firma_file);  
            $mail->addAttachment($foto_file);  // Añadir la foto como archivo adjunto

            $mail->isHTML(true);
            $mail->Subject = 'Bienvenido a GRUPO PCR - Terminos y Condiciones';

            $cuerpo = '
                Términos y Condiciones de Visita
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
                seguro y ordenado para todos.
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
