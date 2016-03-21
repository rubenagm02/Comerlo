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