@extends('master')
@section('script')
  @parent
    <script src="{{ asset('public/Js/Deportista/Deportista2.js') }}"></script> 
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
                                <select name="Pais" id="Pais" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($pais as $paises)
                                            <option value="{{ $paises['Id_Pais'] }}">{{ $paises['Nombre_Pais'] }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Departamento:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Departamento" id="Departamento" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($departamento as $departamentos)
                                            <option value="{{ $departamentos['Id_Departamento'] }}">{{ $departamentos['Nombre_Departamento'] }}</option>
                                    @endforeach
                                </select>
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
                                    <select name="Eps" id="Eps" class="form-control">
                                            <option value="">Seleccionar</option>
                                            @foreach($eps as $epss)
                                                    <option value="{{ $epss['Id_Eps'] }}">{{ $epss['Nombre_Eps'] }}</option>
                                            @endforeach
                                    </select>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Dirección Residencia:</label>
                              </div>
                              <div class="col-md-4">
                                <input class="form-control" placeholder="Dirección Residencia" type="text" name="Direccion_Residencia">
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Barrio:</label>
                              </div>
                              <div class="col-md-4">
                                <input class="form-control" placeholder="Barrio" type="text" name="Barrio">
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Localidad:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Localidad" id="Localidad" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($localidad as $localidades)
                                            <option value="{{ $localidades['Id_Localidad'] }}">{{ $localidades['Nombre_Localidad'] }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Telefono fijo:</label>
                              </div>
                              <div class="col-md-4">
                                <input class="form-control" placeholder="Telefono fijo" type="text" name="Telefono_Fijo">
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Telefono Celular:</label>
                              </div>
                              <div class="col-md-4">
                                <input class="form-control" placeholder="Telefono Celular" type="text" name="Telefono_Celular">
                              </div>
                            </div>
                            <br>
                             <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Correo Electronico:</label>
                              </div>
                              <div class="col-md-4">
                                <input class="form-control" placeholder="Correo Electronico" type="text" name="Correo_Electronico">
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Grupo Etnico:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Grupo_Etnico" id="Grupo_Etnico" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($etnia as $etnias)
                                            <option value="{{ $etnias['Id_Etnia'] }}">{{ $etnias['Nombre_Etnia'] }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Estado Civil:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Estado_Civil" id="Estado_Civil" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($estadoCivil as $estadoCiviles)
                                            <option value="{{ $estadoCiviles['PK_I_ID_ESTADO_CIVIL'] }}">{{ $estadoCiviles['V_NOMBRE_ESTADO_CIVIL'] }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Hijos:</label>
                              </div>
                              <div class="col-md-4">
                                <input class="form-control" placeholder="Hijos" type="text" name="Hijos">
                              </div>
                            </div>
                            <br>
                           <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Cuenta:</label>
                              </div>
                              <div class="col-md-4">
                                <input class="form-control" placeholder="Cuenta" type="text" name="Cuenta">
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Agrupación:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Agrupacion" id="Agrupacion" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($agrupacion as $agrupaciones)
                                            <option value="{{ $agrupaciones['PK_I_ID_AGRUPACION'] }}">{{ $agrupaciones['V_NOMBRE_AGRUPACION'] }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Deporte:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Deporte" id="Deporte" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($deporte as $deportes)
                                            <option value="{{ $deportes['PK_I_ID_DEPORTE'] }}">{{ $deportes['V_NOMBRE_DEPORTE'] }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Modalidad:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Modalidad" id="Modalidad" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($modalidad as $modalidades)
                                            <option value="{{ $modalidades['PK_I_ID_MODALIDAD'] }}">{{ $modalidades['V_NOMBRE_MODALIDAD'] }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-2">
                                <label for="inputEmail" class="control-label pull-right">Etapa:</label>
                              </div>
                              <div class="col-md-4">
                                <select name="Etapa" id="Etapa" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($etapa as $etapas)
                                            <option value="{{ $etapas['PK_I_ID_ETAPA'] }}">{{ $etapas['V_NOMBRE_ETAPA'] }}</option>
                                    @endforeach
                                </select>
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