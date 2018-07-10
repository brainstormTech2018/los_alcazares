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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    

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

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
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
                    <a href="user.html">
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Lista Estudiantes</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            
                        </li>
                        <li class="dropdown">
                              
                        </li>
                        <li>
                           
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                          <a class="text-info"  onclick="listar();">Ver ultimo registro</a>
                        </li>
                        <li>
                             <a class="text-info" data-toggle="modal" data-target="#myModal">
                                <p>Cargue de notas</p>
                             </a>
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
                                <h4 class="title">Relacion de alumnos y notas 1 periodo</h4>
                                <p class="category">Grado <?php echo $_GET['curso'] ?></p>
                            </div>
                            <div class="content table-responsive table-full-width" id='mytable'>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nombre</th>
                                    	<th>Observaciones</th>
                                    	<th>1 Nota</th>
                                    	<th>2 Nota</th>
                                        <th>3 Nota</th>
                                        <th>Definitiva</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>-</td>
                                        	<td>-</td>
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
                    
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Realizado por <a href="www.brainstormtechnology.com">Brainstorm Technology</a>
                </p>
            </div>            
        </footer>
    </div>


<!-- Sart Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-profile">
                                <i class="nc-icon nc-paper-2"></i>                                     
                            </div>
                            <h6 class="modal-title">Cargar planilla</h6>
                        </div>
                        <div class="modal-body text-center">
                           <div class="container">
                            <form name="importa" method="post" action="" enctype="multipart/form-data" >
                              <div class="col-xs-4">
                                <div class="form-group">
                                  <input type="file" class="filestyle" data-buttonText="Seleccione archivo" name="excel">
                                </div>
                              </div>
                              <div class="col-xs-2">
                                <input class="btn btn-default btn-file" type='submit' name='enviar'  value="Importar"/>
                              </div>
                              <input type="hidden" value="upload" name="action" />
                              <input type="hidden" value="usuarios" name="mod">
                              <input type="hidden" value="masiva" name="acc">

                            </form>
<!-- PROCESO DE CARGA Y PROCESAMIENTO DEL EXCEL-->
<?php 
extract($_POST);
if (isset($_POST['action'])) {
$action=$_POST['action'];
}

if (isset($action)== "upload"){
//cargamos el fichero
$archivo = $_FILES['excel']['name'];
$tipo = $_FILES['excel']['type'];
$destino = "cop_".$archivo;//Le agregamos un prefijo para identificarlo el archivo cargado
if (copy($_FILES['excel']['tmp_name'],$destino))  "Archivo Cargado Con Éxito";
else echo "Error Al Cargar el Archivo";
        
if (file_exists ("cop_".$archivo)){ 
/** Llamamos las clases necesarias PHPEcel */
require_once('../Classes/PHPExcel.php');
require_once('../Classes/PHPExcel/Reader/Excel2007.php');                  
// Cargando la hoja de excel
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("cop_".$archivo);
$objFecha = new PHPExcel_Shared_Date();       
// Asignamon la hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);

// Importante - conexión con la base de datos 
$cn = mysql_connect ("localhost","root","") or die ("ERROR EN LA CONEXION CON LA BD");
$db = mysql_select_db ("colegio_alcazares",$cn) or die ("ERROR AL CONECTAR A LA BD");

// Rellenamos el arreglo con los datos  del archivo xlsx que ha sido subido

$columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
$filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

//Creamos un array con todos los datos del Excel importado
for ($i=4;$i<=$filas;$i++){
                        
                        $_DATOS_EXCEL[$i]['nota_1']= $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['nota_2']= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['nota_3'] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['definitiva'] = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['activo'] = 1;
                    }       
                    $errores=0;


foreach($_DATOS_EXCEL as $campo => $valor){
                        $sql = "INSERT INTO tbl_notas  (nota_1,nota_2,nota_3,nota_definitiva,activo)  VALUES ('";
                        foreach ($valor as $campo2 => $valor2){
                            $campo2 == "activo" ? $sql.= $valor2."');" : $sql.= $valor2."','";
                        }

                        $result = mysql_query($sql);
                        if (!$result){ echo "sentencia: ".$sql;}
                    }   
                    /////////////////////////////////////////////////////////////////////////   
echo "<hr> <div class='col-xs-12'>
        <div class='form-group'>";
          echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
echo "</div>
</div>  ";
                            //Borramos el archivo que esta en el servidor con el prefijo cop_
                    unlink($destino);
                    
                }
                    //si por algun motivo no cargo el archivo cop_ 
                else{
                    echo "Primero debes cargar el archivo con extencion .xlsx";
                }
            }
        ?>
<!-- fin cargue -->

                            </div>
                        </div>
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
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
<script type="text/javascript">

        $().ready(function(){
            // the body of this function is in assets/material-kit.js
            materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }

        });
        </script>
<script>
        var listar = function(accion){
           
             $.get("../control/consulta.php")
            .done(function(mytable){
            $("#mytable").html(mytable);
            });
      
        }
       
</script>

  
</html>
