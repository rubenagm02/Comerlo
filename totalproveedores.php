<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 11:17 PM
 */

require_once 'base/Proveedor.php';

require_once 'base/base_inicial.php';

?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todos los proveedores</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Razón social</th>
                    <th>RFC</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Última modificación</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $daoProveedor = new DaoProveedor();
                $proveedores = $daoProveedor->consultarTodo();

                foreach ($proveedores as $proveedor) {
                    echo "<td>{$proveedor->getNombre()}</td>";
                    echo "<td>{$proveedor->getRazonSocial()}</td>";
                    echo "<td>{$proveedor->getRfc()}</td>";
                    echo "<td>{$proveedor->getCorreo()}</td>";
                    echo "<td>{$proveedor->getTelefono()}</td>";
                    echo "<td>{$proveedor->getUsuario()->getNombre()}</td>";
                    echo "<td><a href=\"altaproveedor.php?id={$proveedor->getId()}\" class=\"btn btn-sm btn-info btn-flat pull-left\">Editar</a></td>";
                }

                ?>
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
<?php
require_once 'base/base_final.php';