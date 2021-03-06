
<?php
    require_once 'Usuario.php';
    $usuario = null;
    if (isset($_COOKIE['usuario'])) {
        $daoUsuario = new DaoUsuario();
        $usuario = $daoUsuario->consultar($_COOKIE['usuario']);

        if (strlen($usuario->getNombre()) > 1) {
            //De momento nada
        } else {
            header('Location: login.php');
        }
    } else {
        //Se redirije
        header('Location: login.php');

    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Comerlo</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Barra de navegación-->
                    <li class="dropdown notifications-menu">
                        <a href="nuevaventa.php"  >
                            <i class="fa fa-arrow-circle-up"></i>
                        </a>
                    </li>

                    <!-- Se valida que no sea un usuario auxiliar-->
                    <?php if ($usuario->getPuesto() != "Auxiliar") { ?>
                        <li class="dropdown notifications-menu">
                            <a href="nuevacompra.php"  >
                                <i class="fa fa-arrow-circle-down"></i>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <ul class="sidebar-menu">
                <li class="header">Menú de opciones</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <!--<li><a href="index.html"><i class="fa fa-circle-o"></i> Existencia</a></li>-->
                        <li><a href="reporteventas.php"><i class="fa fa-circle-o"></i> Reporte de ventas</a></li>
                        <li><a href="reportecompras.php"><i class="fa fa-circle-o"></i> Reporte de compras</a></li>
                        <!--<li><a href="index2.html"><i class="fa fa-circle-o"></i> Reporte de mermas</a></li>-->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-exchange"></i> <span>Movimientos de producto</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ventas.php"><i class="fa fa-circle-o"></i> Ventas</a></li>
                        <li><a href="compras.php"><i class="fa fa-circle-o"></i> Compras</a></li>
                        <li><a href="ventasbaja.php"><i class="fa fa-circle-o"></i> Bajas venta</a></li>
                        <li><a href="comprasbaja.php"><i class="fa fa-circle-o"></i> Bajas compra</a></li>
                        <li><a href="mermas.php"><i class="fa fa-thumbs-o-down"></i> Mermas</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($usuario->getPuesto() != "Auxiliar") { ?>
                            <li><a href="altaproducto.php"><i class="fa fa-circle-o"></i> Alta de producto</a></li>
                        <?php } ?>
                        <!--<li><a href="index2.html"><i class="fa fa-circle-o"></i> Baja de producto</a></li>-->
                        <li><a href="totalproductos.php"><i class="fa fa-circle-o"></i> Ver productos</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <!-- Se valida que no sea un usuario auxiliar-->
                        <?php if ($usuario->getPuesto() != "Auxiliar") { ?>
                            <li><a href="altacliente.php"><i class="fa fa-circle-o"></i> Alta de cliente</a></li>
                        <?php } ?>
                        <li><a href="totalclientes.php"><i class="fa fa-circle-o"></i> Mostrar clientes</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i> <span>Proveedores</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <!-- Se valida que no sea un usuario auxiliar-->
                        <?php if ($usuario->getPuesto() != "Auxiliar") { ?>
                            <li><a href="altaproveedor.php"><i class="fa fa-circle-o"></i> Alta de proveedor</a></li>
                        <?php } ?>
                        <li><a href="totalproveedores.php"><i class="fa fa-circle-o"></i> Mostrar proveedores</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Comerlo
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
        <!-- Aquí va todo el contenido de la página -->