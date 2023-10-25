<?php
//Crear un archivo "config.php" que contendrá la configuración de la API, como la conexión a la base de datos y las claves de API.

// define('BD_HOST', 'localhost');
// define('BD_NAME', 'bd_clase25');
// define('BD_USER', 'root');
// define('BD_PASS', '');

class CConfig{
    private $host = 'localhost';
    private $dbname = 'bd_clase25';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }
        return $this->conn;
    } 
}      
?>
    