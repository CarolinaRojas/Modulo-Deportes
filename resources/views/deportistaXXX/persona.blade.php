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
            <label for="inputEmail" class="control-label" id="FotografiaL">Fotografia de deportista:</label>
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