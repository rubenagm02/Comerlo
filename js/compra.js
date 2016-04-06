/**
 * Created by root on 3/04/16.
 */

function baja(compra){

    if (confirm("¿Seguro que deseas dar de bajar esta compra?")) {
        var parametros = {};
        parametros.action = "baja";
        parametros.compra = compra;

        $.post("peticiones/compra.php", parametros, function (respuesta) { 
            alert("Se ha dado de baja la compra");
            window.location = "compras.php";
        });
    }
}

function atras () {
    window.location = "compras.php";
}
