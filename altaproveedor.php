<?php
require_once 'base/Proveedor.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 10:15 PM
 */



require_once 'base/base_inicial.php';

$proveedor = new Proveedor();
if (isset($_GET['id'])) {
    $daoProveedor = new DaoProveedor();
    $proveedor = $daoProveedor->consultar($_GET['id']);
}
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Proveedor</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form>
            <div class="box-body">
                <div class="form-group">
                    <label for="proveedor_nombre">Nombre</label>
                    <input type="text" class="form-control" id="proveedor_nombre" placeholder="Nombre" value="<?php echo $proveedor->getNombre();?>">
                </div>
                <div class="form-group">
                    <label for="proveedor_razon_social">Razón social</label>
                    <input type="text" class="form-control" id="proveedor_razon_social" placeholder="Razon social" value="<?php echo $proveedor->getRazonSocial();?>">
                </div>
                <div class="form-group">
                    <label for="proveedor_rfc">RFC</label>
                    <input type="text" class="form-control" id="proveedor_rfc" placeholder="RFC" value="<?php echo $proveedor->getRfc(); ?>">
                </div>
                <div class="form-group">
                    <label for="proveedor_contacto">Contacto</label>
                    <input type="text" class="form-control" id="proveedor_contacto" placeholder="Nombre del contacto" value="<?php echo $proveedor->getNombreContacto();?>">
                </div>
                <div class="form-group">
                    <label for="proveedor_telefono">Telefono</label>
                    <input type="text" class="form-control" id="proveedor_telefono" placeholder="Telefono" value="<?php echo $proveedor->getTelefono();?>">
                </div>
                <div class="form-group">
                    <label for="proveedor_correo">Correo</label>
                    <input type="text" class="form-control" id="proveedor_correo" placeholder="Correo" value="<?php echo $proveedor->getCorreo();?>">
                </div>
                <div class="form-group">
                    <label for="proveedor_observaciones">Observaciones</label>
                    <input type="text" class="form-control" id="proveedor_observaciones" placeholder="Observaciones" value="<?php echo $proveedor->getObservaciones();?>">
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
    <script src="js/altaproveedor.js"></script>
<?php
require_once 'base/base_final.php';