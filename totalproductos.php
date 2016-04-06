<?php

require_once 'base/Producto.php';
require_once 'base/base_inicial.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 08:32 PM
 */

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
                                <th>Nombre</th>
                                <th>Medida</th>
                                <th>Estatus</th>
                                <th>Precio</th>
                                <th>Existencia</th>
                                <th>Última modificación</th>
                                <?php if ($usuario->getPuesto() != "Auxiliar") { ?>
                                    <th>Edición</th>
                                    <th>Merma</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $daoProducto = new DaoProducto();
                        $productos = $daoProducto->consultarTodo();
        
                        foreach ($productos as $producto) {
                            echo "<tr><td>{$producto->getNombre()}</td>";
                            echo "<td>{$producto->getMedida()}</td>";
                            echo "<td>{$producto->getEstatus()}</td>";
                            echo "<td>$ " . number_format($producto->getPrecio(), 2, ".", ",") . "</td>";
                            echo "<td>{$producto->getExistencia()}</td>";
                            echo "<td>{$producto->getUsuario()->getNombre()}</td>";
                            if ($usuario->getPuesto() != "Auxiliar") {
                                echo "<td><a href=\"altaproducto.php?id={$producto->getId()}\" class=\"btn btn-sm btn-info btn-flat pull-left\">Editar</a></td>";
                                echo "<td><a href=\"merma.php?id={$producto->getId()}\" class=\"btn btn-sm btn-info btn-flat pull-left\">Registrar merma</a></td></tr>";
                            }
                        }
        
                        ?>
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
<?php

require_once 'base/base_inicial.php';

