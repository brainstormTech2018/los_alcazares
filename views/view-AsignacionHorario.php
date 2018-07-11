<?php 
include ('../config/config.php');
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Los Alcazares</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />



</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                   Los Alcazares
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="../index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Administrativo</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>Docente</p>
                    </a>
                </li>
                   
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              
                                <p>Menú</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              
                        </li>
                        <li>
                           
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           
                        </li>
                        <li class="dropdown">
                              
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Asignación horario</h4>                                
                            </div>
                            <div class="content">
                                <form action="../control/registro_horario.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Código</label>
                                                    <select class="form-control" name="pe_codigo" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="P1">Periodo 1</option>
                                                        <option value="P2">Periodo 2</option>
                                                        <option value="P3">Periodo 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <input type="text" class="form-control" placeholder="Apellidos" name="pe_descripcion" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Docente</label>
                                                    <select class="form-control" name="docenteDocumento" required>
                                            <option value="" disabled selected>Elige una opción</option>
                                            <?php 
                                                $link = mysqli_connect('localhost', 'root', '', 'colegio_alcazares');

                                                if ($link === false) {
                                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                                }   
                                                $sql = 'SELECT concat(docente_nombre," ",docente_apellido)r, docente_documento FROM tbl_docentes';
                                                $query = mysqli_query($link, $sql);
            
                                                while ($valores = mysqli_fetch_array($query)) {                            
                                                    echo '<option value="'.$valores[docente_documento].'">'.$valores[r].'</option>';
                                                    
                                                }
                                            ?>
                                        </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Materia</label>
                                                     <select class="form-control" name="materiaCod" required>
                                            <option value="" disabled selected>Elige una opción</option>
                                            <?php 
                                                $link = mysqli_connect('localhost', 'root', '', 'colegio_alcazares');

                                                if ($link === false) {
                                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                                }   
                                                $sql = 'SELECT materia_codigo, materia_nombre FROM tbl_materias';
                                                $query = mysqli_query($link, $sql);
            
                                                while ($valores = mysqli_fetch_array($query)) {                            
                                                    echo '<option value="'.$valores[materia_codigo].'">'.$valores[materia_nombre].'</option>';
                                                    
                                                }
                                            ?>
                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Curso</label>
                                                      <select class="form-control" name="cursoCod" required>
                                            <option value="" disabled selected>Elige una opción</option>
                                            <?php 
                                                $link = mysqli_connect('localhost', 'root', '', 'colegio_alcazares');

                                                if ($link === false) {
                                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                                }   
                                                $sql = 'SELECT curso_codigo, curso_nombre FROM tbl_cursos';
                                                $query = mysqli_query($link, $sql);
            
                                                while ($valores = mysqli_fetch_array($query)) {                            
                                                    echo '<option value="'.$valores[curso_codigo].'">'.$valores[curso_nombre].'</option>';
                                                    
                                                }
                                            ?>
                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Fecha Inicio</label>
                                                      <input type='text' class="form-control" name="pe_fechaInicio" placeholder='AAAA/MM/dd'/>

                                                </div>
                                                 <script type="text/javascript">
                                                   
                                                    </script>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Fecha Fin</label>
                                                    <input type='text' class="form-control" name="pe_fechaFin" placeholder='AAAA/MM/dd'/>
   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Día</label>
                                                    <select class="form-control" name="pe_codigo" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="Lunes">Lunes</option>
                                                        <option value="Martes">Martes</option>
                                                        <option value="Miercoles">Miercoles</option>
                                                        <option value="Miercoles">Jueves</option>
                                                        <option value="Miercoles">Viernes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Hora Inicio</label>
                                                    <input type="text" class="form-control" placeholder="00:00 a.m." name="pe_descripcion" required />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Hora Fin</label>
                                                    <input type="text" class="form-control" placeholder="00:00 a.m." name="pe_descripcion" required />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" name="insertar" value="1" title="Guardar Alumno">Registrar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Realizado por <a href="www.brainstormtechnology.com">Brainstorm Technology</a>
                </p>
            </div>
        </footer>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="../assets/js/demo.js"></script>

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
