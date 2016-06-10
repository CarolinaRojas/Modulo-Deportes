@extends('master')
@section('script')
  @parent
    <script src="{{ asset('public/Js/Deportista/Deportista.js') }}"></script> 
@stop  
@section('content') 
 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
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
                                    <input name="buscador" type="text" class="form-control" placeholder="Buscar" value="1073157928">
                                    <span class="input-group-btn">
                                        <button id="buscar" data-role="buscar" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12"><br></div>
                                <div class="col-xs-12">
                                    <ul id="personas"></ul>
                                </div>
                                <div id="paginador" class="col-xs-12"></div>                            
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
                            
                            <div>
                                <h4>Datos de la persona:</h4>
                                @include('deportista.persona')
                            </div>
                            <br>
                            <div>
                                <h4>Datos del deportista:</h4>
                                @include('deportista.deportista')
                            </div>                            
                            <br>
                            <div class="col-xs-12 col-md-12 ">   
                                <div class="form-group">
                                   <div class="col-lg-12 ">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                     <button type="button" class="btn btn-primary" name="Enviar" id="Enviar">Enviar</button>
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