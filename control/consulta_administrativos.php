<?php 
include '../config/config.php';
$docente = $_GET['docente'];
$curso = $_GET['curso'];


  $notas = "SELECT* FROM((SELECT tbl_estudiantes.estudiante_documento, 'sin notas' estatus, '1' docente,tbl_notas.curso_codigo as curso FROM `tbl_estudiantes` LEFT JOIN tbl_notas on tbl_estudiantes.estudiante_documento = tbl_notas.estudiante_codigo where tbl_notas.estudiante_codigo is null) UNION (SELECT tbl_notas.estudiante_codigo, 'CON notas' estatus, tbl_notas.docente_codigo as docente,tbl_notas.curso_codigo as curso FROM tbl_estudiantes RIGHT JOIN tbl_notas on tbl_estudiantes.estudiante_documento = tbl_notas.estudiante_codigo))q WHERE q.docente = $docente and curso = $curso";


 

  $html = " <div class='card'>
                           <div class='content table-responsive'>
<table class='table table-striped' width='10px'>
                                    <thead>
                                    <center>
                                        <th>Alumno</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                        </center>
                                    </thead>
                                    <tbody>";
 	
    $rNotas = $link ->query($notas);

  while ($rows = $rNotas->fetch_assoc()) {
    $html.='<tr>     
            <td>' . $rows['estudiante_documento'].'</td>';

            if($rows['estatus'] == 'CON notas'){
              $html.='<td><h4><ion-icon name="checkmark-circle-outline"></ion-icon></h4></td>';
            }else{
              $html.='<td><h4><ion-icon name="close-circle-outline"></ion-icon></h4></td>';
            }
            
     $html.='<td><h4><ion-icon name="eye"></ion-icon></h4></td>            
        </tr>';
  

}
            
           
           

    
  


/*$html.= '</tbody>
     </table>
     </div>
     </div>';*/

  $link->close();     

echo $html;






 							
                                ?>