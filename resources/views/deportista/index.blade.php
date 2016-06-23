@extends('master')
@section('script')
  @parent
    <script src="{{ asset('public/Js/Deportista/Deportistas.js') }}"></script> 
    <script src="{{ asset('public/Js/Deportista/Deportiva.js') }}"></script> 
    <link href="{{ asset('public/Css/dropzone.css') }}" rel="stylesheet">
    <!--<script src="{{ asset('public/Js/dropzone.js') }}"></script>
    <link href="{{ asset('public/Css/dropzone.css') }}" rel="stylesheet">-->
    
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
            <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h2 class="modal-title"><p class="text-center" id="titulo"></p></h2>
                </div>
                <div class="modal-body">
                         
<!--<form enctype="multipart/form-data" id="Formulario_Imagen" name="Formulario_Imagen" role="form" method="POST" action="">
    <div class="form-group">
        <label for="catagry_name">Name</label>
        <input type="text" name="_token" value="{{ csrf_token()}}">
        <input type="text" class="form-control" id="catagry_name" placeholder="Name">
        <p class="invalid">Enter Catagory Name.</p>
    </div>
    <div class="form-group">
        <label for="catagry_name">Logo</label>
        <input type="file" name="Fotografia" class="form-control" id="Fotografia">
        <p class="invalid">Enter Catagory Logo.</p>
    </div>
    <div class="modelFootr">
        <button type="submit" class="addbtn" id="addbtn" name="addbtn" >Add</button>
        <button type="button" class="cnclbtn">Reset</button>
    </div>
</form>-->
                 <!--   <form class="form-horizontal" id="form_deportista" action="">-->
                            <div>                                                                
                                @include('deportista.persona')
                            </div>
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
                                   <div class="col-lg-12 ">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                     <button type="button" class="btn btn-primary" name="Enviar" id="Enviar">Enviar</button>
                                   </div>
                                </div>
                            </div>
                        </fieldset>
                      <!--</form>-->
                    </div>
                </div>
            </div>
        </div>        
        
        
        <div class="modal fade bs-example-modal-lg" id="modal_form_deportiva" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title"><p class="text-center" id="tituloDeportiva">tituloDeportiva</p></h2>
          </div>
          <div class="modal-body">
              <input type="hidden" name="Id_Persona" id="Id_Persona">
              <legend>
                  <h3 clase="text-uppercase " id="nombreDeportD"></h3>
                  <small class="control-label text-left" id="CedulaD"></small>
              </legend>
              <h4 class="modal-title text-uppercase">Datos Deportivos:</h4>
              <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4 text-center">
                      <label for="inputEmail" class="control-label">Foto</label><br>
                      <img src="" alt="" class="img-thumbnail img-responsive" style="width:100%; height:100%; max-width:200px; min-height:200px;max-height:250px;"><br>

                  </div>
                  <br>
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
        
   
@stop