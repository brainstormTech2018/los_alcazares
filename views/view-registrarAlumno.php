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
        <a href="#" onclick="limpiar();">
        <div id="notify" >
        </div>
        </a>
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
                                <h4 class="title">Registro alumno</h4>                                
                            </div>
                            <div class="content">
                                <form method="POST" id="client">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombres" name="alu_nombre" id="alu_nombre" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apellido</label>
                                                    <input type="text" class="form-control" placeholder="Apellidos" name="alu_apellido" id="alu_apellido" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo identificación</label>
                                                    <select class="form-control" name="alu_identificacion" id="alu_identificacion" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="C.C.">Cédula de ciudadania</option>
                                                        <option value="T.I.">Tarjeta de identidad</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Número</label>
                                                    <input type="text" class="form-control" placeholder="Número de documento" name="alu_documento" id="alu_documento" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" class="form-control" placeholder="Teléfono de contacto" name="alu_telefono" id="alu_telefono" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" placeholder="Residencia" name="alu_direccion" id="alu_direccion" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Correo</label>
                                                    <input type="text" class="form-control" placeholder="Teléfono de contacto" name="alu_correo" id="alu_correo" required />
                                                </div>
                                            </div>
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <br>
                                                    <input type="radio" name="alu_activo" id="alu_activo" value="1"/>Activo<br/>
                                                    <input type="radio" name="alu_activo" id="alu_activo" value="0"/>Inactivo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label>Ciclo</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="alu_curso" id="alu_curso" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="3">Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1">Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2">Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5">Ciclo 5 - Grado 10°</option>
                                                        <option value="6">Ciclo 6 - Grado 11°</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Alumno" onclick="listar(1);">Registrar</a>
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
        var identificacion = $("#alu_identificacion").val();
        var documento = $("#alu_documento").val();
        var nombre = $("#alu_nombre").val();
        var apellido = $("#alu_apellido").val();
        var direccion = $("#alu_direccion").val();
        var telefono = $("#alu_telefono").val();
        var email = $("#alu_correo").val();
        var activo = $("#alu_activo").val();
        var curso = $("#alu_curso").val();


       $.ajax({   
       type: "POST",
       url:"../control/registro_alumnos.php",
       data:{"insertar":accion,"alu_documento":documento,"alu_nombre":nombre, "alu_apellido":apellido, "alu_direccion":direccion, "alu_telefono":telefono, "alu_correo":email, "alu_identificacion":identificacion,"alu_activo":activo, "alu_curso":curso},
       success: function(notify){       
         $('#notify').html(notify); 
         //alert(nombre);        
       }
       
     });}
   </script>

   <script type="text/javascript">
    var limpiar = function() {
     $("#client")[0].reset();
     document.getElementById('notify').style.display = 'none';}
}

   </script>


</html>
