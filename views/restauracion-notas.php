<?php 
include ('../config/config.php');
session_start();
if (isset($_SESSION["usuario"] )) {
 
}else {
        echo '<SCRIPT LANGUAGE="javascript">
            location.href = "../index.html";
            </script>';
}
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
                <li class="active">
                    <a href="index.php">
                        <i class="pe-7s-culture"></i>
                        <p>Administrativo</p>
                    </a>
                </li>
               <li>
                    <?php 
                        if(isset($_SESSION['userType'])){
                            if($_SESSION['userType'] == 'administrativo'){
                                echo '<a href="#">';
                            }else{
                                echo '<a href="index.php">';
                            }
                        }
                     ?>
                    
                        <i class="pe-7s-graph"></i>
                        <p>Docente</p>
                    </a>
                </li>
                <li>
                    <a href="view-planeacion.php">
                        <i class="pe-7s-date"></i>
                        <p>Planeación</p>
                    </a>
                </li>                   
            </ul>
        </div>
    </div>

    <div class="main-panel">

        <div id="notify" >
        </div>
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Menu acciones</a>
                </div>
                <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav navbar-right">
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
                                <h4 class="title">Restaurar plataforma para:</h4>                                
                            </div>
                            <div class="content">
                                <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Docente</label>
                                                    <select class="form-control" name="docente" id="docente" required>
                                            <option value="" disabled selected>Elige una opción</option>
                                            <?php 
                                                $link = mysqli_connect('localhost', 'root', '', 'colegio_alcazares');

                                                if ($link === false) {
                                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                                }   
                                                $sql = 'SELECT docente_documento, concat(docente_nombre," ",docente_apellido)q FROM tbl_docentes';
                                                $query = mysqli_query($link, $sql);
            
                                                while ($valores = mysqli_fetch_array($query)) {                            
                                                    echo '<option value="'.$valores[docente_documento].'">'.$valores[q].'</option>';
                                                    
                                                }
                                            ?>
                                        </select>

                                                </div>
                                            </div>
                                         </div>

                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Alumno</label>
                                                    <select class="form-control" name="alumno" id="alumno" required>
                                            <option value="" disabled selected>Elige una opción</option>
                                            <?php 
                                                $link = mysqli_connect('localhost', 'root', '', 'colegio_alcazares');

                                                if ($link === false) {
                                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                                }   
                                                $sql = 'SELECT estudiante_documento, concat(estudiante_nombre," ",estudiante_apellido," - ",curso_codigo)q FROM tbl_estudiantes';
                                                $query = mysqli_query($link, $sql);
            
                                                while ($valores = mysqli_fetch_array($query)) {                            
                                                    echo '<option value="'.$valores[estudiante_documento].'">'.$valores[q].'</option>';
                                                    
                                                }
                                            ?>
                                        </select>

                                                </div>
                                            </div>
                                         </div>
                                        
                                        
                                                                                
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a type="submit" class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" name="insertar" value="1" title="Guardar Periodo" onclick="listar(1);">Aceptar</a>
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
        <!-- Sart Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-sm">
                            <div  id="notifyModal">

                           </div>
                  </div>
                </div>
<!--  End Modal -->
    
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
        

     });
</script>
<script type="text/javascript">  
    var listar = function(accion){
        var docente = $("#docente").val();
        var alumno = $("#alumno").val();
       

       
       $.ajax({   
       type: "POST",
       url:"../control/restauracion_plataforma.php",
       data:{"insertar":accion,"docente":docente,"alumno":alumno},
       success: function(notifyModal){       
         $('#notifyModal').html(notifyModal); 
         $('#myModal').modal('show');        
       }
       
     });}
</script>

</html>
