<?php
require_once 'Conexion.php';
require_once 'Usuario.php';
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 11:00 PM
 */

class DaoMermaProducto {

    public function insertar (MermaProducto $mermaProducto) {
        $query = "INSERT INTO MermaProducto VALUES (DEFAULT,
                      {$mermaProducto->getIdProducto()},
                      '{$mermaProducto->getDescripcion()}',
                      '{$mermaProducto->getFecha()}',
                      {$mermaProducto->getCantidad()},
                      {$mermaProducto->getUsuario()});";

        $consulta = $this->conexion->query($query);

        if ($query) {

            return true;
        } else {

            return false;
        }
    }

    public function consultar ($id) {
        $query = "SELECT * FROM MermaProducto WHERE Id = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->crearObjeto($consulta->fetch_assoc());
        } else {

            return false;
        }
    }

    private function crearObjeto ($fila) {
        $mermaProducto = new MermaProducto();
        $daoUsuario = new DaoUsuario();

        $mermaProducto->setId($fila['Id']);
        $mermaProducto->setIdProducto($fila['IdProducto']);
        $mermaProducto->setDescripcion($fila['Descripcion']);
        $mermaProducto->setFecha($fila['Fecha']);
        $mermaProducto->setCantidad($fila['Cantidad']);
        $mermaProducto->setUsuario($daoUsuario->consultar($fila['Usuario']));

        return $mermaProducto;
    }
}

class MermaProducto {
    private $id;
    private $idProducto;
    private $descripcion;
    private $fecha;
    private $cantidad;
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
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * @param mixed $idProducto
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
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