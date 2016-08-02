@extends('master')
@section('script')
  @parent
    <script src="{{ asset('public/Js/Entrenador/Entrenador.js') }}"></script> 
    {{Html::style('public/Css/bootstrap.css')}}
    
@stop  
@section('content') 
<center><h3>GESTIÓN DE ENTRENADORES</h3></center>
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
                                <button autocomplete="off" data-loading-text="Cargando..." type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Datos actualizados satisfactoriamente.
                              </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <input name="buscador" type="text" class="form-control" placeholder="Buscar" value="1016015041">
                                    <span class="input-group-btn">
                                        <button autocomplete="off" data-loading-text="Cargando..." id="buscar" data-role="buscar" class="btn btn-default" type="button">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </button>
                                    </span>
                                </div>
                                <div tabindex="-1" id="mensaje-incorrectoB" class=" text-left alert alert-success alert-danger" role="alert" style="display: none; margin-top: 10px;">                                    
                                    <strong>Error </strong> <span id="mensajeIncorrectoB"></span>
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
        <div class="modal fade bs-example-modal-lg" id="modal_form_entrenador" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding-bottom: 50px;">
                  <div class="modal-header">
                      <button autocomplete="off" data-loading-text="Cargando..." type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title text-center" id="nombreEntrenador"></h4>
                      <p class="list-group-item-text text-center">
                        <small id="cedulaEntrenador" ></small>
                    </p> 
                    </div>
                    <div class="modal-body">                                                   
                            <br>
                            <div>                                
                                <input type="hidden" name="Id_Persona" id="Id_Persona">
                                <div class="row">
                                    <div class="col-md-4 text-center"></div>
                                    <div class="col-md-4 text-center">
                                        <span id="SImagen">
                                            <img id="Imagen" src="" alt="" class="img-thumbnail img-responsive"><br>         
                                        </span>
                                    </div>
                                </div>

                                <br>
                                <div class="row">    
                                    <form enctype="multipart/form-data" id="Formulario_Imagen" name="Formulario_Imagen" role="form" method="POST" action="">        
                                        <div class="col-md-2">
                                            <label for="inputEmail" class="control-label" id="FotografiaL">Fotografia de entrenador:</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" name="Fotografia" class="form-control" id="Fotografia">
                                        </div>
                                      </form>  
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="inputEmail" class="control-label">Fecha Nacimiento:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" placeholder="Fecha Nacimiento" type="text" name="Fecha_Nacimiento" readonly="readonly">
                                    </div>

                                    <div class="col-md-2">
                                        <label for="inputEmail" class="control-label">Género:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="Genero" id="Genero" class="form-control" disabled="">
                                          <option value="">Seleccionar</option>
                                          @foreach($genero as $generos)
                                                  <option value="{{ $generos['Id_Genero'] }}">{{ $generos['Nombre_Genero'] }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                   <div class="col-md-2">
                                        <label for="inputEmail" class="control-label">Pais Nacimiento:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="Pais" id="Pais" class="form-control" disabled="">
                                            <option value="">Seleccionar</option>
                                            @foreach($pais as $paises)
                                                    <option value="{{ $paises['Id_Pais'] }}">{{ $paises['Nombre_Pais'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputEmail" class="control-label">Ciudad:</label>
                                      </div>
                                      <div class="col-md-4">
                                        <input class="form-control" placeholder="Ciudad" type="text" name="Nombre_Ciudad" readonly="readonly">
                                      </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                      <label for="inputEmail" class="control-label">Grupo Etnico:</label>
                                    </div>    
                                    <div class="col-md-4">
                                        <select name="Grupo_Etnico" id="Grupo_Etnico" class="form-control" disabled="">
                                          <option value="">Seleccionar</option>
                                          @foreach($etnia as $etnias)
                                                  <option value="{{ $etnias['Id_Etnia'] }}">{{ $etnias['Nombre_Etnia'] }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div>    
                            <br>
                            <div tabindex="-1" id="mensaje-incorrecto" class=" text-left alert alert-success alert-danger" role="alert" style="display: none;">
                                <strong>Error </strong> <span id="mensajeIncorrecto"></span>
                            </div>
                            <br>
                            <h4 class="modal-title text-uppercase">Datos del entrenador:</h4>
                            <h4>N° deportistas a cargo: <span class="label label-default" id="Num_Deportistas"></span></h4>
                            <br>
                            <input type="hidden" name="Id_Entrenador" id="Id_Entrenador">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="inputEmail" class="control-label" id="Telefono_FijoL">Telefono fijo:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder="Telefono fijo" type="text" name="Telefono_Fijo" id="Telefono_Fijo">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputEmail" class="control-label" id="Telefono_CelularL">Telefono Celular:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder="Telefono Celular" type="text" name="Telefono_Celular" id="Telefono_Celular">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="inputEmail" class="control-label" id="Correo_ElectronicoL">Correo Electronico:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder="Correo Electronico" type="text" name="Correo_Electronico" id="Correo_Electronico">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="inputEmail" class="control-label" id="Etapa_EntrenamientoL">Etapas de entrenamiento:</label>
                                </div>
                                <br>
                                <div class="col-md-4" id="Etapa_Entrenamiento">
                                    @foreach($etapasEntrenamiento as $etapasEntrenamientos)
                                        <div class="col-md-12">                                            
                                            <input type="checkbox"  name="etapa{{$etapasEntrenamientos['PK_I_ID_ETAPA_ENTRENAMIENTO']}}" id="etapa{{$etapasEntrenamientos['PK_I_ID_ETAPA_ENTRENAMIENTO']}}" />
                                            <small >{{$etapasEntrenamientos['V_NOMBRE_ETAPA_ENTRENAMIENTO']}}</small>
                                        </div>
                                    @endforeach                                    
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                 <div class="col-md-2">
                                    <label for="inputEmail" class="control-label" id="AgrupacionL">Agrupación:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="Agrupacion" id="Agrupacion" class="form-control">
                                        <option value="">Seleccionar</option>
                                        @foreach($agrupacion as $agrupaciones)
                                            <option value="{{ $agrupaciones['PK_I_ID_AGRUPACION'] }}">{{ $agrupaciones['V_NOMBRE_AGRUPACION'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputEmail" class="control-label" id="DeporteL">Deporte:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="Deporte" id="Deporte" class="form-control">
                                        <option value="">Seleccionar</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="inputEmail" class="control-label" id="ModalidadL">Modalidades:</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12" id="Modalidad">
                                        <!--@foreach($etapasEntrenamiento as $etapasEntrenamientos)
                                        <div class="col-md-12">                                            
                                            <input type="checkbox"  name="etapa{{$etapasEntrenamientos['PK_I_ID_ETAPA_ENTRENAMIENTO']}}" id="etapa{{$etapasEntrenamientos['PK_I_ID_ETAPA_ENTRENAMIENTO']}}" />
                                            <small >{{$etapasEntrenamientos['V_NOMBRE_ETAPA_ENTRENAMIENTO']}}</small>
                                        </div>
                                    @endforeach                                    -->
                                    </div>
                                  <!--  <select name="Modalidad" id="Modalidad" class="form-control">
                                        <option value="">Seleccionar</option>                                        
                                    </select>-->
                                </div>                                
                            </div>
                            <br><br>
                            <div class="col-xs-12 col-md-12 ">   
                                <div class="form-group">                                   
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                     <button autocomplete="off" data-loading-text="Cargando..." type="button" class="btn btn-primary" name="Enviar" id="Enviar">Enviar</button>
                                   
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>                        
    </div> 
@stop
