<?php 
include ('../config/config.php');


    $accion=$_POST['insertar'];

    $flag1;
    $flag2;

    $html;


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
	 
			$sql1 = "INSERT INTO tbl_asignacion(periodo_codigo,curso_codigo,docente_documento,materia_codigo) VALUES ('$periodo','$curso','$docente','$materia')";
			
		$query1 = mysqli_query($link, $sql1);
				if($query1 > 0){
			$flag1 = 1;
				}else{
					$flag1 = 0;
				}

				$sql2 = "INSERT INTO tbl_horario(hora_inicio,hora_fin,hora_dia,curso_codigo,docente_codigo) VALUES ('$horaInicio','$horaFin','$dia','$curso','$docente')";
				
		$query2 = mysqli_query($link, $sql2);
				if($query2 > 0){
				$flag2 = 1;
				}else{
				$flag2 = 0;
				}


				if($flag1 == 1 && $flag2 == 1){
					$html="<div class='alert alert-success'>
						            <div class='container-fluid'>
										<b>¡Registro exitoso!</b>
						            </div>
						        </div>";
				}else{
					$html="<div class='alert alert-danger'>
						             <div class='container-fluid'>										 
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											clear
										</button>
						                 <b>".$sql1."</b>
						            </div>
						        </div>";
				}
		echo $html;
	  break;

	
 }




 ?>