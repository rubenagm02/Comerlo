<?php

require_once 'base/Producto.php';
require_once 'base/Cliente.php';
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/03/16
 * Time: 05:25 PM
 */

require_once 'base/base_inicial.php';

$daoProducto = new DaoProducto();
$productos = $daoProducto->consultarTodo();
$daoCliente = new DaoCliente();
$clientes = $daoCliente->consultarTodo();
?>

    <div class="row">
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-calendar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Fecha</span>
                    <span class="info-box-number" id="fecha_actual"><?php echo date("d - M - Y"); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Usuario</span>
                    <span class="info-box-number"><?php echo $usuario->getNombre();?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Todos los productos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Agregar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($productos as $producto) {
                            echo "<td>{$producto->getNombre()}</td>";
                            echo "<td>$ {$producto->getPrecio()}</td>";
                            echo "<td><a class=\"btn btn-sm btn-info btn-flat pull-left\" href='javascript:agregarProducto({$producto->getId()}, \"{$producto->getNombre()}\", {$producto->getPrecio()})'>Agregar</a></td>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Productos en la venta</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody id="productos_agregados">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Selecciona un cliente</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <select class="form-control" id="compra_proveedor">
                        <option value="0">Selecciona un cliente...</option>
                        <?php
                        foreach ($clientes as $cliente) {
                            echo "<option value='{$cliente->getId()}'>{$cliente->getNombre()}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Descripción</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <textarea class="form-control" id="compra_descripcion"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="javascript:agregarCompra()" class="btn btn-sm btn-info btn-flat pull-left">Terminar</a>
        </div>
    </div>
    <script src="js/nuevaventa.js"></script>
<?php
require_once 'base/base_final.php';