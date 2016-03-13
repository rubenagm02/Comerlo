/**
 * Created by root on 13/03/16.
 */

function alta () {
    var params = {};
    params.action = "alta";
    params.nombre = $("#producto_nombre");
    params.descripcion = $("#producto_descripcion");
    params.numeroIdentificacion = $("#producto_numero_identificacion");
    params.medida = $("#producto_medida");
    params.precio = $("#producto_precio");

    $.post("peticiones/altaproducto.php", params, function (respuesta) {
        alert(respuesta);
    });
}