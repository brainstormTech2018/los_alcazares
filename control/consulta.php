<?php 
include '../config/config.php';

  $sql = "SELECT nota_1,nota_2,nota_3,nota_definitiva FROM `tbl_notas` ORDER BY `nota_id` DESC LIMIT 1";

 	$resultado = $link->query($sql);

	while($rows = $resultado->fetch_assoc()){
 echo '<table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nombre</th>
                                    	<th>Observaciones</th>
                                    	<th>1 Nota</th>
                                    	<th>2 Nota</th>
                                        <th>3 Nota</th>
                                        <th>Definitiva</th>
                                    </thead>
                                    <tbody>
                                        <tr>     
                                            <td>Felipe</td>
											<td>observacion</td>
							                <td>' . $rows['nota_1'].'</td>
							                <td>' . $rows['nota_2']. '</td>
							                <td>' . $rows['nota_3']. '</td>
							                <td>' . $rows['nota_definitiva']. '</td>
							            </tr>
                                    </tbody>
                                </table>';
  }

  $link->close();


     
    $resultado->free();



 							
                                ?>