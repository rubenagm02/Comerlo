<?php
require_once 'base/base_inicial.php';
?>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Alta de producto</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="producto_nombre">Nombre</label>
                <input class="form-control" id="producto_nombre" placeholder="Introduce el nombre" type="text">
            </div>
            <div class="form-group">
                <label for="producto_numero_identificacion">N&uacute;mero de identificaci&oacute;n</label>
                <input class="form-control" id="producto_numero_identificacion" placeholder="Numero" type="text">
            </div>
            <div class="form-group">
                <label for="producto_medida">Medida</label>
                <input class="form-control" id="producto_medida" placeholder="Medida" type="text">
            </div>
            <div class="form-group">
                <label for="producto_precio">Precio</label>
                <input class="form-control" id="producto_precio" placeholder="$ Precio" type="number">
            </div>
        </div><!-- /.box-body -->
    </div>
<?php
require_once 'base/base_final.php';