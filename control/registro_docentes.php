<?php 
include ('../config/config.php');


    $accion=$_POST['insertar'];



switch ($accion) {
	case 1://Registrar docentes
		$documento = $_POST['do_documento'];
		$nombre = $_POST['do_nombre'];
		$apellido = $_POST['do_apellido'];
		$direccion = $_POST['do_direccion'];
		$telefono = $_POST['do_telefono'];
		$email = $_POST['do_email'];

	  $sql = "SELECT docente_nombre, docente_apellido FROM tbl_docentes WHERE docente_documento = '$documento'";
	  
		$query = mysqli_query($con, $sql);
		if(mysqli_num_rows($query) > 0){
			if($query){
				if(mysqli_num_rows($query) > 0){
					while ($row1 = mysqli_fetch_array($query)) {
						echo('Documento ya registrado, REGISTRO: '.$row1['docente_nombre'].' '.$row1['docente_apellido']);
					}
				}
				
		    }
		}else{
			$sql1 = "INSERT INTO tbl_docentes(docente_documento,docente_nombre,docente_apellido,docente_direccion,docente_telefono,docente_email) VALUES (' $documento','$nombre','$apellido','$direccion','$telefono','$email')";
			
		$query1 = mysqli_query($con, $sql1);
				if($query1 > 0){
			echo('insertado Empleado '.$nombre.' '.$apellido);
				}
		}
	
	  break;

	
 }




 ?>