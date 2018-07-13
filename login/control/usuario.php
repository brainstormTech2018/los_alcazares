<?php 
	session_start();

	require '../admin/config.php';
	require './functions.php';

	// Comprobar session
	if (!isset($_SESSION['usuario'])) {
  		header('Location: '.RUTA.'./login/control/login.php');
	}

	$conexion = conexion($db_config);
	$user = iniciarSession('usuarios', $conexion);

	if ($user['tipo_usuario'] == 'usuario') {
  		// Traer el nombre del usuario
  		$user = iniciarSession('usuarios', $conexion);
		require '../views/usuario.view.php';
	} else {
		header('Location: '.RUTA.'./login/control/validate.php');
	}
?>