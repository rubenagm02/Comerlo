<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/04/16
 * Time: 10:11 PM
 */

require_once '../base/Producto.php';
require_once '../base/VentaProducto.php';

if ($_POST['action'] == "agregarCompra") {
    $daoProducto = new DaoProducto();
    $daoCompraProducto = new DaoVentaProducto();
    $total       = 0.0;
    $productos   = array();
    $proveedor   = $_POST['proveedor'];

    //Se inserta la compra producto
    $ventaProducto = new VentaProducto();
    $ventaProducto->setIdProducto(0);
    $ventaProducto->setIdCliente($proveedor);
    $ventaProducto->setDescripcion($_POST['descripcion']);
    $ventaProducto->setFactura($_POST['factura']);
    $ventaProducto->setTotal($_POST['total']);
    $ventaProducto->setFecha(date("Y-m-d"));
    $ventaProducto->setEstatus(1);
    $ventaProducto->setUsuario(1);

    foreach ($_POST['productos'] as $producto) {
        $detalleCompraProducto = new DetalleVentaProducto();
        $detalleCompraProducto->setCantidad($producto['cantidad']);
        $detalleCompraProducto->setIdProducto($producto['id']);
        $detalleCompraProducto->setTotal($producto['total']);
        array_push($productos, $detalleCompraProducto);
    }

    $ventaProducto->setProductos($productos);
    $daoCompraProducto->insertar($ventaProducto);
}