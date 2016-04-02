/**
 * Created by root on 1/04/16.
 */

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
    var total = (precio * cantidad);
    
    var fila = '<tr class="producto_agregado" producto="' + producto + '" cantidad="' + cantidad + '" total="' + total + '"><td>' + nombre + '</td><td>'
        + precio + '</td><td>' + cantidad + '</td><td>'
        + total
        + '</td><td><a class="btn btn-sm btn-info btn-flat pull-left">Quitar</a></td></tr>';

    $("#productos_agregados").append(fila);
}

function agregarCompra () {
    var parametros = {};
    parametros.action = "agregarCompra";
    parametros.productos = [];
    parametros.proveedor = $("#compra_proveedor option:selected").val();
    parametros.descripcion = $("#compra_descripcion").val();
    parametros.total = 0.0;
    parametros.factura = "FAC";
    
    $.each($("tr.producto_agregado"), function (i, v) {
        var producto = {};
        producto.id = $(v).attr('producto');
        producto.cantidad = $(v).attr('cantidad');
        producto.total = $(v).attr('total');
        
        parametros.total += Number(producto.total);
        parametros.productos.push(producto);
    });
    
    if (parametros.productos.length > 0) {
        
        $.post("peticiones/compra.php", parametros, function (respuesta) {
            alert(respuesta);
        });
    } else {
        alert("Debes agregar al menos un producto para guardar la compra");
    }
    
    
}
