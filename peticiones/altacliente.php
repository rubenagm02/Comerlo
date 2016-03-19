<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 10:57 PM
 */

require_once '../base/Cliente.php';

if ($_POST['action'] == "alta") {
    $cliente = new Cliente();
    $daoCliente = new DaoCliente();

    $cliente->setNombre($_POST['nombre']);
    $cliente->setRazonSocial($_POST['razonSocial']);
    $cliente->setRfc($_POST['rfc']);
    $cliente->setNombreContacto($_POST['contacto']);
    $cliente->setTelefono($_POST['telefono']);
    $cliente->setCorreo($_POST['correo']);
    $cliente->setObservaciones($_POST['observaciones']);
    $cliente->setUsuario(1);

    $resultado = false;

    if (isset($_POST['id'])) {
        $cliente->setId($_POST['id']);
        $resultado = $daoCliente->actualizar($cliente);
    } else {
        $resultado = $daoCliente->insertar($cliente);
    }

    if ($resultado === true) {
        echo json_encode(array("respuesta" => "correcto"));
    } else {
        echo json_encode(array("respuesta" => "incorrecto"));
    }
}