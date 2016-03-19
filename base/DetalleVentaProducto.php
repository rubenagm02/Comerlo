<?php

require_once 'Conexion.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/03/16
 * Time: 08:29 AM
 */

class DaoDetalleVentaProducto extends Conexion{

    public function insertar (DetalleVentaProducto $detalleVentaProducto) {
        $query = "INSERT INTO DetalleVentaProducto VALUES (DEFAULT ,
                      {$detalleVentaProducto->getIdVentaProducto()},
                      {$detalleVentaProducto->getIdProducto()},
                      {$detalleVentaProducto->getCantidad()})";

        $consulta = $this->conexion->query($query);

        if ($consulta) {

            return $this->conexion->insert_id;
        } else {

            return false;
        }
    }

    public function obtenerVenta ($id) {
        $query = "SELECT * FROM DetalleVentaProducto WHERE IdVentaProducto = $id";

        $consulta = $this->conexion->query($query);

        if ($consulta) {
            $resultado = array();

            for ($x = 0; $x < $consulta->num_rows; $x++) {
                $consulta->data_seek($x);
                array_push($resultado, $this->crearObjeto($consulta->fetch_assoc()));
            }

            return $resultado;
        } else {

        }
    }

    private function crearObjeto ($fila) {
        $detalleVentaProducto = new DetalleVentaProducto();

        $detalleVentaProducto->setId($fila['Id']);
        $detalleVentaProducto->setCantidad($fila['Cantidad']);
        $detalleVentaProducto->setIdVentaProducto($fila['IdVentaProducto']);
        $detalleVentaProducto->setIdProducto($fila['IdProducto']);

        return $detalleVentaProducto;
    }
}

class DetalleVentaProducto {
    private $id;
    private $cantidad;
    private $idVentaProducto;
    private $idProducto;

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
    public function getIdVentaProducto()
    {
        return $this->idVentaProducto;
    }

    /**
     * @param mixed $idCompraProducto
     */
    public function setIdVentaProducto($idVentaProducto)
    {
        $this->idVentaProducto = $idVentaProducto;
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
}