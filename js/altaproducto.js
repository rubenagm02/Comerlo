/**
 * Created by root on 13/03/16.
 */

function alta (producto) {
    var params = {};
    params.action = "alta";
    params.nombre = $("#producto_nombre").val();
    params.descripcion = $("#producto_descripcion").val();
    params.numeroIdentificacion = $("#producto_numero_identificacion").val();
    params.medida = $("#producto_medida").val();
    params.precio = $("#producto_precio").val();

    if (producto != null) {
        params.id = producto;
    }

    $.post("peticiones/altaproducto.php", params, function (respuesta) {
        alert(respuesta);
    });
}