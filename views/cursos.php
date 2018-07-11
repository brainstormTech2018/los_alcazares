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
                    <div class="col-md-2">
                        <div class="card">
                            <a onclick="listar(3,'<p>Ciclo 3 - Grado 6° y 7°</p>');" href="#">
                            <div class="header">
                                <h4 class="title" align="center">Ciclo 3</h4>
                            </div>
                               </a>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <a onclick="listar(4.1,'<p>Ciclo 4.1 - Grado 8°</p>');" href="#">
                            <div class="header">
                                <h4 class="title" align="center">Ciclo 4.1</h4>
                            </div>
                               </a>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <a onclick="listar(4.2,'<p>Ciclo 4.2 - Grado 9°</p>');" href="#">
                            <div class="header">
                                <h4 class="title" align="center">Ciclo 4.2</h4>
                            </div>
                               </a>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <a onclick="listar(5,'<p>Ciclo 3 - Grado 10°</p>');" href="#">
                            <div class="header">
                                <h4 class="title" align="center">Ciclo 5</h4>
                            </div>
                               </a>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <a onclick="listar(6.1,'<p>Ciclo 6.1 - Grado 11°</p>');" href="#">
                            <div class="header">
                                <h4 class="title" align="center">Ciclo 6.1</h4>
                            </div>
                               </a>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <a onclick="listar(6.2,'<p>Ciclo 6.2 - Grado 11°</p>');" href="#">
                            <div class="header">
                                <h4 class="title" align="center">Ciclo 6.2</h4>
                            </div>
                               </a>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Registro de alumnos</h4>
                                <p class="category">Grado:</p><p id='Grado'> - </p>
                                <p class="category">Director:</p><p id='Director'> - </p>
                            </div>
                            <div class="content table-responsive table-full-width" id='mytable'>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Estado</th>
                                        <th>Documento</th>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
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
        $(document).ready(function(){

            demo.initChartist();

            

        });
    </script>
    <script>  
    var listar = function(curso, director){
       $.ajax({   
       type: "POST",
       url:"../control/consulta-detalleCurso.php",
       data:{"curso":curso},
       success: function(mytable){       
         $('#mytable').html(mytable);
         $('#Grado').html(director);
       }
     });}
   </script>

</html>
