/**
 * Created by root on 20/03/16.
 */
/*$(document).ready(function () {
    cargarFecha();
});*/

function cargarFecha () {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    }

    if(mm<10) {
        mm='0'+mm
    }

    today = mm+'/'+dd+'/'+yyyy;
    $("#fecha_actual").text(today);
}

function agregarProducto (producto, nombre, precio) {
    var cantidad = prompt("Introduce la cantidad de productos");

    var fila = '<tr class="producto_agregado" producto="' + producto + '" cantidad="' + cantidad + '"><td>' + nombre + '</td><td>'
                + precio + '</td><td>' + cantidad + '</td><td>'
                + (precio * cantidad)
                + '</td><td><a class="btn btn-sm btn-info btn-flat pull-left">Quitar</a></td></tr>';

    $("#productos_agregados").append(fila);
}