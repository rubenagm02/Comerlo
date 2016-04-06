<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/03/16
 * Time: 10:26 PM
 */

require_once '../base/Usuario.php';

if ($_POST['action'] == "login") {
    $daoUsuario = new DaoUsuario();
    $usuario    = $daoUsuario->login($_POST['usuario'], $_POST['password']);

    if ($usuario !== false) {
        setcookie("usuario", $usuario->getId(), time() + 86400, "/");

        echo json_encode(array("respuesta" => "correcto"));
    } else {
        echo json_encode(array("respuesta" => "incorrecto"));
    }
}