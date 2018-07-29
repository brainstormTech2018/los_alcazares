<?php 

include ('../config/config.php');

 $accion=$_POST['insertar'];
$notificacion="";

switch ($accion) {
	case 1:
		
		$docente =$_POST['docente'];
		$alumno = $_POST['alumno'];
		

		$sql = "SELECT * FROM tbl_notas WHERE docente_codigo = '$docente' and estudiante_codigo = '$alumno'";
		
	  
		$query = mysqli_query($link, $sql);
		if(mysqli_num_rows($query) > 0){
			if($query){
				
					
						$sql1 = "DELETE FROM `tbl_notas` WHERE docente_codigo = '$docente' and estudiante_codigo = '$alumno'";

						$query1 = mysqli_query($link, $sql1);
								if($query1 > 0){
							$notificacion.="<div class='alert alert-success'>
					            <div class='container-fluid'>
									<b>¡Registro habilitado!</b>
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
				
				
		    }
		}
		echo $notificacion;
		break;
	
	}



?>