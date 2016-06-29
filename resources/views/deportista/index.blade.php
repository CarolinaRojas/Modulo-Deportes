@extends('master')
@section('script')
  @parent
    <script src="{{ asset('public/Js/Deportista/Deportistas.js') }}"></script> 
    <script src="{{ asset('public/Js/Deportista/Deportiva.js') }}"></script> 
    <script src="{{ asset('public/Js/Deportista/ApoyoServicios.js') }}"></script>    
    
    {{Html::script('public/Js/jquery.dataTables.js')}}
    {{Html::script('public/Js/dataTables.responsive.min.js')}}        
    {{Html::script('public/Js/bootstrap.min.js')}}
    {{Html::script('public/Js/responsive.bootstrap.min.js')}}        
    {{Html::style('public/Css/bootstrap-theme.css')}}
    {{Html::style('public/Css/bootstrap-theme.min.css')}}
    {{Html::style('public/Css/bootstrap.min.css') }}
    {{Html::style('public/Css/jquery.dataTables.min.css')}}
    {{Html::style('public/Css/responsive.bootstrap.min.css')}}
    {{Html::style('public/Css/bootstrap.css')}}
    {{Html::script('public/Js/tablesIdioma.js')}}   
    {{Html::style('public/Css/dataTables.bootstrap.min.css')}}
    {{Html::script('public/Js/dataTables.bootstrap.min.js')}}
    
    <script src="{{ asset('public/Js/bootstrap-datepicker.js') }}"></script>
    {{Html::style('public/Css/bootstrap-datepicker3.css')}}
    
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
                                @include('deportista.persona')
                            <br>
                            <div tabindex="-1" id="mensaje-incorrecto" class=" text-left alert alert-success alert-danger" role="alert" style="display: none;">
                                <strong>Error </strong> <span id="mensajeIncorrecto"></span>
                            </div>
                            <br>
                            <div>
                                <h4 class="modal-title text-uppercase">Datos del deportista:</h4>
                                <br>
                                @include('deportista.deportista')                                
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
                
    <div class="modal fade bs-example-modal-lg" id="modal_form_deportiva" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-center" id="nombreDeportD"></h4>
            <p class="list-group-item-text text-center">
              <small id="CedulaD" ></small>
          </p> 
          </div>
          <div class="modal-body">
              <h4 class="modal-title text-uppercase">Datos Deportivos:</h4>
              <div class="row">                  
                <div class="row">
                    <div class="col-md-4 text-center"></div>
                    <div class="col-md-4 text-center">
                        <span id="SImagen2">
                            <img id="Imagen2" src="" alt="" class="img-thumbnail img-responsive"><br>         
                        </span>
                    </div>
                </div>
              </div>
              <form class="form-horizontal" id="form_deportista" action="">
                  <fieldset>                          
                        <br>
                        <div tabindex="-1" id="mensaje-incorrecto-dos" class=" text-left alert alert-success alert-danger" role="alert" style="display: none;">
                            <strong>Error </strong> <span id="mensajeIncorrectoDos"></span>
                        </div>
                        <br>
                      <div class="row">
                           <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Club_DeportivoL">Club Deportivo:</label>
                          </div>
                          <div class="col-md-4">
                            <select name="Club_Deportivo" id="Club_Deportivo" class="form-control">
                                <option value="">Seleccionar</option>
                                @foreach($clubDeportivo as $clubDeportivos)                                        
                                        <option value="{{ $clubDeportivos['PK_I_ID_CLUB_DEPORTIVO'] }}">{{ $clubDeportivos['V_NOMBRE_CLUB_DEPORTIVO'] }}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>
                      <br>
                      <div class="row">
                            <div class="col-md-2">
                               <label for="inputEmail" class="control-label pull-right" id="Nombre_EntrenadorL">Selección de entrenador:</label>
                            </div>
                            <div class="col-md-4">
                                <select name="Entrenador" id="Entrenador" class="form-control">
                                   <option value="">Seleccionar</option>
                                   @foreach($entrenadores as $entrenador)
                                           <option value="{{ $entrenador['Id_Persona'] }}">{{$entrenador['Primer_Nombre'].' '.$entrenador['Segundo_Nombre'].' '.$entrenador['Primer_Apellido'].' '.$entrenador['Segundo_Apellido']}}</option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" id="AgregarEntrenador" name="AgregarEntrenador" type="button" >+</button>
                            </div>
                    </div>
                    <br>
                    <div class="row" id="PanelEntrenador">                             

                    </div>
                    <br>
                    <div class="row">                          
                           <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_CamisaL">Talla Camisa:</label>
                          </div>
                          <div class="col-md-4">
                                <select name="Talla_Camisa" id="Talla_Camisa" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($talla as $tallas)
                                            <option value="{{ $tallas['PK_I_ID_TALLA'] }}">{{$tallas['V_NOMBRE_TALLA']}}</option>
                                    @endforeach
                                </select>
                          </div>
                          <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_ZapatosL">Talla Zapatos:</label>
                          </div>
                          <div class="col-md-4">
                              <select name="Talla_Zapatos" id="Talla_Zapatos" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($talla as $tallas)
                                            <option value="{{ $tallas['PK_I_ID_TALLA'] }}">{{$tallas['V_NOMBRE_TALLA']}}</option>
                                    @endforeach
                                </select>
                          </div>
                      </div>
                      <br>
                      <div class="row">
                           
                          <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_ChaquetaL">Talla Cahqueta:</label>
                          </div>
                          <div class="col-md-4">
                                <select name="Talla_Chaqueta" id="Talla_Chaqueta" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($talla as $tallas)
                                            <option value="{{ $tallas['PK_I_ID_TALLA'] }}">{{$tallas['V_NOMBRE_TALLA']}}</option>
                                    @endforeach
                                </select>
                          </div>
                          <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_PantalonL">Talla Pantalon:</label>
                          </div>
                          <div class="col-md-4">
                                <select name="Talla_Pantalon" id="Talla_Pantalon" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($talla as $tallas)
                                            <option value="{{ $tallas['PK_I_ID_TALLA'] }}">{{$tallas['V_NOMBRE_TALLA']}}</option>
                                    @endforeach
                                </select>
                          </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-md-12 ">   
                          <div class="form-group">
                             <div class="col-lg-12 ">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                               <button type="button" class="btn btn-primary" name="EnviarDeportiva" id="EnviarDeportiva">Enviar</button>
                             </div>
                          </div>
                      </div>
                  </fieldset>
                </form>
              </div>
          </div>
      </div>
  </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="modal fade bs-example-modal-lg" id="modal_form_apoyo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-center" id="nombreDeportA"></h4>
            <p class="list-group-item-text text-center">
              <small id="CedulaA" ></small>
          </p> 
        </div>
          <div class="modal-body">
              <h4 class="modal-title text-uppercase">Datos Deportivos:</h4>
              <div class="row">                  
                    <div class="col-md-4 text-center"></div>
                    <div class="col-md-4 text-center">
                        <span id="SImagen3">
                            <img id="Imagen3" src="" alt="" class="img-thumbnail img-responsive"><br>         
                        </span>
                    </div>
                </div>
              <br>
              <div tabindex="-1" id="mensaje-incorrecto-tres" class=" text-left alert alert-success alert-danger" role="alert" style="display: none;">
                  <strong>Error </strong> <span id="mensajeIncorrectoTres"></span>
              </div>
              <br>
               <div class="row">
                    <div class="col-md-2">
                        <label for="date-depart" id="fInicioL">Fecha Inicio:</label>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group date" id="fInicioDate">
                            <input id="fInicio" class="form-control datepicker" type="text" value="" 
                            name="fInicio" 
                            default="" 
                            data-date="" data-behavior="fInicio">
                        <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
                        </div>
                    </div>                   
                    <div class="col-md-2">
                        <label for="date-depart" id="fFinL">Fecha Fin:</label>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group date" id="fFinDate">
                            <input id="fFin" class="form-control datepicker" type="text" value="" 
                            name="fFin" 
                            default="" 
                            data-date="" data-behavior="fFin">
                        <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
                        </div>
                    </div>
                   <div class="col-md-2">
                       <button type="button" class="btn btn-primary" name="BuscarReporte" id="BuscarReporte">Buscar Reporte</button>
                   </div>                   
              </div>     
              <div id="reporteIndividual" class="row"></div>
              <div id="AgregarEstimulos" class="row">
                  <div class="col-md-2">
                      <label for="date-depart" id="Tipo_EstimuloL">Seleccione un tipo de estímulo:</label>
                  </div>
                  <div class="col-md-4">
                      <select name="Tipo_Estimulo" id="Tipo_Estimulo" class="form-control">
                            <option value="">Seleccionar</option>
                            <!--@foreach($talla as $tallas)
                                    <option value="{{ $tallas['PK_I_ID_TALLA'] }}">{{$tallas['V_NOMBRE_TALLA']}}</option>
                            @endforeach-->
                        </select>
                  </div>
              </div>
            </div>            
          </div>
      </div>
    </div>
</div> 
@stop
