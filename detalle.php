<?php
include 'conexion/functions.php';

$db = new Check_in();

if (isset($_POST['buscar'])) {

    $email = $_POST['email'];
    
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
        <select class="form-control" id="miSelect" onchange="habilitar_boton()" >
            <option value="">Seleccionar</option>
                <?php 
                $todos_emple = $db->todos_2($_POST['email']);
                foreach ($todos_emple as $key => $value) { ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo utf8_encode($value['nombre']). ' ' .utf8_encode($value['apellido']); ?></option>
                <?php } ?>
        </select>
        <br>
        <br>
        <a class="btn btn-lg btn-primary" id="solicitar_boton" href="#" role="button" onclick="solicitar()" style="display:none;">Solicitar &raquo;</a>
    </div>

  <?php }else{ ?>

        <h2>Por favor Ingrese los datos solicitados</h2>
        <label for="">Nombre</label>
        <input type="text" name="" id="nombre_reg" class="form-control" style="width:100%;">
        <label for="">Apellido</label>
        <input type="text" name="" id="apellido_reg" class="form-control" style="width:100%;">
        <label for="">Email</label>
        <input type="text" name="" id="email_reg" class="form-control" style="width:100%;" value="<?php echo $_POST['email']; ?>">
        <label for="">Términos y Condiciones de Visita</label>
        <textarea name="" id="" class="form-control" readonly>
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
        </textarea>
        <br>

        <!-- Firma -->
        <h3>Firma:</h3>
        <canvas id="signature-pad" class="signature-pad" width=400 height=200 style="border: 1px solid black;"></canvas>
        <br>
        <button type="button" class="btn btn-secondary" id="clear-signature">Limpiar firma</button>
        <br><br>

        <!-- Captura de foto -->
        <h3>Foto:</h3>
        <video id="video" width="320" height="240" autoplay></video>
        <br>
        <button type="button" class="btn btn-primary" id="snap">Tomar Foto</button>
        <br><br>
        <canvas id="canvas" width="320" height="240" style="display: none;"></canvas>
        <input type="hidden" id="foto" name="foto">

        <!-- Botón para enviar -->
        <a class="btn btn-lg btn-primary" id="reg_user" href="#" role="button" onclick="reg_user()">Registrar &raquo;</a>

   <?php }
    
}
?>
