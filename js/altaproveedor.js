/**
 * Created by root on 18/03/16.
 */
function alta(proveedor){
    var params = {};
    params.action = "alta";
    params.nombre = $("#proveedor_nombre").val();
    params.razonSocial = $("#proveedor_razon_social").val();
    params.rfc = $("#proveedor_rfc").val();
    params.contacto = $("#proveedor_contacto").val();
    params.telefono = $("#proveedor_telefono").val();
    params.correo = $("#proveedor_correo").val();
    params.observaciones = $("#proveedor_observaciones").val();

    if (proveedor != null) {
        params.id = proveedor;
    }

    $.post("peticiones/altaproveedor.php", params, function (respuesta) {
        window.location = "totalproveedores.php";
    });

}

