<?php

namespace App;

use PDO;
use PDOException;

class Database{
    public $mysql;

    public function __construct(){
        /*try {
            $conexion = new PDO("mysql:host=$server;dbname=$nameDatabase", $user, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            echo "Conexión correcta";
        }
        catch (PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
        }*/
    

        try {
            $this->mysql = $this->getConnection();
        } catch (PDOException $ex){
            echo "Conexion fallida: " . $ex->getMessage();
        }
    }

    private function getConnection(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database= "adventures";

        $charset = "utf-8";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo= new PDO("mysql:host={$host};dbname={$database};charset{$charset}", $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );            

        return $pdo;
    }
}