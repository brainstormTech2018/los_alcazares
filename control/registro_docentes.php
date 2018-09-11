<?php 
include ('../config/config.php');


    $accion=$_POST['insertar'];

    $notificacion = "";

switch ($accion) {
	case 1://Registrar docentes
		$documento = $_POST['do_documento'];
		$nombre = $_POST['do_nombre'];
		$apellido = $_POST['do_apellido'];
		$direccion = $_POST['do_direccion'];
		$telefono = $_POST['do_telefono'];
		$email = $_POST['do_email'];

	  $sql = "SELECT docente_nombre, docente_apellido FROM tbl_docentes WHERE docente_documento = '$documento'";
	  
		$query = mysqli_query($link, $sql);
		if(mysqli_num_rows($query) > 0){
			if($query){
				if(mysqli_num_rows($query) > 0){
					while ($row1 = mysqli_fetch_array($query)) {
						//echo('Documento ya registrado, REGISTRO: '.$row1['estudiante_nombre'].' '.$row1['estudiante_apellido']);
					
						echo "<div class='alert alert-success'>
	            <div class='container-fluid'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<i class='material-icons'></i>
					</button>
	            	<b>Documento ya registrado, REGISTRO: ".$row1['docente_nombre'].' '.$row1['docente_apellido']."</b>
	            </div>
	        </div>";

					}
				}
				
		    }

		}else{
			$sql1 = "INSERT INTO tbl_docentes(docente_documento,docente_nombre,docente_apellido,docente_direccion,docente_telefono,docente_email) VALUES ('$documento','$nombre','$apellido','$direccion','$telefono','$email')";

		$query1 = mysqli_query($link, $sql1);
				if($query1 > 0){
			$notificacion.="<div class='alert alert-success'>
	            <div class='container-fluid'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<i class='material-icons'></i>
					</button>
	            	<b>¡Registro exitoso!</b>
	            </div>
	        </div>";
			
				}else{
					$notificacion.="<div class='alert alert-danger'>
						             <div class='container-fluid'>										 
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											clear
										</button>
						                 <b>DOCENTE NO REGISTRADO</b>
						            </div>
						        </div>";
				}
		}
		echo $notificacion;

	  break;

	   case 2://Actualizar Docente

	   	$documento = $_POST['do_documento'];
		$nombre = $_POST['do_nombre'];
		$apellido = $_POST['do_apellido'];
		$direccion = $_POST['do_direccion'];
		$telefono = $_POST['do_telefono'];
		$email = $_POST['do_email'];

		$sql2 = "SELECT docente_nombre,docente_apellido,docente_direccion,docente_email,docente_telefono from tbl_docentes  WHERE docente_documento ='$documento'";
         
			$query = mysqli_query($link, $sql2);
			if(mysqli_num_rows($query) > 0){
					$sql1 = " UPDATE tbl_docentes SET docente_documento='$documento',docente_nombre='$nombre', docente_apellido='$apellido', docente_direccion='$direccion', docente_email='$email', docente_telefono='$telefono' WHERE docente_documento='$documento'" ;

					$query1 = mysqli_query($link, $sql1);
							if($query1 > 0){
						$notificacion.="<div class='alert alert-success'>
				            <div class='container-fluid'>
								<b>Actualizacion Exitosa</b>
				            </div>
				        </div>";
					}
				}else{
						$notificacion.="<div class='alert alert-danger'>
									             <div class='container-fluid'>										 
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
														clear
													</button>
									                 <b>Documento no Encontrado</b>
									            </div>
									        </div>";
					}
					echo $notificacion;


	   break;
	
 }




 ?>