<?php 

class BaseDeDatos{
    private $host = "localhost";
    private $bd = "papushop_db";
    private $usuario = "root";
    private $password = "";

    function conectar(){

        try{
            $pdo = "mysql:host={$this->host}; dbname={$this->bd}";
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            return new PDO($pdo, $this->usuario, $this->password, $opciones);
        }catch (PDOException $error){
            die("Error de conexión" . $error->getMessage());
        }
    }
}

?>