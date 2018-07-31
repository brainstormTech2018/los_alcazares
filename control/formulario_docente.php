<?php
$html = '<form  method="POST" id="client">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombres" name="do_nombre" id="do_nombre" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apellido</label>
                                                    <input type="text" class="form-control" placeholder="Apellidos" name="do_apellido" id="do_apellido" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cedula</label>
                                                    <input type="text" class="form-control" placeholder="Número de documento" name="do_documento" id="do_documento" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" placeholder="Residencia" name="do_direccion" id="do_direccion" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" class="form-control" placeholder="Teléfono de contacto" name="do_telefono" id="do_telefono" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="text" class="form-control" placeholder="Correo electrónico" name="do_email" id="do_email" required />
                                                </div>
                                            </div>
                                        </div>

                                       
                                        
                                        <div class="row">
                                             <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Docente" onclick="listar(1);">Registrar</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-info btn-fill pull-right" data-toggle="tooltip" data-placement="left" title="Guardar Docente" onclick="actualizar();">Buscar</a>
                                                </div>
                                            </div>
                                             
                                        </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>';


                                    echo $html;

?>