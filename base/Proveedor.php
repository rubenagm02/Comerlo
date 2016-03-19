<?php
require_once 'Conexion.php';
require_once 'Usuario.php';
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 10:33 PM
 */

class DaoProveedor extends Conexion {

    public function insertar (Proveedor $proveedor) {
        $query = "INSERT INTO Proveedor VALUES (DEFAULT,
                      '{$proveedor->getNombre()}',
                      '{$proveedor->getRazonSocial()}',
                      '{$proveedor->getRfc()}',
                      '{$proveedor->getNombreContacto()}',
                      '{$proveedor->getTelefono()}',
                      '{$proveedor->getCorreo()}',
                      '{$proveedor->getObservaciones()}',
                      {$proveedor->getUsuario()});";

        $consulta = $this->conexion->query($query);

        if ($query) {

            return true;
        } else {

            return false;
        }
    }

    public function actualizar (Proveedor $proveedor) {
        $query = "UPDATE Proveedor SET
                      Nombre = '{$proveedor->getNombre()}',
                      RazonSocial = '{$proveedor->getRazonSocial()}',
                      RFC = '{$proveedor->getRfc()}',
                      NombreContacto = '{$proveedor->getNombreContacto()}',
                      Telefono = '{$proveedor->getTelefono()}',
                      Correo = '{$proveedor->getCorreo()}',
                      Observaciones = '{$proveedor->getObservaciones()}',
                      Usuario = {$proveedor->getUsuario()}
                      WHERE Id = {$proveedor->getId()};";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return true;
        } else {

            return false;
        }
    }

    public function consultar ($id) {
        $query = "SELECT * FROM Proveedor WHERE Id = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->crearObjeto($consulta->fetch_assoc());
        } else {

            return false;
        }
    }

    public function consultarTodo(){
        $query = "SELECT * FROM Proveedor";

        $consulta = $this->conexion->query($query);

        if ($consulta) {
            $resultado = array();

            for ($x = 0; $x < $consulta->num_rows; $x++) {
                $consulta->data_seek($x);
                array_push($resultado, $this->crearObjeto($consulta->fetch_assoc()));

            }
            return $resultado;
        } else {

            return false;
        }
    }

    private function crearObjeto ($fila) {
        $proveedor = new Proveedor();
        $daoUsuario = new DaoUsuario();

        $proveedor->setId($fila['Id']);
        $proveedor->setNombre($fila['Nombre']);
        $proveedor->setRazonSocial($fila['RazonSocial']);
        $proveedor->setRfc($fila['RFC']);
        $proveedor->setNombreContacto($fila['NombreContacto']);
        $proveedor->setTelefono($fila['Telefono']);
        $proveedor->setCorreo($fila['Correo']);
        $proveedor->setObservaciones($fila['Observaciones']);
        $proveedor->setUsuario($daoUsuario->consultar($fila['Usuario']));

        return $proveedor;
    }
}

class Proveedor {

    private $id;
    private $nombre;
    private $razonSocial;
    private $rfc;
    private $nombreContacto;
    private $telefono;
    private $correo;
    private $observaciones;
    private $usuario;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * @param mixed $razonSocial
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    }

    /**
     * @return mixed
     */
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    /**
     * @param mixed $nombreContacto
     */
    public function setNombreContacto($nombreContacto)
    {
        $this->nombreContacto = $nombreContacto;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @param mixed $rfc
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;
    }


}