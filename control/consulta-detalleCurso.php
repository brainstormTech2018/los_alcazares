<?php 
include '../config/config.php';

$curso = $_POST['curso'];
$activo = "Inactivo";
$sql = "SELECT concat(estudiante_nombre,' ',estudiante_apellido)r, estudiante_activo, estudiante_documento FROM `tbl_estudiantes` WHERE curso_codigo =".$curso;

$resultado = $link->query($sql);


$tablaHtml = '<table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nombre</th>
                                    	<th>Apellido</th>
                                    	<th>Activo</th>
                                    	<th>Documento</th>
                                        
                                    </thead>
                                    <tbody>';
while($rows = $resultado->fetch_assoc()){

	if($rows['estudiante_activo'] == 1){
		$activo = "Activo";
	}
 $tablaHtml.='<tr>     
                    <td>' . $rows['r'].'</td>
	                <td>' . $rows['r']. '</td>
	                <td>' . $activo. '</td>
	                <td>' . $rows['estudiante_documento']. '</td>
	            </tr>
            ';

}
$tablaHtml.='</tbody>
        </table>';

 echo $tablaHtml;
?>