@extends('master')          

@section('script')
  @parent
    <script src="{{ asset('public/Js/Deportista/deportisa.js') }}"></script> 
@stop  

@section('content') 
  


<div id="main_persona" class="row" data-url="{{ url(config('usuarios.prefijo_ruta')) }}">  

    <div class="content">
  		    <div class="panel panel-primary">
  					  <div class="panel-heading">
  					    <h3 class="panel-title">Deportista</h3>
  					  </div>
  					  <div class="panel-body">
  					  		<div class="row">

                          <div id="main_persona" class="row" data-url="{{ url(config('usuarios.prefijo_ruta')) }}">
                            
                            <div id="alerta" class="col-xs-12" style="display:none;">
                              <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Datos actualizados satisfactoriamente.
                                 

                              </div>
                            </div>
                            <div class="col-xs-12">
                              <div class="input-group">
                                    <input name="buscador" type="text" class="form-control" placeholder="Buscar">
                                    <span class="input-group-btn">
                                      <button id="buscar" data-role="buscar" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                      
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12">
                              <br>
                            </div>

                            <div class="col-xs-12">
                              <ul id="personas">
                                
                              </ul>
                            </div>

                            <div id="paginador" class="col-xs-12">
                             
                            </div>
                            
                          </div>
  							</div>
  					  </div>
         </div>
    </div>






<div class="modal fade bs-example-modal-lg" id="modal_form_persona" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title"><p class="text-center" id="titulo"></p></h2>
      </div>

      <div class="modal-body">
                              <form class="form-horizontal" id="form_deportista" action="">
                                <fieldset>
                                  <legend><p clase="text-uppercase" id="nombreDeport"></p></legend>
                                  
                                 
                                        <div class="row">
                                          <div class="col-md-4"></div>
                                          <div class="col-md-4 text-center">
                                                
                                                <label for="inputEmail" class="control-label">Foto</label><br>
                                                <img src="" alt="" class="img-thumbnail img-responsive" style="width:100%; height:100%; max-width:200px; min-height:200px;max-height:250px;"><br>
                                                 C.C <label class="control-label" id="Cedula"></label>
                                          </div>
                                          <div class="col-md-4"></div>
                                        </div>

                                    <br><br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Fecha Nacimiento:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Fecha Nacimiento" type="text" name="Fecha_Nacimiento" readonly="readonly">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Pais Nacimiento:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Pais Nacimiento" type="text" name="Id_Pais" readonly="readonly">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Departamento:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Departamento" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Ciudad:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Ciudad" type="text" name="Nombre_Ciudad" readonly="readonly">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">EPS:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="EPS" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Dirección Residencia:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Dirección Residencia" type="text" name="Primer_Apellido">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Barrio:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Barrio" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Localidad:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Localidad" type="text" name="Primer_Apellido">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Telefono fijo:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Telefono fijo" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Telefono Celular:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Telefono Celular" type="text" name="Primer_Apellido">
                                      </div>
                                    </div>
                                    <br>
                                     <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Correo Electronico:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Correo Electronico" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Grupo Etnico:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Grupo Etnico" type="text" name="Primer_Apellido">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Estado Civil:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Estado Civil" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Hijos:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Hijos" type="text" name="Primer_Apellido">
                                      </div>
                                    </div>
                                    <br>
                                   <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Cuenta:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Cuenta" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Agrupación:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Agrupación" type="text" name="Primer_Apellido">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Deporte:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Deporte" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Modalidad:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Modalidad" type="text" name="Primer_Apellido">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label for="inputEmail" class="control-label pull-right">Etapa:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Etapa" type="text" name="Primer_Apellido">
                                      </div>
                                      <div class="col-md-2">
                                      </div>
                                      <div class="col-md-4">
                                      </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-md-12 ">   
                                           <div class="form-group">
                                              <div class="col-lg-12 ">
                                                <button type="reset" class="btn btn-default">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                              </div>
                                           </div>
                                    </div>
                                  
                                  
                                </fieldset>
                              </form>
      </div>
    </div>
  </div>
</div>








@stop


