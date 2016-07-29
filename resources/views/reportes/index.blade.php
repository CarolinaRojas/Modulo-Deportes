@extends('master')
@section('script')
  @parent
    <script src="{{ asset('public/Js/Reportes/reportes.js') }}"></script> 
        
    {{Html::script('public/Js/jquery.dataTables.js')}}
    {{Html::script('public/Js/dataTables.responsive.min.js')}}        
    {{Html::style('public/Css/jquery.dataTables.min.css')}}
    {{Html::style('public/Css/bootstrap.css')}}
    {{Html::script('public/Js/tablesIdioma.js')}}   
    {{Html::style('public/Css/dataTables.bootstrap.min.css')}}
    {{Html::script('public/Js/dataTables.bootstrap.min.js')}}
    
    <script src="{{ asset('public/Js/bootstrap-datepicker.js') }}"></script>
    {{Html::style('public/Css/bootstrap-datepicker3.css')}}
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places" type="text/javascript"></script>
    
@stop  
@section('content') 
<center><h3>GESTIÓN DE REPORTES</h3></center>
  <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
    <div id="main_persona" class="row" data-url="{{ url(config('usuarios.prefijo_ruta')) }}">  
        <div class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Reportes Módulo de Deportes</h3>
                </div>
                <div class="panel-body">
                    <div tabindex="-1" id="mensaje-incorrecto-reporte" class=" text-left alert alert-success alert-danger" role="alert" style="display: none;">
                        <strong>Error </strong> <span id="mensajeIncorrectoReporte"></span>
                    </div>                    
                    <div class="row page-header">
                        <div class="col-sm-12 tituloCollapse" data-toggle="collapse" data-target="#ReporteHistorial">
                            <button type="button" class="btn btn-default">Historial de estímulos de deportistas</button>
                        </div>                        
                        <br>
                        <div id="ReporteHistorial" class="collapse">   
                            <div class="row container-fluid">      
                                <br>
                                <div class="col-md-4"><h4>Fechas de intervalo del historial:</h4></div>
                            </div>
                            <div class="row container-fluid">      
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
                                    <button onclick="DescargaReporteEstimulos();" type="button" class="btn btn-primary" name="BuscarReporte" id="BuscarReporte">Descargar Reporte</button>
                                </div>         
                            </div>
                        </div>
                    </div>
                    <!--REPORTES GENERALES-->                    
                    <div class="row page-header">
                        <div class="col-sm-12 tituloCollapse" data-toggle="collapse" data-target="#ReporteGeneral">
                            <button type="button" class="btn btn-default" name="BotonReporteGeneral" id="BotonReporteGeneral">Reporte general de deportistas</button>
                        </div>
                        <br>
                        <div id="ReporteGeneral" class="collapse">   
                            <div class="row container-fluid">      
                                <br>
                                <div class="col-md-4"><h4>Seleccione los parámetros de búsqueda:</h4></div>
                            </div>
                            <div class="row container-fluid">      
                                <div class="col-md-2">
                                    <label for="date-depart" id="GeneroL">Genero:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="Genero" id="Genero" class="form-control">
                                          <option value="">Seleccionar</option>
                                      </select>
                                </div> 
                                <div class="col-md-2">
                                    <label for="date-depart" id="EdadL">Edad:</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder="Edad" type="text" name="Edad" id="Edad">
                                </div>                                 
                            </div>
                            <br>
                            <div class="row container-fluid">      
                                <div class="col-md-2">
                                    <label for="date-depart" id="LocalidadL">Localidad:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="Localidad" id="Localidad" class="form-control">
                                          <option value="">Seleccionar</option>
                                      </select>
                                </div>                     
                            </div>
                            <br>
                            <div class="row container-fluid">      
                                <div class="col-md-2">
                                    <label for="date-depart" id="AgrupacionL">Agrupación:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="Agrupacion" id="Agrupacion" class="form-control">
                                          <option value="">Seleccionar</option>
                                      </select>
                                </div> 
                                <div class="col-md-2">
                                    <label for="date-depart" id="DeporteL">Deporte:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="Deporte" id="Deporte" class="form-control">
                                          <option value="">Seleccionar</option>
                                          <option value="1">uno</option>
                                      </select>
                                </div>                                 
                            </div>
                            <br>
                            <div class="row container-fluid">      
                                <div class="col-md-2">
                                    <label for="date-depart" id="ModalidadL">Modalidad:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="Modalidad" id="Modalidad" class="form-control">
                                          <option value="">Seleccionar</option>                                          
                                      </select>
                                </div>                                 
                            </div>   
                            <br>
                            <div class="row container-fluid">      
                                <div class="col-md-2">
                                    <label for="date-depart" id="fInicioGeneralL">Fecha Inicio:</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group date" id="fInicioDateGeneral">
                                        <input id="fInicioGeneral" class="form-control datepicker" type="text" value="" 
                                        name="fInicioGeneral" 
                                        default="" 
                                        data-date="" data-behavior="fInicioGeneral">
                                    <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
                                    </div>
                                </div>                  
                                <div class="col-md-2">
                                    <label for="date-depart" id="fFinGeneralL">Fecha Fin:</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group date" id="fFinDateGeneral">
                                        <input id="fFinGeneral" class="form-control datepicker" type="text" value="" 
                                        name="fFinGeneral" 
                                        default="" 
                                        data-date="" data-behavior="fFinGeneral">
                                    <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
                                    </div>
                                </div>        
                            </div>
                            <br>
                            <div class="col-md-2">
                                <button onclick="ValidacionReporteGeneral();" type="button" class="btn btn-primary" name="ReporteGeneral" id="ReporteGeneral">Descargar reporte general</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@stop