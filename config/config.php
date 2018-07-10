<?php

	// Datos de la base de datos
	$usuario = "root";
	$password = "";
    $servidor = "localhost";
	$basededatos = "colegio_alcazares";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$con = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección dela base de datos a utilizar
	$db = mysqli_select_db( $con, $basededatos ) or die ( " no se ha podido conectar a la base de datos" );

?>
