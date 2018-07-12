<?php
include ('../config/config.php');
 $accion=$_POST['insertar'];

  $notificacion = "";

switch ($accion) {
	case 1://Registrar docentes
		$tipoDocumento=$_POST['alu_identificacion'];
		$documento = $_POST['alu_documento'];
		$nombre = $_POST['alu_nombre'];
		$apellido = $_POST['alu_apellido'];
		$activo=$_POST['alu_activo'];
		$direccion = $_POST['alu_direccion'];
		$email = $_POST['alu_correo'];
		$telefono = $_POST['alu_telefono'];
		$curso=$_POST['alu_curso'];

	  $sql = "SELECT estudiante_nombre, estudiante_apellido FROM tbl_estudiantes WHERE estudiante_documento = '$documento'";
	  
		$query = mysqli_query($link, $sql);
		if(mysqli_num_rows($query) > 0){
			if($query){
				if(mysqli_num_rows($query) > 0){
					while ($row1 = mysqli_fetch_array($query)) {
						echo('Documento ya registrado, REGISTRO: '.$row1['estudiante_nombre'].' '.$row1['estudiante_apellido']);
					}
				}
				
		    }

		}else{
			$sql1 = "INSERT INTO tbl_estudiantes(estudiante_tipoDocumento,estudiante_documento,estudiante_nombre,estudiante_apellido,estudiante_activo,estudiante_direccion,estudiante_correo,estudiante_telefono,curso_codigo)
												 VALUES ('$tipoDocumento',$documento,'$nombre','$apellido','$activo','$direccion','$email','$telefono','$curso')";

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
						                 <b>".$sql1."</b>
						            </div>
						        </div>";
				}
		}
		echo $notificacion;
	  break;
}
?>