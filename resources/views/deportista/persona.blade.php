<div class="row">
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right">Fecha Nacimiento:</label>
    </div>
    <div class="col-md-4">
        <input class="form-control" placeholder="Fecha Nacimiento" type="text" name="Fecha_Nacimiento" readonly="readonly">
    </div>
    
    <div class="col-md-2">
        <label for="inputEmail" class="control-label pull-right">Género:</label>
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
        <label for="inputEmail" class="control-label pull-right">Pais Nacimiento:</label>
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
        <label for="inputEmail" class="control-label pull-right">Ciudad:</label>
      </div>
      <div class="col-md-4">
        <input class="form-control" placeholder="Ciudad" type="text" name="Nombre_Ciudad" readonly="readonly">
      </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
      <label for="inputEmail" class="control-label pull-right">Grupo Etnico:</label>
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