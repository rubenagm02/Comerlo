/**
 * Created by root on 3/04/16.
 */

function baja(compra){

    if (confirm("¿Seguro que deseas dar de bajar esta compra?")) {
        var parametros = {};
        parametros.action = "baja";
        parametros.compra = compra;

        $.post("peticiones/compra.php", parametros, function (respuesta) {
            alert(respuesta);
        });
    }
}

function atras () {
    window.location = "compras.php";
}
