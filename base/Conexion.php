<?php
require_once 'Conexion.php';
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 09:50 PM
 */

class Conexion {
    public $conexion;
    private $usuario = "root";
    private $password = "";
    private $host = "localhost";
    private $baseDatos = "comerlo";

    function __construct () {
        $this->conexion = mysqli_connect($this->host, $this->usuario, $this->password, $this->baseDatos);

        if ($this->conexion->connect_errno) {
            die("Fallo la conexión con la base de datos"
                . $this->conexion->mysqli_connect_errno()
                . " - " . $this->conexion->mysqli_connect_error());
        }
    }
}