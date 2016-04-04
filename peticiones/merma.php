<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/04/16
 * Time: 11:08 PM
 */

require_once '../base/MermaProducto.php';
require_once '../base/Producto.php';

if ($_POST['action'] == "merma") {
    $mermaProducto = new MermaProducto();
    $daoMermaProducto = new DaoMermaProducto();
    $daoProducto = new DaoProducto();

    $mermaProducto->setIdProducto($_POST['producto']);
    $mermaProducto->setDescripcion($_POST['descripcion']);
    $mermaProducto->setFecha(date("Y-m-d"));
    $mermaProducto->setCantidad($_POST['cantidad']);
    $mermaProducto->setUsuario(1);
    
    $daoMermaProducto->insertar($mermaProducto);
    $daoProducto->actualizarExistencia($_POST['producto'], $_POST['cantidad'] * -1);
}