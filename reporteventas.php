<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/04/16
 * Time: 10:29 PM
 */

require_once 'base/VentaProducto.php';
require_once 'base/base_inicial.php';
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Filtro</h3>
            </div>
            <div class="box-body">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="daterange" value="04/04/2016 - 06/04/2016">
                </div>
            </div>
        </div>
    </div>
</div>
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
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Factura</th>
                        <th>Proveedor</th>
                        <th>Usuario</th>
                        <th>Más</th>
                    </tr>
                    </thead>
                    <tbody id="reporte">
                    </tbody></table>
            </div>
        </div>
    </div>
</div>


    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <script src="js/reporteventas.js"></script>
<?php
require_once 'base/base_final.php';