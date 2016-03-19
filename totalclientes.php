<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/03/16
 * Time: 11:17 PM
 */

require_once 'base/Cliente.php';

require_once 'base/base_inicial.php';

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
                $daoCliente = new DaoCliente();
                $clientes = $daoCliente->consultarTodo();

                foreach ($clientes as $cliente) {
                    echo "<td>{$cliente->getNombre()}</td>";
                    echo "<td>{$cliente->getRazonSocial()}</td>";
                    echo "<td>{$cliente->getRfc()}</td>";
                    echo "<td>{$cliente->getCorreo()}</td>";
                    echo "<td>{$cliente->getTelefono()}</td>";
                    echo "<td>{$cliente->getUsuario()->getNombre()}</td>";
                    echo "<td><a href=\"altacliente.php?id={$cliente->getId()}\" class=\"btn btn-sm btn-info btn-flat pull-left\">Editar</a></td>";
                }

                ?>
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
<?php
require_once 'base/base_final.php';