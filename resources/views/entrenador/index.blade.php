@extends('master')
@section('script')
  @parent
    <script src="{{ asset('public/Js/Entrenador/Entrenador.js') }}"></script> 
    <!--<script src="{{ asset('public/Js/Deportista/Deportiva.js') }}"></script> 
    <script src="{{ asset('public/Js/Deportista/ApoyoServicios.js') }}"></script>    
    
    {{Html::script('public/Js/jquery.dataTables.js')}}
    {{Html::script('public/Js/dataTables.responsive.min.js')}}        
    {{Html::style('public/Css/jquery.dataTables.min.css')}}
    {{Html::style('public/Css/bootstrap.css')}}
    {{Html::script('public/Js/tablesIdioma.js')}}   
    {{Html::style('public/Css/dataTables.bootstrap.min.css')}}
    {{Html::script('public/Js/dataTables.bootstrap.min.js')}}
    
    <script src="{{ asset('public/Js/bootstrap-datepicker.js') }}"></script>
    {{Html::style('public/Css/bootstrap-datepicker3.css')}}-->
    
@stop  
@section('content') 

 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
    <div id="main_persona" class="row" data-url="{{ url(config('usuarios.prefijo_ruta')) }}">  
        <div class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Buscar persona</h3>
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
                                    <input name="buscador" type="text" class="form-control" placeholder="Buscar" value="1032455961">
                                    <span class="input-group-btn">
                                        <button id="buscar" data-role="buscar" class="btn btn-default" type="button">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </button>
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
                <div class="modal-content" style="padding-bottom: 50px;">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title text-center" id="nombreDeport"></h4>
                      <p class="list-group-item-text text-center">
                        <small id="Cedula" ></small>
                    </p> 
                    </div>
                    <div class="modal-body">                                                   
                                
                            <br>
                            <div tabindex="-1" id="mensaje-incorrecto" class=" text-left alert alert-success alert-danger" role="alert" style="display: none;">
                                <strong>Error </strong> <span id="mensajeIncorrecto"></span>
                            </div>
                            <br>
                            <div>
                                <h4 class="modal-title text-uppercase">Datos del deportista:</h4>
                                <br>

                            </div>                            
                            <br>
                            <div class="col-xs-12 col-md-12 ">   
                                <div class="form-group">
                                   
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                     <button type="button" class="btn btn-primary" name="Enviar" id="Enviar">Enviar</button>
                                   
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>                        
    </div> 
@stop
