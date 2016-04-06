/**
 * Created by root on 3/04/16.
 */

function baja(compra){

    if (confirm("¿Seguro que deseas dar de bajar esta venta?")) {
        var parametros = {};
        parametros.action = "baja";
        parametros.compra = compra;

        $.post("peticiones/venta.php", parametros, function (respuesta) {
            alert("Se ha dado de baja la venta");
            window.location = "ventas.php";
        });
    }
}

function atras () {
    window.location = "ventas.php";
}
