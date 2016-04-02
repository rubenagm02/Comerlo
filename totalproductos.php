<?php
require_once 'base/base_inicial.php';
require_once 'base/Producto.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 08:32 PM
 */

?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todos los productos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Medida</th>
                        <th>Estatus</th>
                        <th>Precio</th>
                        <th>Existencia</th>
                        <th>Última modificación</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $daoProducto = new DaoProducto();
                $productos = $daoProducto->consultarTodo();

                foreach ($productos as $producto) {
                    echo "<td>{$producto->getNombre()}</td>";
                    echo "<td>{$producto->getMedida()}</td>";
                    echo "<td>{$producto->getEstatus()}</td>";
                    echo "<td>$ " . number_format($producto->getPrecio(), 2, ".", ",") . "</td>";
                    echo "<td>{$producto->getExistencia()}</td>";
                    echo "<td>{$producto->getUsuario()->getNombre()}</td>";
                    echo "<td><a href=\"altaproducto.php?id={$producto->getId()}\" class=\"btn btn-sm btn-info btn-flat pull-left\">Editar</a></td>";
                }

                ?>
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
<?php

require_once 'base/base_inicial.php';

