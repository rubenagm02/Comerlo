<?php
require_once 'Conexion.php';
require_once 'Usuario.php';
require_once 'DetalleVentaProducto.php';
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/03/2016
 * Time: 10:41 PM
 */

class DaoVentaProducto extends Conexion {

    public function insertar (VentaProducto $ventaProducto) {
        $query = "INSERT INTO VentaProducto VALUES (DEFAULT,
                      {$ventaProducto->getIdProducto()},
                      {$ventaProducto->getIdCliente()},
                      '{$ventaProducto->getDescripcion()}',
                      '{$ventaProducto->getFactura()}',
                      {$ventaProducto->getTotal()},
                      '{$ventaProducto->getFecha()}',
                      {$ventaProducto->getCantidad()},
                      1,
                      {$ventaProducto->getUsuario()});";

        $consulta = $this->conexion->query($query);

        if ($query) {
            $daoDetalleVentaProducto = new DaoDetalleVentaProducto();

            //Se insertan los productos
            $productos = $ventaProducto->getProductos();

            foreach ($productos as $producto) {

                $daoDetalleVentaProducto->insertar($producto);
            }
            return $this->conexion->insert_id;
        } else {

            return false;
        }
    }

    public function actualizar (VentaProducto $ventaProducto) {
        $query = "UPDATE VentaProducto SET
                      Estatus = {$ventaProducto->getEstatus()},
                      Usuario = {$ventaProducto->getUsuario()}
                      WHERE Id = {$ventaProducto->getId()};";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return true;
        } else {

            return false;
        }
    }

    public function consultar ($id) {
        $query = "SELECT * FROM VentaProducto WHERE Id = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->crearObjeto($consulta->fetch_assoc());
        } else {

            return false;
        }
    }

    private function crearObjeto ($fila) {
        $ventaProducto = new VentaProducto();
        $daoUsuario = new DaoUsuario();

        $ventaProducto->setId($fila['Id']);
        $ventaProducto->setIdProducto($fila['IdProducto']);
        $ventaProducto->setIdCliente($fila['IdCliente']);
        $ventaProducto->setDescripcion($fila['Descripcion']);
        $ventaProducto->setFactura($fila['Factura']);
        $ventaProducto->setFecha($fila['Fecha']);
        $ventaProducto->setCantidad($fila['Cantidad']);
        $ventaProducto->setEstatus($fila['Estatus']);
        $ventaProducto->setTotal($fila['Total']);
        $ventaProducto->setUsuario($daoUsuario->consultar($fila['Usuario']));

        return $ventaProducto;
    }
}

class VentaProducto {
    private $id;
    private $idProducto;
    private $idCliente;
    private $descripcion;
    private $factura;
    private $fecha;
    private $cantidad;
    private $estatus;
    private $usuario;
    private $productos;
    private $total;
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
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
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
     * @return array
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * @param array $productos
     */
    public function setProductos($productos)
    {
        $this->productos = $productos;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

}