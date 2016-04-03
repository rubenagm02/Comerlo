<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/04/16
 * Time: 04:52 PM
 */

require_once 'base/base_inicial.php';
require_once 'base/CompraProducto.php';
require_once 'base/Producto.php';
$daoCompraProducto = new DaoCompraProducto();
$compraProducto = $daoCompraProducto->consultar($_GET['id']);

?>
    <div class="row">
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-calendar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Fecha</span>
                    <span class="info-box-number" id="fecha_actual"><?php echo $compraProducto->getFecha(); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Proveedor</span>
                    <span class="info-box-number" id="fecha_actual"><?php echo $compraProducto->getIdProveedor()->getNombre();?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number" id="fecha_actual">$ <?php echo number_format($compraProducto->getTotal(), 2, '.', ',')?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Todas las ventas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Medida</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $daoProducto = new DaoProducto();

                    foreach ($compraProducto->getProductos() as $producto) {
                        echo '<tr>';
                        $productoAux = $daoProducto->consultar($producto->getIdProducto());
                        echo "<td>{$productoAux->getNombre()}</td>";
                        echo "<td>{$productoAux->getMedida()}</td>";
                        echo "<td>$ " . number_format($productoAux->getPrecio(), 2, '.', ',') . "</td>";
                        echo "<td>{$producto->getCantidad()}</td>";
                        echo "<td>$ " . number_format($producto->getTotal(), 2, '.', ',') . "</td>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <button type="button" onclick="atras()" class="btn btn-block btn-info btn-lg">Voler a las compras</button>
        </div>
        <div class="col-lg-4 col-md-2 col-sm-2"></div>
        <div class="col-lg-4 col-md-2 col-sm-4">
            <button type="button" onclick="baja(<?php echo $compraProducto->getId()?>)" class="btn btn-block btn-danger btn-lg">Dar de baja</button>
        </div>
    </div>
<script src="js/compra.js"></script>
<?php

require_once 'base/base_final.php';