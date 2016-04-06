/**
 * Created by root on 18/03/16.
 */

function alta(cliente){
    var params = {};
    params.action = "alta";
    params.nombre = $("#cliente_nombre").val();
    params.razonSocial = $("#cliente_razon_social").val();
    params.rfc = $("#cliente_rfc").val();
    params.contacto = $("#cliente_contacto").val();
    params.telefono = $("#cliente_telefono").val();
    params.correo = $("#cliente_correo").val();
    params.observaciones = $("#cliente_observaciones").val();

    if (cliente != null) {
        params.id = cliente;
    }

    $.post("peticiones/altacliente.php", params, function (respuesta) {
        window.location = "totalclientes.php";
    });

}
