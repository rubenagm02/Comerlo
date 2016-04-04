/**
 * Created by root on 3/04/16.
 */

function merma(producto) {
    
    if (confirm("Seguro que deseas registrar la merma?")) {
        var parametros = {};
        parametros.action = "merma";
        parametros.producto = producto;
        parametros.descripcion = $("#merma_descripcion").val();
        parametros.cantidad = $("#merma_cantidad").val();
        
        $.post("peticiones/merma.php", parametros, function (respuesta) {
            alert(respuesta);
        });
    }
}
