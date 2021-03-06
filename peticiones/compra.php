<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/04/16
 * Time: 10:11 PM
 */

require_once '../base/Producto.php';
require_once '../base/CompraProducto.php';
require_once '../base/Usuario.php';

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
    $compraProducto->setUsuario($_COOKIE['usuario']);

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

if ($_POST['action'] == "baja") {
    $idCompra = $_POST['compra'];

    $daoCompraProducto = new DaoCompraProducto();
    $compraProducto = $daoCompraProducto->consultar($idCompra);
    $compraProducto->setEstatus(0);
    $compraProducto->setUsuario($_COOKIE['usuario']);
    $daoCompraProducto->actualizar($compraProducto);
}

if ($_POST['action'] == "reporteVenta") {
    $fechaInicio = $_POST['inicio'];
    $fechaFin = $_POST['fin'];
    $daoCompraProducto = new DaoCompraProducto();
    $compras = $daoCompraProducto->consultarTodo("AND Fecha > '$fechaInicio' AND Fecha < '$fechaFin'");

    foreach ($compras as $compra) {
        echo '<tr></tr><td>' . $compra->getFecha() . '</td>';
        echo '<td>' . $compra->getTotal() . '</td>';
        echo '<td>' . $compra->getFactura() . '</td>';
        echo '<td>' . $compra->getIdProveedor()->getNombre() . '</td>';
        echo '<td>' . $compra->getUsuario()->getNombre() . '</td>';

        $daoUsuario = new DaoUsuario();
        $usuario = $daoUsuario->consultar($_COOKIE['usuario']);

        if ($usuario->getPuesto() != "Auxiliar") {
            echo '<td><a href="compra.php?id=' . $compra->getId() . '" class="btn btn-sm btn-info btn-flat pull-left">Editar</a></td></tr>';
        }
    }

}