<?php

//--- MODELO QUE OPERA CONTRA LA BASE DE DATOS ---


//Incluye el fichero config/config.php (Datos de conexión de la base de datos)
require_once 'config/config.php';

class Db
{

    private $host;
    private $db;
    private $user;
    private $pass;
    public $conection;

    //Función que prueba la conexión a la base de datos, de lo contrario muestra un mensaje.
    public function __construct()
    {

        $this->host = constant('DB_HOST');
        $this->db = constant('DB');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');

        try {
            $this->conection = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->db, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
