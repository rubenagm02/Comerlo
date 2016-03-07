<?php
require_once 'Conexion.php';
require_once 'Usuario.php';
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 10:09 PM
 */

class DaoCliente extends Conexion {

    public function insertar (Cliente $cliente) {
        $query = "INSERT INTO Cliente VALUES (DEFAULT,
                      '{$cliente->getNombre()}',
                      '{$cliente->getRazonSocial()}',
                      '{$cliente->getRfc()}',
                      '{$cliente->getNombreContacto()}',
                      '{$cliente->getTelefono()}',
                      '{$cliente->getCorreo()}',
                      '{$cliente->getObservaciones()}',
                      {$cliente->getUsuario()});";

        $consulta = $this->conexion->query($query);

        if ($query) {

            return true;
        } else {

            return false;
        }
    }

    public function actualizar (Cliente $cliente) {
        $query = "UPDATE Cliente SET
                      Nombre = '{$cliente->getNombre()}',
                      RazonSocial = '{$cliente->getRazonSocial()}',
                      RFC = '{$cliente->getRfc()}',
                      NombreContacto = '{$cliente->getNombreContacto()}',
                      Telefono = '{$cliente->getTelefono()}',
                      Correo = '{$cliente->getCorreo()}',
                      Observaciones = '{$cliente->getObservaciones()}',
                      Usuario = {$cliente->getUsuario()})
                      WHERE Id = {$cliente->getId()};";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return true;
        } else {

            return false;
        }
    }

    public function consultar ($id) {
        $query = "SELECT * FROM Cliente WHERE Id = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->crearObjeto($consulta->fetch_assoc());
        } else {

            return false;
        }
    }

    private function crearObjeto ($fila) {
        $cliente = new Cliente();
        $daoUsuario = new DaoUsuario();

        $cliente->setId($fila['Id']);
        $cliente->setNombre($fila['Nombre']);
        $cliente->setRazonSocial($fila['RazonSocial']);
        $cliente->setRfc($fila['RFC']);
        $cliente->setNombreContacto($fila['NombreContacto']);
        $cliente->setTelefono($fila['Telefono']);
        $cliente->setCorreo($fila['Correo']);
        $cliente->setObservaciones($fila['Observaciones']);
        $cliente->setUsuario($daoUsuario->consultar($fila['Usuario']));

        return $cliente;
    }
}

class Cliente {
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


}