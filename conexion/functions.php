<?php 

include 'conn.php';

class Check_in extends Database{

    public function buscar_email($email){
            $db = new Database();
            $conn = $db->getMySQLConnection();
            $buscar_email = $conn -> query("SELECT count(*) as contar FROM user WHERE email = '".$email."'");
            return $buscar_email;
    }

    public function desplegar_datos($email){
            $db = new Database();
            $conn = $db->getMySQLConnection();
            $buscar_email = $conn -> query("SELECT * FROM user WHERE email = '".$email."'");
            return $buscar_email;
    }

    public function todos(){
            $db = new Database();
            $conn = $db->getMySQLConnection();
            $buscar_email = $conn -> query("SELECT * FROM user WHERE tipo_user in(1, 2, 3)");
            return $buscar_email;
    }

    public function getUserId($id){
        $db = new Database();
        $conn = $db->getMySQLConnection();
        $result = $conn->query("SELECT * FROM user WHERE id = '".$id."'");
        $usuarios = [];
        while ($usuario = $result->fetch_assoc()) {
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }

    public function insert_user($nombre, $apellido, $email, $firma_filename, $foto){
                $db = new Database();
                $conn = $db->getMySQLConnection();
                $insertar = $conn -> query("INSERT INTO user(nombre, apellido, email, firma, tipo_user, stat, departamento, foto)VALUES('".$nombre."', '".$apellido."', '".$email."', '".$firma_filename."', 3, 1, 'Visitas', '".$foto."')");
                return $insertar;
    }

    public function todos_2() {
        $db = new Database();
        $conn = $db->getMySQLConnection();
        $result = $conn->query("SELECT * FROM user WHERE tipo_user in(1, 2, 3)");
        $usuarios = [];
        while ($usuario = $result->fetch_assoc()) {
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }

}