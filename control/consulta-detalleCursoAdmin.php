<?php 
include '../config/config.php';


    $curso = $_POST['curso'];



$activo = "Inactivo";
$sql = "SELECT concat(estudiante_nombre,' ',estudiante_apellido)r, estudiante_activo, estudiante_documento FROM `tbl_estudiantes` WHERE curso_codigo =".$curso;

$resultado = $link->query($sql);


$tablaHtml = '<table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nombre</th>
                                    	
                                    	<th>Activo</th>
                                    	<th>Documento</th>
                                        
                                    </thead>
                                    <tbody>';
while($rows = $resultado->fetch_assoc()){

	if($rows['estudiante_activo'] == 'Si'){
		$activo = "Activo";
	}
 $tablaHtml.='<tr>     
                    <td>' . $rows['r'].'</td>
	               
	                <td>' . $activo. '</td>
	                <td>' . $rows['estudiante_documento']. '</td>
                    <td><h3><p><center><a  href="#" class="text-info" data-toggle="modal" data-target="#myModal">
                 

	            </tr>
            ';

}
$tablaHtml.='</tbody>
        </table>';

 echo $tablaHtml;
?>