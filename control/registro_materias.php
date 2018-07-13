<?php 

include ('../config/config.php');

 $accion=$_POST['insertar'];
$notificacion="";

switch ($accion) {
	case 1:
		
		$codigo =$_POST['codigo'];
		$nombre = $_POST['materia'];
		$docente = $_POST['docente'];

		$sql = "SELECT materia_nombre FROM tbl_materias WHERE materia_codigo = '$codigo'";
	  
		$query = mysqli_query($link, $sql);
		if(mysqli_num_rows($query) > 0){
			if($query){
				if(mysqli_num_rows($query) > 0){
					while ($row1 = mysqli_fetch_array($query)) {
						echo('Materia  ya registrado, REGISTRO: '.$row1['materia_nombre']);
					}
				}
				
		    }
		}else{
		$sql1="INSERT INTO tbl_materias (`materia_codigo`, `materia_nombre`, `docente_codigo`) VALUES ('$codigo', '$nombre', '$docente')";
        
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
}


?>