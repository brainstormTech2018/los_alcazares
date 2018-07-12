<?php
include ('../config/config.php');
 $accion=$_POST['insertar'];

  $notificacion = "";

switch ($accion) {
	case 1://Registrar docentes
		$curso=$_POST['curso'];
		$docente = $_POST['docente'];
		

			$sql1 = "UPDATE tbl_cursos SET docente_documento = '".$docente."' WHERE curso_id = ".$curso;;

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
						                 <b>Hubo un error</b>
						            </div>
						        </div>";
		}
		echo $notificacion;
	  break;
}
?>