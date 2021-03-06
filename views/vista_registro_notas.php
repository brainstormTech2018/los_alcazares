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
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
                            if($_SESSION['userType'] == 'docente'){
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
                <li class="active">
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
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
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="user.php" class="dropdown-toggle">
                                <p>Cursos asignados</p>
                            </a>
                        </li>
                      <li>
                           
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
                    <?php 
                    $NoCursos;
                    $periodo;
                    $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                    include ('../config/config.php');

                    $sqlP = "SELECT periodo_id,periodo_fechaFin FROM tbl_periodo";

                    $resultadoP = $link->query($sqlP);
                        while ($rows = $resultadoP->fetch_assoc()){
                            $fechaFinPeriodo = strtotime($rows['periodo_fechaFin']);
                            if($fecha_actual < $fechaFinPeriodo){// si la fecha_Actual es menor al fin del periodo significa que el periodo ya acabó
                                $periodo = $rows['periodo_id'];
                            }
                        } 
                    //numero cursos activos para el docente
                   $sql = "SELECT curso_nombre, tbl_cursos.curso_codigo FROM `tbl_asignacion` INNER JOIN tbl_cursos on tbl_asignacion.curso_codigo = tbl_cursos.curso_codigo where tbl_asignacion.docente_documento = '".$_SESSION['docente']."' and tbl_asignacion.periodo_codigo = $periodo GROUP BY tbl_asignacion.curso_codigo";
                   $resultado = $link->query($sql);
                    

                    while($rows = $resultado->fetch_assoc()){
                        echo '<div class="col-md-4">
                        <div class="card">
                            
                                <div class="header">
                                    <h4 class="title">'.$rows['curso_nombre'].'</h4>
                                    <p class="category">
                                       <img src="../assets\img\approve.png" align="right">
                                    </p>
                                </div>
                                <div class="content">
                                  <br>
                                  <br>
                                  <br>
                                <div class="footer">
                                    <hr>                                    
                                    <a href="table.php?curso='.$rows['curso_nombre'].'&codigo='.$rows['curso_codigo'].'">
                                        <p align="left">Cargar</p>
                                    </a>
                                </div>
                                </div>                             
                        </div>
                    </div>';
                }
                
              

                    ?>
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

</html>
