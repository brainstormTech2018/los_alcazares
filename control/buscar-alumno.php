<?php 
include '../config/config.php';

$alumno = $_POST['alumno'];


$sql = "SELECT estudiante_nombre, estudiante_apellido, estudiante_documento, estudiante_tipoDocumento, estudiante_activo, estudiante_direccion, estudiante_telefono, estudiante_correo, estudiante_jornada, curso_codigo FROM tbl_estudiantes where estudiante_documento =  $alumno";

$resultado = $link->query($sql);



if($rowsN = $resultado->fetch_assoc()){
$html = '<form method="POST" id="client">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombres" name="alu_nombre" id="alu_nombre" value='.$rowsN['estudiante_nombre'].' required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apellido</label>
                                                    <input type="text" class="form-control" placeholder="Apellidos" name="alu_apellido" id="alu_apellido" value='.$rowsN['estudiante_apellido'].' required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo identificación</label>
                                                    <select class="form-control" name="alu_identificacion" id="alu_identificacion" required>';
                                                    if($rowsN['estudiante_tipoDocumento'] == 'C.C.'){
                                                        $html.= '<option value="C.C." selected>Cédula de ciudadania</option>
                                                        <option value="T.I.">Tarjeta de indentidad</option>';
                                                    }else if($rowsN['estudiante_tipoDocumento'] == 'T.I.'){
                                                       $html.= '<option value="T.I." selected>Tarjeta de identidad</option>
                                                       <option value="C.C.">Cedula de ciudadania</option>';
                                                    }
                                                  $html.='</select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Número</label>
                                                    <input type="text" class="form-control" placeholder="Número de documento" name="alu_documento" id="alu_documento" value='.$rowsN['estudiante_documento'].' required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" class="form-control" placeholder="Teléfono de contacto" name="alu_telefono" id="alu_telefono" value='.$rowsN['estudiante_telefono'].' required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" placeholder="Residencia" name="alu_direccion" id="alu_direccion" value='.$rowsN['estudiante_direccion'].' required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Correo</label>
                                                    <input type="email" class="form-control" placeholder="Teléfono de contacto" name="alu_correo" id="alu_correo" value='.$rowsN['estudiante_correo'].' required />
                                                </div>
                                            </div>
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <br>';

                                                    if($rowsN['estudiante_activo'] == 'Si'){
                                                        $html.=' <select class="form-control" name="alu_activo" id="alu_activo" required>
                                                        <option value="" disabled>Elige una opción</option>
                                                        <option value="Si" selected>Activo</option>
                                                        <option value="No">Inactivo</option>
                                                      </select>';
                                                    }else if($rowsN['estudiante_activo'] == 'No'){
                                                        $html.=' <select class="form-control" name="alu_activo" id="alu_activo" required>
                                                        <option value="" disabled>Elige una opción</option>
                                                        <option value="Si">Activo</option>
                                                        <option value="No" selected>Inactivo</option>
                                                      </select>';
                                                    }
                                                    
                                               $html.= '</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label>Ciclo</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="alu_curso" id="alu_curso" required>';

                                                    switch ($rowsN['curso_codigo']){
                                                        case '3':
                                                        $html.='<option value="3" selected>Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1">Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2">Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5">Ciclo 5 - Grado 10°</option>
                                                        <option value="6.1">Ciclo 6.1 - Grado 11°</option>
                                                        <option value="6.2">Ciclo 6.2 - Grado 11°</option>';
                                                        break;

                                                        case '4.1':
                                                        $html.='<option value="3">Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1" selected>Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2">Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5">Ciclo 5 - Grado 10°</option>
                                                        <option value="6.1">Ciclo 6.1 - Grado 11°</option>
                                                        <option value="6.2">Ciclo 6.2 - Grado 11°</option>';
                                                        break;

                                                        case '4.2':
                                                        $html.='<option value="3">Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1">Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2" selected>Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5">Ciclo 5 - Grado 10°</option>
                                                        <option value="6.1">Ciclo 6.1 - Grado 11°</option>
                                                        <option value="6.2">Ciclo 6.2 - Grado 11°</option>';
                                                        break;

                                                        case '5':
                                                        $html.='<option value="3">Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1" >Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2">Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5" selected>Ciclo 5 - Grado 10°</option>
                                                        <option value="6.1">Ciclo 6.1 - Grado 11°</option>
                                                        <option value="6.2">Ciclo 6.2 - Grado 11°</option>';
                                                        break;

                                                        case '6.1':
                                                        $html.='<option value="3">Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1">Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2">Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5">Ciclo 5 - Grado 10°</option>
                                                        <option value="6.1" selected>Ciclo 6.1 - Grado 11°</option>
                                                        <option value="6.2">Ciclo 6.2 - Grado 11°</option>';
                                                        break;

                                                        case '6.2':
                                                        $html.='<option value="3">Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1">Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2">Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5">Ciclo 5 - Grado 10°</option>
                                                        <option value="6.1">Ciclo 6.1 - Grado 11°</option>
                                                        <option value="6.2" selected>Ciclo 6.2 - Grado 11°</option>';
                                                        break;

                                                    }
                                                        
                                                $html.='</select>
                                                </div>

                                               
                                            </div>
                                             <div class="col-md-6">
                                                    <label>Jornada</label>
                                                         <div class="form-group">
                                                         <select class="form-control" name="alu_jornada" id="alu_jornada" required>';
                                                         switch ($rowsN['estudiante_jornada']){
                                                        case '1':
                                                        $html.='<option value="1">Mañana</option>
                                                        <option value="2">Tarde</option>
                                                        <option value="3">Sabados</option>';
                                                        break;

                                                        case '2':
                                                        $html.='<option value="1">Mañana</option>
                                                        <option value="2">Tarde</option>
                                                        <option value="3">Sabados</option>';
                                                        break;

                                                        case '3':
                                                        $html.='<option value="1">Mañana</option>
                                                        <option value="2">Tarde</option>
                                                        <option value="3">Sabados</option>';
                                                        break;

                                                         }

                                                         $html.='</select>
                                                         </div>
                                                 </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Alumno" onclick="limpiar();">Limpiar</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Alumno" onclick="listar(2);">Actualizar</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>';

                                    echo $html;
}else{
    $html='<center><a href="#" onclick="limpiar();"><h1>REGISTRO NO ENCONTRADO</h1><a></center>';

    echo $html;
}
 ?>
