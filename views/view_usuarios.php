
<?php
 
	include ('../config/config.php');
session_start();
if (isset($_SESSION["usuario"] )) {
  
}else {
        echo '<SCRIPT LANGUAGE="javascript">
            location.href = "../index.html";
            </script>';}	
?>

<!DOCTYPE html>
<html>
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
                        <p>Administrativo</p>
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
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="index.php" class="dropdown-toggle">
                              
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
                            <a href="../login/control/close.php" class="dropdown-item text-danger">
                                        <i class="nc-icon nc-button-power"></i> Log out
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
                                <h4 class="title">Registros de Acceso</h4>                                
                            </div>
                            <div class="content">
                                <form>
                                      <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <input type="text" class="form-control" placeholder="Usuario" name="user" id="user"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contraseña</label>
                                                    <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo de usuario</label>
                                                    <select class="form-control" name="tipo" id="tipo" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="docente">Docente</option>
                                                        <option value="administrativo">Administrativo</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Documento</label>
                                                    <input type="text" class="form-control" placeholder="Documento" name="documento" id="documento" required />
                                                </div>
                                                
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="submit" name="registra" class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Docente" onclick="listar(1);">
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Docente" onclick="listar(2);">Borrar por documento</a>
                                                </div>
                                            </div>
                                        </div>
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
<script type="text/javascript">  
    var listar = function(accion){
        var usuario = $("#user").val();
        var contrasena = $("#pass").val();
        var tipo = $("#tipo").val();
        var documento = $("#documento").val();
        


       $.ajax({   
       type: "POST",
       url:"../control/registro_usuario.php",
       data:{"insertar":accion,"user":usuario,"pass":contrasena, "tipo":tipo, "documento":documento},
       success: function(notify){       
         $('#notify').html(notify); 
         //alert(nombre);        
       }
       
     });}
</script>

   <script type="text/javascript">
    var limpiar = function() {
     $("#client")[0].reset();
     
}

   </script>
   

</html>
								       


