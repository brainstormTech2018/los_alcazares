<?php 
include '../config/config.php';
$docente = $_GET['docente'];
$curso = $_GET['curso'];


  $notas = "SELECT tbl_estudiantes.estudiante_documento as q, 'sin notas' estatus FROM tbl_estudiantes where estudiante_documento <> (SELECT tbl_notas.estudiante_codigo FROM tbl_notas INNER JOIN tbl_estudiantes on tbl_notas.estudiante_codigo = tbl_estudiantes.estudiante_documento where tbl_notas.curso_codigo = $curso and tbl_notas.docente_codigo = $docente group by tbl_notas.estudiante_codigo) and tbl_estudiantes.curso_codigo = $curso UNION (SELECT tbl_notas.estudiante_codigo, 'con notas' estatus FROM tbl_notas WHERE tbl_notas.curso_codigo = $curso and tbl_notas.docente_codigo = $docente)";


 

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
            <td>' . $rows['q'].'</td>';

            if($rows['estatus'] == 'con notas'){
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