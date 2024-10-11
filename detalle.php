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
        <br>
        <br>
        <h3>Firma:</h3>
        <canvas id="signature-pad" class="signature-pad" width=400 height=200 style="border: 1px solid black;"></canvas>
        <br>
        <button type="button" class="btn btn-secondary" id="clear-signature">Limpiar firma</button>
        <br><br>
        <a class="btn btn-lg btn-primary" id="reg_user" href="#" role="button" onclick="reg_user()">Registrar &raquo;</a>

   <?php }
    
}




