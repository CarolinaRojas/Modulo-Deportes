<input type="hidden" name="Id_Deportista" id="Id_Deportista">
<div class="row">    
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Grupo_SanguineoL">Grupo Sanguineo:</label>
    </div>
    <div class="col-md-4">
        <select name="Grupo_Sanguineo" id="Grupo_Sanguineo" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($grupoSanguineo as $grupoSanguineos)
                    <option value="{{ $grupoSanguineos['Id_GrupoSanguineo'] }}">{{ $grupoSanguineos['Nombre_GrupoSanguineo'] }}</option>
            @endforeach
        </select>
  </div>
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="EpsL">EPS:</label>                                
    </div>
    <div class="col-md-4">
        <select name="Eps" id="Eps" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($eps as $epss)
                    <option value="{{ $epss['Id_Eps'] }}">{{ $epss['Nombre_Eps'] }}</option>
            @endforeach
        </select>
  </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
      <label for="inputEmail" class="control-label pull-right" id="Estado_CivilL">Estado Civil:</label>
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
        <label for="inputEmail" class="control-label pull-right" id="EstratoL">Estrato:</label>                                
    </div>
    <div class="col-md-4">
        <select name="Estrato" id="Estrato" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($estrato as $estratos)
                    <option value="{{ $estratos['PK_I_ID_ESTRATO'] }}">{{ $estratos['V_NOMBRE_ESTRATO'] }}</option>
            @endforeach
        </select>
  </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Situacion_MilitarL">Situación Militar:</label>
    </div>
    <div class="col-md-4">
        <select name="Situacion_Militar" id="Situacion_Militar" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($situacionMilitar as $situacionMilitares)
                    <option value="{{ $situacionMilitares['PK_I_ID_SITUACION_MILITAR'] }}">{{ $situacionMilitares['V_NOMBRE_SITUACION_MILITAR'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="HijosL">N° de Hijos:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Hijos" type="text" name="Hijos" id="Hijos">
    </div>
</div>
<br>
<div class="row">   
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="LocalidadL">Localidad:</label>
    </div>
    <div class="col-md-4">
        <!--<input class="form-control" placeholder="Localidad" type="text" name="Localidad" id="Localidad">      -->
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
        <label for="inputEmail" class="control-label pull-right" id="BarrioL">Barrio:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Barrio" type="text" name="Barrio" id="Barrio">
    </div>
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Direccion_ResidenciaL">Dirección Residencia:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Dirección Residencia" type="text" name="Direccion_Residencia" id="Direccion_Residencia">
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Telefono_FijoL">Telefono fijo:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Telefono fijo" type="text" name="Telefono_Fijo" id="Telefono_Fijo">
    </div>
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Telefono_CelularL">Telefono Celular:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Telefono Celular" type="text" name="Telefono_Celular" id="Telefono_Celular">
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Correo_ElectronicoL">Correo Electronico:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Correo Electronico" type="text" name="Correo_Electronico" id="Correo_Electronico">
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="BancoL">Banco:</label>
  </div>
  <div class="col-md-4">
    <select name="Banco" id="Banco" class="form-control">
        <option value="">Seleccionar</option>
        @foreach($banco as $bancos)
            <option value="{{ $bancos['PK_I_ID_BANCO'] }}">{{ $bancos['V_NOMBRE_BANCO'] }}</option>
        @endforeach
    </select>
  </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Tipo_CuentaL">Tipo de cuenta:</label>
  </div>
  <div class="col-md-4">
    <select name="Tipo_Cuenta" id="Tipo_Cuenta" class="form-control">
        <option value="">Seleccionar</option>
        @foreach($tipocuenta as $tipocuentas)
            <option value="{{ $tipocuentas['PK_I_ID_TIPO_CUENTA'] }}">{{ $tipocuentas['V_NOMBRE_TIPO_CUENTA'] }}</option>
        @endforeach
    </select>
  </div>
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="CuentaL">N° de Cuenta:</label>
  </div>
  <div class="col-md-4">
      <input class="form-control" placeholder="Cuenta" type="text" name="Cuenta" id="Cuenta">
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-2">
      <label for="inputEmail" class="control-label pull-right" id="Tipo_DeportistaL">Tipo de  Deportista:</label>
  </div>
  <div class="col-md-4">
    <select name="Tipo_Deportista" id="Tipo_Deportista" class="form-control">
        <option value="">Seleccionar</option>
        @foreach($tipoDeportista as $tipoDeportistas)
                <option value="{{ $tipoDeportistas['PK_I_ID_TIPO_DEPORTISTA'] }}">{{ $tipoDeportistas['V_NOMBRE_TIPO_DEPORTISTA'] }}</option>
        @endforeach
    </select>
  </div>    
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="EtapaNacionalL">Etapa Nacional:</label>
    </div>
    <div class="col-md-4">
        <select name="EtapaNacional" id="EtapaNacional" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($etapaNacional as $etapaNacionales)
                <option value="{{ $etapaNacionales['PK_I_ID_ETAPA'] }}">{{ $etapaNacionales['V_NOMBRE_ETAPA'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="EtapaInternacionalL">Etapa Internacional:</label>
    </div>
    <div class="col-md-4">
        <select name="EtapaInternacional" id="EtapaInternacional" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($etapaInternacional as $etapaInternacionales)
                <option value="{{ $etapaInternacionales['PK_I_ID_ETAPA'] }}">{{ $etapaInternacionales['V_NOMBRE_ETAPA'] }}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="AgrupacionL">Agrupación:</label>
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
        <label for="inputEmail" class="control-label pull-right"  id="DeporteL">Deporte:</label>
    </div>
    <div class="col-md-4">
        <select name="Deporte" id="Deporte" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($deporte as $deportes)
                <option value="{{ $deportes['PK_I_ID_DEPORTE'] }}">{{ $deportes['V_NOMBRE_DEPORTE'] }}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
<div class="row">    
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="ModalidadL">Modalidad:</label>
    </div>
    <div class="col-md-4">
        <select name="Modalidad" id="Modalidad" class="form-control">
            <option value="">Seleccionar</option>
            @foreach($modalidad as $modalidades)
                <option value="{{ $modalidades['PK_I_ID_MODALIDAD'] }}">{{ $modalidades['V_NOMBRE_MODALIDAD'] }}</option>
            @endforeach
        </select>
    </div>    
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="SMMLVL">SMMLV Base:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Salario Mínimo" type="text" name="SMMLV" id="SMMLV" value="689454">
    </div>    
</div>
<br>
<div class="row">    
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Fecha_IngresoL">Fecha Ingreso:</label>
    </div>
    <div class="col-md-4">
        <div class="input-group date form-control" id="Fecha_Ingreso_Date" style="border: none;">
            <input id="Fecha_Ingreso" class="form-control datepicker" type="text" value="" name="Fecha_IngresoL" default="" data-date="" data-behavior="Fecha_Ingreso">
        <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
        </div>
    </div>    
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right" id="Fecha_RetiroL">Fecha Retiro</label>
    </div>
    <div class="col-md-4">
        <div class="input-group date form-control" id="Fecha_Retiro_Date" style="border: none;">
            <input id="Fecha_Retiro" class="form-control datepicker" type="text" value="" name="Fecha_RetiroL" default="" data-date="" data-behavior="Fecha_Retiro">
        <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
        </div>
    </div>    
</div>