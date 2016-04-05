/**
 * Created by root on 4/04/16.
 */

$(function() {
    $('#datepicker').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: '04/04/2016',
            endDate: '06/04/2016'
        },
        function(inicio, fin, label) {
            var parametros = {};
            parametros.action = "reporteVenta";
            parametros.inicio = inicio.format("YYYY-MM-DD");
            parametros.fin = fin.format("YYYY-MM-DD");
            $.post("peticiones/venta.php",parametros, function (respuesta) {
                $("#reporte").text("");
                $("#reporte").append(respuesta);
            });
        });
});