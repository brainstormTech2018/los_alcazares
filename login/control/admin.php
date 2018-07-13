<?php 
	session_start();

	require '../admin/config.php';
	require './functions.php';

	// Comprobar session
	if (!isset($_SESSION['usuario'])) {
	 	header('Location: '.RUTA.'./login/control/login.php');
	}

	$conexion = conexion($db_config);
	$admin = iniciarSession('usuarios', $conexion);

	if ($admin['tipo_usuario'] == 'administrador') {
	 	// Traer el nombre del usuario
	  	$admin = iniciarSession('usuarios', $conexion);
		require '../views/admin.view.php';
	} else {
	 	header('Location: '.RUTA.'./login/control/validate.php');
	}
?>
