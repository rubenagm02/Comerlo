<?php
require_once 'base/base_inicial.php';
require_once 'base/Producto.php';

$producto = new Producto();

if (isset($_GET['id'])) {
    $daoProducto = new DaoProducto();
    $producto = $daoProducto->consultar($_GET['id']);
}
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Producto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form>
            <div class="box-body">
                <div class="form-group">
                    <label for="producto_nombre">Nombre</label>
                    <input type="text" class="form-control" id="producto_nombre" placeholder="Nombre" value="<?php echo $producto->getNombre();?>">
                </div>
                <div class="form-group">
                    <label for="producto_descripcion">Descripción</label>
                    <input type="text" class="form-control" id="producto_descripcion" placeholder="Descripción" value="<?php echo $producto->getDescripcion();?>">
                </div>
                <div class="form-group">
                    <label for="producto_numero_identificacion">Numero de identificacion</label>
                    <input type="text" class="form-control" id="producto_numero_identificacion" placeholder="Numero de identificación" value="<?php echo $producto->getNumeroIdentificacion(); ?>">
                </div>
                <div class="form-group">
                    <label for="producto_medida">Medida</label>
                    <input type="text" class="form-control" id="producto_medida" placeholder="Medida" value="<?php echo $producto->getMedida()?>">
                </div>
                <div class="form-group">
                    <label for="producto_precio">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="producto_precio" placeholder="Precio" value="<?php echo $producto->getPrecio();?>">
                </div>
            </div>
        </form>
        <?php
        if (isset($_GET['id'])) {
            echo '<button onclick="alta('. $_GET['id'] .')" class="btn btn-primary">Actualizar</button>';
        } else {
            echo '<button onclick="alta()" class="btn btn-primary">Guardar</button>';
        }
        ?>
    </div>
<script src="js/altaproducto.js"></script>
<?php
require_once 'base/base_final.php';