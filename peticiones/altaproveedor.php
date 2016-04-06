<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 10:57 PM
 */

require_once '../base/Proveedor.php';

if ($_POST['action'] == "alta") {
    $proveedor = new Proveedor();
    $daoProveedor = new DaoProveedor();

    $proveedor->setNombre($_POST['nombre']);
    $proveedor->setRazonSocial($_POST['razonSocial']);
    $proveedor->setRfc($_POST['rfc']);
    $proveedor->setNombreContacto($_POST['contacto']);
    $proveedor->setTelefono($_POST['telefono']);
    $proveedor->setCorreo($_POST['correo']);
    $proveedor->setObservaciones($_POST['observaciones']);
    $proveedor->setUsuario($_COOKIE['usuario']);

    $resultado = false;

    if (isset($_POST['id'])) {
        $proveedor->setId($_POST['id']);
        $resultado = $daoProveedor->actualizar($proveedor);
    } else {
        $resultado = $daoProveedor->insertar($proveedor);
    }

    if ($resultado === true) {

        echo json_encode(array("respuesta" => "correcto"));
    } else {

        echo json_encode(array("respuesta" => "incorrecto"));
    }
}