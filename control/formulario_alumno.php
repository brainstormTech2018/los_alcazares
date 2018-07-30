<?php 
$html = '                              <form method="POST" id="client">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombres" name="alu_nombre" id="alu_nombre" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apellido</label>
                                                    <input type="text" class="form-control" placeholder="Apellidos" name="alu_apellido" id="alu_apellido" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo identificación</label>
                                                    <select class="form-control" name="alu_identificacion" id="alu_identificacion" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="C.C.">Cédula de ciudadania</option>
                                                        <option value="T.I.">Tarjeta de identidad</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Número</label>
                                                    <input type="text" class="form-control" placeholder="Número de documento" name="alu_documento" id="alu_documento" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" class="form-control" placeholder="Teléfono de contacto" name="alu_telefono" id="alu_telefono" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" placeholder="Residencia" name="alu_direccion" id="alu_direccion" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Correo</label>
                                                    <input type="email" class="form-control" placeholder="Teléfono de contacto" name="alu_correo" id="alu_correo" required />
                                                </div>
                                            </div>
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <br>
                                                      <select class="form-control" name="alu_activo" id="alu_activo" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="Si">Activo</option>
                                                        <option value="No">Inactivo</option>
                                                     

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label>Ciclo</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="alu_curso" id="alu_curso" required>
                                                        <option value="" disabled selected>Elige una opción</option>
                                                        <option value="3">Ciclo 3 - Grado 6° y 7°</option>
                                                        <option value="4.1">Ciclo 4.1 - Grado 8°</option>
                                                        <option value="4.2">Ciclo 4.2 - Grado 9°</option>
                                                        <option value="5">Ciclo 5 - Grado 10°</option>
                                                        <option value="6.1">Ciclo 6.1 - Grado 11°</option>
                                                        <option value="6.2">Ciclo 6.2 - Grado 11°</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Alumno" onclick="listar(1);">Registrar</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Alumno" onclick="actualizar();">Buscar</a>
                                                </div>
                                            </div>
                                             
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>';

                                    echo $html;




 ?>