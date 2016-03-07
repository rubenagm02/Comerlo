<?php
require_once 'Conexion.php';
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 09:46 PM
 */

class DaoProducto extends Conexion {

    public function insertar (Producto $producto) {
        $query = "INSERT INTO Producto VALUES (DEFAULT,
                      '{$producto->getNombre()}',
                      '{$producto->getDescripcion()}',
                      '{$producto->getNumeroIdentificacion()}',
                      '{$producto->getMedida()}',
                      {$producto->getEstatus()},
                      {$producto->getPrecio()},
                      0);";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return true;
        } else {

            return false;
        }
    }

    public function actualizar (Producto $producto) {
        $query = "UPDATE Prodcuto SET
                      Nombre = '{$producto->getNombre()}',
                      Descripcion = '{$producto->getDescripcion()}',
                      NumeroIdentificacion = '{$producto->getNumeroIdentificacion()}',
                      Medida = '{$producto->getMedida()}',
                      Estatus = {$producto->getEstatus()},
                      Precio = {$producto->getPrecio()},
                      Usuario = {$producto->getUsuario()}
                      WHERE Id = {$producto->getId()}";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return true;
        } else {

            return false;
        }
    }

    public function consultar ($id) {
        $query = "SELECT * FROM Producto WHERE Id = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->crearObjeto($consulta->fetch_assoc());
        } else {

            return false;
        }
    }

    private function crearObjeto ($fila) {
        $producto = new Producto();

        $producto->setId($fila['Id']);
        $producto->setNombre($fila['Nombre']);
        $producto->setNumeroIdentificacion($fila['NumeroIdentificacion']);
        $producto->setMedida($fila['Medida']);
        $producto->setEstatus($fila['Estatus']);
        $producto->setPrecio($fila['Precio']);
        $producto->setExistencia($fila['Existencia']);
        $producto->setUsuario($fila['Usuario']);

        return $producto;
    }
}

class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $numeroIdentificacion;
    private $medida;
    private $estatus;
    private $precio;
    private $existencia;
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
    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }

    /**
     * @param mixed $numeroIdentificacion
     */
    public function setNumeroIdentificacion($numeroIdentificacion)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;
    }

    /**
     * @return mixed
     */
    public function getMedida()
    {
        return $this->medida;
    }

    /**
     * @param mixed $medida
     */
    public function setMedida($medida)
    {
        $this->medida = $medida;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getExistencia()
    {
        return $this->existencia;
    }

    /**
     * @param mixed $existencia
     */
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;
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