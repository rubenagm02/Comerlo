<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/04/16
 * Time: 10:11 PM
 */

require_once '../base/Producto.php';
require_once '../base/VentaProducto.php';
require_once '../base/Usuario.php';

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
    $ventaProducto->setUsuario($_COOKIE['usuario']);

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

if ($_POST['action'] == "baja") {
    $idCompra = $_POST['compra'];

    $daoCompraProducto = new DaoVentaProducto();
    $compraProducto = $daoCompraProducto->consultar($idCompra);
    $compraProducto->setEstatus(0);
    $compraProducto->setUsuario($_COOKIE['usuario']);
    $daoCompraProducto->actualizar($compraProducto);
}

if ($_POST['action'] == "reporteVenta") {
    $fechaInicio = $_POST['inicio'];
    $fechaFin = $_POST['fin'];
    $daoCompraProducto = new DaoVentaProducto();
    $compras = $daoCompraProducto->consultarTodo("AND Fecha > '$fechaInicio' AND Fecha < '$fechaFin'");

    foreach ($compras as $compra) {
        echo '<tr></tr><td>' . $compra->getFecha() . '</td>';
        echo '<td>' . $compra->getTotal() . '</td>';
        echo '<td>' . $compra->getFactura() . '</td>';
        echo '<td>' . $compra->getIdCliente()->getNombre() . '</td>';
        echo '<td>' . $compra->getUsuario()->getNombre() . '</td>';

        $daoUsuario = new DaoUsuario();
        $usuario = $daoUsuario->consultar($_COOKIE['usuario']);

        if ($usuario->getPuesto() != "Auxiliar") {
            echo '<td><a href="venta.php?id=' . $compra->getId() . '" class="btn btn-sm btn-info btn-flat pull-left">Editar</a></td></tr>';
        }
    }

}