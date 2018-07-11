<?php 
include ('../config/config.php');


    $accion=$_POST['insertar'];



switch ($accion) {
	case 1://Registro horario 
		$periodoCodigo = $_POST['pe_codigo'];
		$periodoDesc = $_POST['pe_descripcion'];
		$periodoFechaI = $_POST['pe_fechaInicio'];
		$periodoFechaF = $_POST['pe_fechaFin'];
		$materiaCodigo = $_POST['materiaCod'];
		$docenteDocume = $_POST['docenteDocumento'];
		$cursoCodigo = $_POST['cursoCod'];

	 
			$sql1 = "INSERT INTO tbl_periodos(periodo_codigo,periodo_descripcion,periodo_fechaIni,periodo_fechaFin,materia_codigo,docente_documento,curso_codigo) VALUES (' $periodoCodigo','$periodoDesc','$periodoFechaI','$periodoFechaF','$materiaCodigo','$docenteDocume','$cursoCodigo')";
			echo ($sql1);
		$query1 = mysqli_query($link, $sql1);
				if($query1 > 0){
			echo('Registro  Exitoso '.$periodoCodigo.' '.$periodoDesc);
				}
		
	
	  break;

	
 }




 ?>