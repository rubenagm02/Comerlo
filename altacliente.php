<?php
require_once 'base/Cliente.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 10:15 PM
 */



require_once 'base/base_inicial.php';

$cliente = new Cliente();
if (isset($_GET['id'])) {
    $daoCliente = new DaoCliente();
    $cliente = $daoCliente->consultar($_GET['id']);
}
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form>
            <div class="box-body">
                <div class="form-group">
                    <label for="cliente_nombre">Nombre</label>
                    <input type="text" class="form-control" id="cliente_nombre" placeholder="Nombre" value="<?php echo $cliente->getNombre();?>">
                </div>
                <div class="form-group">
                    <label for="cliente_razon_social">Razón social</label>
                    <input type="text" class="form-control" id="cliente_razon_social" placeholder="Razon social" value="<?php echo $cliente->getRazonSocial();?>">
                </div>
                <div class="form-group">
                    <label for="cliente_rfc">RFC</label>
                    <input type="text" class="form-control" id="cliente_rfc" placeholder="RFC" value="<?php echo $cliente->getRfc(); ?>">
                </div>
                <div class="form-group">
                    <label for="cliente_contacto">Contacto</label>
                    <input type="text" class="form-control" id="cliente_contacto" placeholder="Nombre del contacto" value="<?php echo $cliente->getNombreContacto();?>">
                </div>
                <div class="form-group">
                    <label for="cliente_telefono">Telefono</label>
                    <input type="text" class="form-control" id="cliente_telefono" placeholder="Telefono" value="<?php echo $cliente->getTelefono();?>">
                </div>
                <div class="form-group">
                    <label for="cliente_correo">Correo</label>
                    <input type="text" class="form-control" id="cliente_correo" placeholder="Correo" value="<?php echo $cliente->getCorreo();?>">
                </div>
                <div class="form-group">
                    <label for="cliente_observaciones">Observaciones</label>
                    <input type="text" class="form-control" id="cliente_observaciones" placeholder="Observaciones" value="<?php echo $cliente->getObservaciones();?>">
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
    <script src="js/altacliente.js"></script>
<?php
require_once 'base/base_final.php';