<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/04/16
 * Time: 11:49 PM
 */

require_once 'base/CompraProducto.php';
$daoCompraProducto = new DaoCompraProducto();
$compras = $daoCompraProducto->consultarTodo();

require_once 'base/base_inicial.php';

?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todas las ventas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Factura</th>
                    <th>Proveedor</th>
                    <th>Usuario</th>
                    <th>Más</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($compras as $compra) {
                    echo '<tr></tr><td>' . $compra->getFecha() . '</td>';
                    echo '<td>' . $compra->getTotal() . '</td>';
                    echo '<td>' . $compra->getFactura() . '</td>';
                    echo '<td>' . $compra->getIdProveedor()->getNombre() . '</td>';
                    echo '<td>' . $compra->getUsuario()->getNombre() . '</td>';
                    echo '<td><a href="compra.php?id=' .$compra->getId() . '" class="btn btn-sm btn-info btn-flat pull-left">Editar</a></td></tr>';
                }
                ?>
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>

<?php

require_once 'base/base_final.php';