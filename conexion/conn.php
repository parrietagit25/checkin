<?php 

class Database {
    private $mysql_host = "localhost";
    private $mysql_db_name = "check-in";
    private $mysql_username = "root";
    private $mysql_password = "";
    /*
    private $mysql_host = "localhost";
    private $mysql_db_name = "check-in";
    private $mysql_username = "root";
    private $mysql_password = "elchamo1787$$$";
    */

    protected $conn;

    public function getMySQLConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->mysql_host, $this->mysql_username, $this->mysql_password, $this->mysql_db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Error de conexión MySQL: " . $this->conn->connect_error);
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        return $this->conn;
    }

    public function disconnect() {
        if ($this->conn !== null) {
            $this->conn->close();
        }
    }
}
