<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/04/16
 * Time: 10:11 PM
 */

require_once '../base/Producto.php';
require_once '../base/CompraProducto.php';

if ($_POST['action'] == "agregarCompra") {
    $daoProducto = new DaoProducto();
    $daoCompraProducto = new DaoCompraProducto();
    $total       = 0.0;
    $productos   = array();
    $proveedor   = $_POST['proveedor'];

    //Se inserta la compra producto
    $compraProducto = new CompraProducto();
    $compraProducto->setIdProducto(0);
    $compraProducto->setIdProveedor($proveedor);
    $compraProducto->setDescripcion($_POST['descripcion']);
    $compraProducto->setFactura($_POST['factura']);
    $compraProducto->setTotal($_POST['total']);
    $compraProducto->setFecha(date("Y-m-d"));
    $compraProducto->setEstatus(1);
    $compraProducto->setUsuario(1);

    foreach ($_POST['productos'] as $producto) {
        $detalleCompraProducto = new DetalleCompraProducto();
        $detalleCompraProducto->setCantidad($producto['cantidad']);
        $detalleCompraProducto->setIdProducto($producto['id']);
        $detalleCompraProducto->setTotal($producto['total']);
        array_push($productos, $detalleCompraProducto);
    }

    $compraProducto->setProductos($productos);
    $daoCompraProducto->insertar($compraProducto);
}