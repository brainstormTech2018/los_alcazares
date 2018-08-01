<?php 
include '../config/config.php';
$docente = $_GET['docente'];
$curso = $_GET['curso'];
$alumno = $_GET['alumno'];
$opcion;
  $sql = "SELECT nota_personal,nota_academico,nota_soacial,nota_promedio,nota_semana, nota_observacion,concat(estudiante_nombre,' ',estudiante_apellido)q FROM `tbl_notas` INNER JOIN tbl_estudiantes on tbl_notas.estudiante_codigo = tbl_estudiantes.estudiante_documento where tbl_notas.docente_codigo = '$docente' AND tbl_notas.curso_codigo = $curso AND tbl_estudiantes.estudiante_documento = $alumno";
  $nombre = "SELECT concat(estudiante_nombre,' ',estudiante_apellido)q FROM tbl_estudiantes where estudiante_documento = $alumno ";
 	$resultado = $link->query($sql);
  $resul = $link->query($nombre);

  $rowsN = $resul->fetch_assoc();

$html = " <div class='card'>
                            <div class='header'>
                                <h4 class='title'><center><strong>".$rowsN['q']."<strong></center></h4>
                            </div>
                            <div class='content table-responsive'>

<table class='table table-striped' width='10px'>
                                    <thead>
                                    <center>
                                        <th>Semana</th>
                                        
                                        <th>Observaciones</th>
                                        <th>Acádemico</th>
                                        <th>Personal</th>
                                        <th>Social</th>
                                        <th>Definitiva</th>
                                        </center>
                                    </thead>
                                    <tbody>";
	while($rows = $resultado->fetch_assoc()){
 $html.='<tr>     
            <td>' . $rows['nota_semana'].'</td>
           
		        <td> '. $rows['nota_observacion'].' </td>
            <td>' . $rows['nota_academico'].'</td>
            <td>' . $rows['nota_personal']. '</td>
            <td>' . $rows['nota_soacial']. '</td>
            <td>' . $rows['nota_promedio']. '</td>
        </tr>'
                                   ;

  }

$html.= '</tbody>
     </table>
     </div>
     </div>';

  $link->close();     

echo $html;


 							
                                ?>