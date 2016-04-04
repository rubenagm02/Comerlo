<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/04/16
 * Time: 10:53 PM
 */

require_once 'base/MermaProducto.php';
require_once 'base/base_inicial.php';
require_once 'base/Producto.php';

$producto = new Producto();
$daoProducto = new DaoProducto();
$producto = $daoProducto->consultar($_GET['id']);
?>
    <div class="row">
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-calendar"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Producto</span>
                    <span class="info-box-number" id="fecha_actual"><?php echo $producto->getNombre(); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar la merma de un producto</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="merma_cantidad">Registra la cantidad de mermas</label>
                        <input type="number" class="form-control" id="merma_cantidad" placeholder="Cantidad ...">
                    </div>
                    <div class="form-group">
                        <label for="merma_descripcion">Descripción</label>
                        <textarea class="form-control" rows="3" id="merma_descripcion" placeholder="Ingresa una descripción de la razón por la cual se realiza la merma ..."></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button onclick="merma(<?php echo $producto->getId(); ?>)" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/merma.js"></script>
<?php
require_once 'base/base_final.php';