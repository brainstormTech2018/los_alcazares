<?php
include ('../config/config.php');
 $accion=$_POST['insertar'];

  $notificacion = "";

switch ($accion) {
	case 1://Registrar docentes
		$inicio=$_POST['inicio'];
		$fin = $_POST['fin'];
		$periodo = $_POST['periodo'];
		

			$sql1 = "UPDATE tbl_periodo SET periodo_fechaIni='$inicio',periodo_fechaFin='$fin' WHERE periodo_id ='$periodo'";

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