<?php 

include ('../config/config.php');

 $accion=$_POST['insertar'];
 $notificacion="";

switch ($accion) {
	case 1:
		
		$encargado =$_POST['pla_encargado'];
		$nombre = $_POST['pla_nombre'];
		$descripcion = $_POST['pla_desc'];
		$fecha = $_POST['pla_fecha'];
		$hora = $_POST['pla_hora'];
		$lugar = $_POST['pla_lugar'];

		
		$sql1="INSERT INTO tbl_planeacion (`planeacion_encargado`, `planeacion_plan`, `planeacion_actividad`, planeacion_fecha, planeacion_hora, planeacion_lugar) VALUES ('$encargado', '$nombre', '$descripcion', '$fecha', '$hora', '$lugar')";
        
				$query1 = mysqli_query($link, $sql1);
								if($query1 > 0){
							$notificacion.="<div class='alert alert-success'>
					            <div class='container-fluid'>
									<b>¡Registro exitoso!</b>
					            </div>
					        </div>";
						}else{
			$notificacion.="<div class='alert alert-danger'>
						             <div class='container-fluid'>										 
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											clear
										</button>
						                 <b>".$sql1."</b>
						            </div>
						        </div>";
		}
		echo $notificacion;
		
		break;
	
	}



?>