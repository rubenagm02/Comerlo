<?php
require_once 'base/base_inicial.php';
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
            <div class="box-body">
                <div class="form-group">
                    <label for="producto_nombre">Nombre</label>
                    <input type="text" class="form-control" id="producto_nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="producto_descripcion">Descripción</label>
                    <input type="text" class="form-control" id="producto_descripcion" placeholder="Descripción">
                </div>
                <div class="form-group">
                    <label for="producto_numero_identificacion">Numero de identificacion</label>
                    <input type="text" class="form-control" id="producto_numero_identificacion" placeholder="Numero de identificación">
                </div>
                <div class="form-group">
                    <label for="producto_medida">Medida</label>
                    <input type="text" class="form-control" id="producto_medida" placeholder="Medida">
                </div>
                <div class="form-group">
                    <label for="producto_precio">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="producto_precio" placeholder="Precio">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button onclick="alta()" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
<script src="js/altaproducto.js"></script>
<?php
require_once 'base/base_final.php';