<?php 
include ('../config/config.php');


    $accion=$_POST['insertar'];

    $notificacion = "";

switch ($accion) {
	case 1:
		$usuario = $_POST['user'];
		$contrasena = $_POST['pass'];
		$tipo = $_POST['tipo'];
		$documento = $_POST['documento'];
		$pass_cifrado=hash('sha512', $contrasena) ;
	  $sql = "SELECT usuario, tipo_usuario FROM usuario WHERE id_docente = '$documento'";
	  
		$query = mysqli_query($link, $sql);
		if(mysqli_num_rows($query) > 0){
			if($query){
				if(mysqli_num_rows($query) > 0){
					while ($row1 = mysqli_fetch_array($query)) {
						echo('Documento ya registrado, REGISTRO: '.$row1['usuario'].' '.$row1['tipo_usuario']);
					}
				}
				
		    }
		}else{
			$sql1 = "INSERT INTO usuario(usuario,contrasena,tipo_usuario,id_docente) VALUES ('$usuario','$pass_cifrado','$tipo','$documento')";
			
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
						                 <b>Hubo un error</b>
						            </div>
						        </div>";
				}
		}
		echo $notificacion;
		
	  break;
case 2://eliminar 
	
		$documento = $_POST['documento'];

 $sql2 = "SELECT usuario,contrasena,tipo_usuario from usuario  WHERE id_docente = '$documento'";
	  	$query = mysqli_query($link, $sql2);
			if(mysqli_num_rows($query) > 0){
				$sql1 = "DELETE FROM usuario WHERE id_docente='$documento'";
				$query1 = mysqli_query($link, $sql1);
				if($query1 > 0){
			$notificacion.="<div class='alert alert-success'>
	            <div class='container-fluid'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<i class='material-icons'></i>
					</button>
	            	<b>¡Registro eliminado!</b>
	            </div>
	        </div>";
				}
				
			}else{
					$notificacion.="<div class='alert alert-danger'>
						             <div class='container-fluid'>										 
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											clear
										</button>
						                 <b>No se encontro Registro intentelo de nuevo</b>
						            </div>
						        </div>";
		}
   
		
	  
			
		
		echo $notificacion;
		
	  break;
	
 }




 ?>