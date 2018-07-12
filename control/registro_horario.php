<?php 
include ('../config/config.php');


    $accion=$_POST['insertar'];



switch ($accion) {
	case 1: 

		//variables registro asignacion
		$periodo = $_POST['periodo'];
		$curso = $_POST['cursoCod'];
		$docente = $_POST['docenteDocumento'];
		$materia = $_POST['materiaCod'];
		
		//variables registro horario
		$horaInicio = $_POST['inicio'];
		$horaFin = $_POST['fin'];
		$dia = $_POST['dia'];
	 
			$sql1 = "INSERT INTO tbl_asignacion(periodo_codigo,curso_codigo,docente_documento,materia_codigo) VALUES (' $periodo','$curso','$docente','$materia')";
			echo ($sql1);
		$query1 = mysqli_query($link, $sql1);
				if($query1 > 0){
			echo('Registro  Exitoso ');
				}

				$sql2 = "INSERT INTO tbl_horario(hora_inicio,hora_fin,hora_dia,curso_codigo,docente_codigo) VALUES ('$horaInicio','$horaFin','$dia','$curso','$docente')";
				echo $sql2;
		$query2 = mysqli_query($link, $sql2);
				if($query2 > 0){
			echo('Registro  Exitoso ');
				}
	
	  break;

	
 }




 ?>