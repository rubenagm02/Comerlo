<?php
require_once 'Conexion.php';
require_once 'Usuario.php';
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 10:54 PM
 */

class DaoCompraProducto extends Conexion {

    public function insertar (CompraProducto $compraProducto) {
        $query = "INSERT INTO CompraProducto VALUES (DEFAULT,
                      {$compraProducto->getIdProducto()},
                      {$compraProducto->getIdProveedor()},
                      '{$compraProducto->getDescripcion()}',
                      '{$compraProducto->getFactura()}',
                      '{$compraProducto->getFecha()}',
                      {$compraProducto->getCantidad()},
                      1,
                      {$compraProducto->getUsuario()});";

        $consulta = $this->conexion->query($query);

        if ($query) {

            return true;
        } else {

            return false;
        }
    }

    public function actualizar (CompraProducto $compraProducto) {
        $query = "UPDATE CompraProducto SET
                      Estatus = {$compraProducto->getEstatus()},
                      Usuario = {$compraProducto->getUsuario()}
                      WHERE Id = {$compraProducto->getId()};";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return true;
        } else {

            return false;
        }
    }

    public function consultar ($id) {
        $query = "SELECT * FROM CompraProducto WHERE Id = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->crearObjeto($consulta->fetch_assoc());
        } else {

            return false;
        }
    }

    private function crearObjeto ($fila) {
        $compraProducto = new CompraProducto();
        $daoUsuario = new DaoUsuario();

        $compraProducto->setId($fila['Id']);
        $compraProducto->setIdProducto($fila['IdProducto']);
        $compraProducto->setIdProveedor($fila['IdProveedor']);
        $compraProducto->setDescripcion($fila['Descripcion']);
        $compraProducto->setFactura($fila['Factura']);
        $compraProducto->setFecha($fila['Fecha']);
        $compraProducto->setCantidad($fila['Cantidad']);
        $compraProducto->setEstatus($fila['Estatus']);
        $compraProducto->setUsuario($daoUsuario->consultar($fila['Usuario']));

        return $compraProducto;
    }
}

class CompraProducto {

    private $id;
    private $idProveedor;
    private $idProducto;
    private $descripcion;
    private $factura;
    private $fecha;
    private $cantidad;
    private $estatus;
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
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * @param mixed $factura
     */
    public function setFactura($factura)
    {
        $this->factura = $factura;
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

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * @param mixed $idProveedor
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
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

}