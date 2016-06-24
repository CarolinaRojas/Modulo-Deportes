<input type="hidden" name="Id_Persona" id="Id_Persona">
<legend>
    <h3 clase="text-uppercase " id="nombreDeport"></h3>
    <small class="control-label text-left" id="Cedula"></small>
</legend>
<h4 class="modal-title text-uppercase">Datos personales:</h4>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <label for="inputEmail" class="control-label">Foto</label><br>
        <span id="SImagen">
            <img id="Imagen" src="" alt="" class="img-thumbnail img-responsive" style="width:100%; height:100%; max-width:200px; min-height:200px;max-height:250px;"><br>         
        </span>
    </div>
    <br>
</div>
<br>
<div class="row">    
    <form enctype="multipart/form-data" id="Formulario_Imagen" name="Formulario_Imagen" role="form" method="POST" action="">        
        <div class="col-md-2">
            <label for="inputEmail" class="control-label pull-right" id="FotografiaL">Fotografia de deportista:</label>
        </div>
        <div class="col-md-4">
            <input type="file" name="Fotografia" class="form-control" id="Fotografia">
        </div>
      </form>  
</div>
<br>
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