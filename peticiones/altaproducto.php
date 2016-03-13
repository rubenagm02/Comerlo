<?php
require_once '../base/Producto.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/03/16
 * Time: 11:59 PM
 */

if ($_POST['action'] == "alta") {
    $daoProducto = new DaoProducto();
    $producto    = new Producto();

    $producto->setNombre($_POST['nombre']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setNumeroIdentificacion($_POST['numeroIdentificacion']);
    $producto->setMedida($_POST['medida']);
    $producto->setEstatus(1);
    $producto->setPrecio($_POST['precio']);
    $producto->setExistencia(0);
    $producto->setUsuario(1);

    var_dump($producto);

}