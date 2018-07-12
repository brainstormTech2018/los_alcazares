<?php 
include '../config/config.php';

  $sql = "SELECT nota_1,nota_2,nota_3,nota_definitiva,concat(estudiante_nombre,' ',estudiante_apellido)q FROM `tbl_notas` INNER JOIN tbl_estudiantes on tbl_notas.estudiante_codigo = tbl_estudiantes.estudiante_documento WHERE nota_fecha = curdate()";

 	$resultado = $link->query($sql);
$html = "<table class='table table-hover table-striped'>
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Observaciones</th>
                                        <th>1 Nota</th>
                                        <th>2 Nota</th>
                                        <th>3 Nota</th>
                                        <th>Definitiva</th>
                                    </thead>
                                    <tbody>";
	while($rows = $resultado->fetch_assoc()){
 $html.='<tr>     
                                            <td>' . $rows['q'].'</td>
											<td> - </td>
							                <td>' . $rows['nota_1'].'</td>
							                <td>' . $rows['nota_2']. '</td>
							                <td>' . $rows['nota_3']. '</td>
							                <td>' . $rows['nota_definitiva']. '</td>
							            </tr>'
                                   ;
  }

$html.= '</tbody>
     </table>';

  $link->close();     
    $resultado->free();
echo $html;


 							
                                ?>