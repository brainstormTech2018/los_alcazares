<?php
<<<<<<< HEAD
	$DB_SERVER = 'localhost';
	$DB_USERNAME='root';
	$DB_PASSWORD= '';
	$DB_NAME='colegio_alcazares';
	 
	$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

	if ($link === false) {
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}	
?>
=======

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
>>>>>>> 1ae9286de2ad8142baf8b6da52ca06b2a9b93f69
