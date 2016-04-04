<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/04/16
 * Time: 11:21 PM
 */
require_once 'base/base_inicial.php';
require_once 'base/MermaProducto.php';
$daoMermaProducto = new DaoMermaProducto();
$mermas = $daoMermaProducto->consultarTodo();
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Todos los productos</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Usuario</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($mermas as $merma) {
                            echo '<tr>';
                            echo '<td>' . $merma->getIdProducto()->getNombre() . '</td>';
                            echo '<td>' . $merma->getCantidad() . '</td>';
                            echo '<td>' . $merma->getDescripcion() . '</td>';
                            echo '<td>' . $merma->getCantidad() . '</td>';
                            echo '<td>' . $merma->getUsuario()->getNombre() . '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php

require_once 'base/base_final.php';
