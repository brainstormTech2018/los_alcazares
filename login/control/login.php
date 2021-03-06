<?php 
	session_start();

	require '../admin/config.php';
	require './functions.php';


	$errores = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$password=hash('sha512', $password) ;
	

		$conexion = conexion($db_config);
		$statement = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND contrasena = :password');
		$statement->execute([
	    	':usuario' => $usuario,
	    	':password' => $password
		]);
		$resultado = $statement->fetch();

		if ($resultado !== false) {
			$_SESSION['usuario'] = $usuario;
			
			header('Location: '.RUTA.'./login/control/validate.php');
	  	} else {
	    	echo "<div>    		 													 
						<p><strong><center>Tu usuario y/o contraseña son incorrectos</center></strong></p>
		          </div>";
	    	
	  	}
	}
	require '../views/login.view.php';
?>
