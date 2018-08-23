<?php 
include '../config/config.php';


    $curso = $_GET['curso'];



$activo = "Inactivo";
$sql = "SELECT concat(estudiante_nombre,' ',estudiante_apellido)r, estudiante_activo, estudiante_documento FROM `tbl_estudiantes` WHERE curso_codigo =".$curso;

$resultado = $link->query($sql);


$tablaHtml = '<table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nombre</th>
                                    	<th>Apellido</th>
                                    	<th>Activo</th>
                                    	<th>Documento</th>
                                        <th><center>Acciones</center></th>
                                    </thead>
                                    <tbody>';
while($rows = $resultado->fetch_assoc()){

	if($rows['estudiante_activo'] == 'Si'){
		$activo = "Activo";
	}
 $tablaHtml.='<tr>     
                    <td>' . $rows['r'].'</td>
	                <td>' . $rows['r']. '</td>
	                <td>' . $activo. '</td>
	                <td><a href="../control/reportes/listaCurso.php?documento='.$rows['estudiante_documento'].'&curso='.$curso.'">' . $rows['estudiante_documento']. '</a></td>
                    <td><h3><p><center><a  href="#" class="text-info" data-toggle="modal" data-target="#myModal">
                                <ion-icon name="cloud-upload"></ion-icon>
                                
                            </a>
                            <a href="#" onclick=verificar('.$rows['estudiante_documento'].');>
                               <ion-icon name="eye"></ion-icon>
                                
                            </a></center></p></h3>
                    </td>

	            </tr>
            ';

}
$tablaHtml.='</tbody>
        </table>';

 echo $tablaHtml;
?>