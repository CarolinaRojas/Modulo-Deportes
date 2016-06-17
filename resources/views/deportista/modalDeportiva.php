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
                  <h3 clase="text-uppercase " id="nombreDeport"></h3>
                  <small class="control-label text-left" id="Cedula"></small>
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
                      <div id="mensaje-incorrecto" class=" text-left alert alert-success alert-danger" role="alert" style="display: none;">
                          <strong>Error </strong> <span id="mensajeIncorrecto"></span>
                      </div>
                      <br>                            
                      <div class="row">
                           <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="ClubL">Club Deportivo:</label>
                          </div>
                          <div class="col-md-4">
                              CLUB
                          </div>
                      </div>
                      <br>
                      <div class="row">
                           <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Nombre_EntrenadorL">Nombre del entrenador:</label>
                          </div>
                          <div class="col-md-4">
                              ENTRENADOR
                          </div>
                          <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Contacto_EntrenadorL">Contacto del entrenador:</label>
                          </div>
                          <div class="col-md-4">
                              CONTACTO ENTRENADOR
                          </div>
                      </div>
                      <br>
                      <div class="row">
                           <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_SudaderaL">Talla Sudadera:</label>
                          </div>
                          <div class="col-md-4">
                              Sudadera
                          </div>
                          <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_ZapatosL">Talla Zapatos:</label>
                          </div>
                          <div class="col-md-4">
                              Zapatos
                          </div>
                      </div>
                      <br>
                      <div class="row">
                           <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_CamisaL">Talla Camisa:</label>
                          </div>
                          <div class="col-md-4">
                              Camisa
                          </div>
                          <div class="col-md-2">
                              <label for="inputEmail" class="control-label pull-right" id="Talla_PantalonL">Talla Pantalon:</label>
                          </div>
                          <div class="col-md-4">
                              Pantalon
                          </div>
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
                </form>
              </div>
          </div>
      </div>
  </div>