<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Nacolor | Registro usuario</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="../assets/css/font-awesome/font-awesome.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../../assets/img/sidebar/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
                Tip 2: you can also add an image using data-image tag
            -->
            <div class="sidebar-wrapper">
                <div class="logo" title="Inicio Nacolor">
                    <a href="<?php echo RUTA.'./login/control/admin.php'; ?>" class="simple-text">
                        Nacolor
                    </a>
                </div>
                <ul class="nav">
                    <li title="Página principal de Nacolor">
                        <a class="nav-link" href="<?php echo RUTA.'./login/control/admin.php'; ?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li title="Registro de los empleados">
                        <a class="nav-link" href="../../control/empleado.php">
                            <i class="nc-icon nc-bag"></i>
                            <p>Empleados</p>
                        </a>
                    </li>
                    <li title="Registro de los propietarios">
                        <a class="nav-link" href="../../control/propietario.php">
                            <i class="nc-icon nc-badge"></i>
                            <p>Propietarios</p>
                        </a>
                    </li>
                    <li title="Registro de las obras">
                        <a class="nav-link" href="../../control/obra.php">
                            <i class="nc-icon nc-settings-90"></i>
                            <p>Obras</p>
                        </a>
                    </li>
                     <li title="Registro de los pagos">
                        <a class="nav-link" href="../../control/prestamo-empleado-deduccion.php">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Pagos</p>
                        </a>
                    </li>
                    <li class="nav-item active" title="Registro de los usuarios">
                        <a class="nav-link" href="<?php echo RUTA.'./login/control/registro.php'; ?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- fixed plugin -->
            <div class="fixed-plugin">
                <div class="dropdown show-dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="fa fa-cog fa-2x"> </i>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Style</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger">
                                <p>Background Image</p>
                                <label class="switch">
                                    <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                                </label>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger background-color">
                                <p>Filters</p>
                                <div class="pull-right">
                                    <span class="badge filter badge-black" data-color="black"></span>
                                    <span class="badge filter badge-azure" data-color="azure"></span>
                                    <span class="badge filter badge-green" data-color="green"></span>
                                    <span class="badge filter badge-orange" data-color="orange"></span>
                                    <span class="badge filter badge-red" data-color="red"></span>
                                    <span class="badge filter badge-purple active" data-color="purple"></span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li class="header-title">Sidebar Images</li>
                        <li class="active">
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-1.jpg" alt="Fondo sidebar 1" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-2.jpg" alt="Fondo sidebar 2" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-3.jpg" alt="Fondo sidebar 3" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-4.jpg" alt="Fondo sidebar 4" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-5.jpg" alt="Fondo sidebar 5" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-6.jpg" alt="Fondo sidebar 6" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-7.jpg" alt="Fondo sidebar 7" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-8.jpg" alt="Fondo sidebar 8" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-9.jpg" alt="Fondo sidebar 9" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-10.jpg" alt="Fondo sidebar 10" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-11.jpg" alt="Fondo sidebar 11" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../../assets/img/sidebar/sidebar-12.jpg" alt="Fondo sidebar 12" />
                            </a>
                        </li>
                        <li class="header-title" id="sharrreTitle">Gracias por elegir Nacolor!</li>
                    </ul>
                </div>
            </div>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="<?php echo RUTA.'./login/control/registro.php'; ?>" title="Usuario"> Usuario </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bullet-list-67"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" rel="tooltip" title="Cerrar sesión" data-placement="bottom">
                                    <a href="<?php echo RUTA.'./login/control/close.php'; ?>" class="dropdown-item text-danger">
                                        <i class="nc-icon nc-button-power"></i> Log out
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registo usuario</h4>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre de usuario</label>
                                                    <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Contraseña del usuario</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Contraseña del usuario" name="password" id="password" required />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-eye" id="mostrarPass"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo de usuario</label>
                                                    <select class="form-control" name="rol" required>
                                                        <option value="" selected>Elige una opción</option>
                                                        <option value="administrador">Administrador</option>
                                                        <option value="usuario">Usuario</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar usuario">Registrar usuario</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <footer class="footer">
                <div class="container">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, NACOLOR. Todos los Derechos Reservados | Diseñada por
                        <strong><i>Multitechnis S.A.S.</i></strong>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="../../assets/js/plugins/chartist.min.js"></script>
<!--  Share Plugin -->
<script src="../../assets/js/plugins/jquery.sharrre.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<!-- Javascript -->
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();

    $(document).ready(function () {
        $('#mostrarPass').click(function () {
            if ($('#password').attr('type') === 'text') {
                $('#password').attr('type', 'password');
                $('#mostrarPass').attr('class', 'fa fa-eye');                
            } else {
                $('#password').attr('type', 'text');
                $('#mostrarPass').attr('class', 'fa fa-eye-slash');
            }
        });
    });
</script>

</html>