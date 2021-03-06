<?php

require_once 'Conexion.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/03/16
 * Time: 08:29 AM
 */

require_once 'Producto.php';

class DaoDetalleCompraProducto extends Conexion{

    public function insertar (DetalleCompraProducto $detalleCompraProducto) {
        $query = "INSERT INTO DetalleCompraProducto VALUES (DEFAULT ,
                      {$detalleCompraProducto->getIdProducto()},
                      {$detalleCompraProducto->getIdCompraProducto()},
                      {$detalleCompraProducto->getCantidad()},
                      {$detalleCompraProducto->getTotal()})";

        $consulta = $this->conexion->query($query);

        if ($consulta) {
            
            $daoProducto = new DaoProducto();
            $daoProducto->actualizarExistencia($detalleCompraProducto->getIdProducto(), $detalleCompraProducto->getCantidad());
            return $this->conexion->insert_id;
        } else {

            return false;
        }
    }

    public function obtenerCompra ($id) {
        $query = "SELECT * FROM DetalleCompraProducto WHERE IdCompraProducto = $id";

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
        $detalleCompraProducto = new DetalleCompraProducto();

        $detalleCompraProducto->setId($fila['Id']);
        $detalleCompraProducto->setIdCompraProducto($fila['IdCompraProducto']);
        $detalleCompraProducto->setIdProducto($fila['IdProducto']);
        $detalleCompraProducto->setCantidad($fila['Cantidad']);
        $detalleCompraProducto->setTotal($fila['Total']);

        return $detalleCompraProducto;
    }
}

class DetalleCompraProducto {
    private $id;
    private $idCompraProducto;
    private $cantidad;
    private $idProducto;
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
    public function getIdCompraProducto()
    {
        return $this->idCompraProducto;
    }

    /**
     * @param mixed $idCompraProducto
     */
    public function setIdCompraProducto($idCompraProducto)
    {
        $this->idCompraProducto = $idCompraProducto;
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