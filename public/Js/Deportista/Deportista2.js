$(function(e){ 
    var $personas_actuales = $('#personas').html();
    var URL = $('#main_persona').data('url');
    
    
    var buscar = function(e){
      var key = $('input[name="buscador"]').val();
      if (key.length > 2){
        $('#buscar span').removeClass('glyphicon-search').addClass('glyphicon-remove');
        $('#buscar').data('role', 'reset');

        $.get(
          'personaBuscarDeportista/'+key,
          {}, 
          function(data){
            if(data.length > 0){
              var html = '';
              $.each(data, function(i, e){
                html += '<li class="list-group-item" style="border:0">'+
                            '<br>'+                                                     
                                  '<div class="row">'+
                                      '<div class="col-xs-12">'+
                                          '<div class="row">'+
                                              '<div class="col-xs-6">'+
                                                        '<h4 class="list-group-item-heading">'+
                                                            ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                                        '<p class="list-group-item-text">'+
                                                        '<small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small>'+
                                              '</div>'+

                                              '<div class="col-xs-6 ">'+
                                                        '<div class="pull-right btn-group" role="group" aria-label="Informacion">'+
                                                          '<button type="button" data-role="InformacionBasica" data-rel="'+e['Id_Persona']+'" class="btn btn-primary">Información Basica</button>'+
                                                          '<button type="button" data-role="InformacionDeportiva" data-rel="'+e['Id_Persona']+'" class="btn btn-default">Información Deportiva</button>'+
                                                          '<button type="button" class="btn btn-primary">Apoyos y servicios</button>'+
                                                        '</div>'+
                                              '</div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'+
                            '</li>';
              });
              $('#personas').html(html);
              $('#paginador').fadeOut();
            }
          },
          'json'
        )
      } else if(key.length == 0){
        reset(e);
      }
    };

    $('#buscar').on('click', function(e)
    {
      var role = $(this).data('role');
      switch(role)
      {
        case 'buscar':
          $(this).data('role', 'reset');
          buscar(e);
        break;

        case 'reset':
          $(this).data('role', 'buscar');
          reset(e);
        break;
      }
    });


    var reset = function(e){
      $('input[name="buscador"]').val('');
      $('#buscar span').removeClass('glyphicon-remove').addClass('glyphicon-search');
      $('#personas').html($personas_actuales);
      $('#paginador').fadeIn();
    };


    var popular_modal_persona = function(persona){
      var nombreDeportista="";
      var cedulaDeportista="";

      nombreDeportista = $.trim(persona['Primer_Apellido'])+' '+$.trim(persona['Segundo_Apellido'])+' '+$.trim(persona['Primer_Nombre'])+' '+$.trim(persona['Segundo_Nombre']);
      $('p[name="Cedula"]').val($.trim(persona['Cedula']));
      cedulaDeportista = $.trim(persona['Cedula']);


      document.getElementById("titulo").innerHTML= "INFORMACIÓN BASICA";
      document.getElementById("nombreDeport").innerHTML= nombreDeportista.toUpperCase();
      document.getElementById("Cedula").innerHTML=cedulaDeportista;

      $("#Pais").val(persona['Id_Pais']).change();
      $('input[name="Fecha_Nacimiento"]').val($.trim(persona['Fecha_Nacimiento']));
      $('input[name="Nombre_Ciudad"]').val($.trim(persona['Nombre_Ciudad']));
      $("#Grupo_Etnico").val(persona['Id_Etnia']).change();
      
      
      console.log(persona.deportista);
      if(persona.deportista){
          $('input[name="Direccion_Residencia"]').val($.trim(persona.deportista['V_DIRECCION_RESIDENCIA']));          
          $('input[name="Telefono_Fijo"]').val($.trim(persona.deportista['V_TELEFONO_FIJO']));
          $('input[name="Telefono_Celular"]').val($.trim(persona.deportista['V_TELEFONO_CELULAR']));
          $('input[name="Correo_Electronico"]').val($.trim(persona.deportista['V_CORREO_ELECTRONICO']));
          $('input[name="Grupo_Etnico"]').val($.trim(persona.deportista['']));
          $('input[name="Estado_Civil"]').val($.trim(persona.deportista['']));
          $('input[name="Hijos"]').val($.trim(persona.deportista['V_CANTIDAD_HIJOS']));
          $('input[name="Cuenta"]').val($.trim(persona.deportista['V_NUMERO_CUENTA']));
          $("#Eps").val(persona.deportista['FK_I_ID_EPS']).change();
          $("#Estado_Civil").val(persona.deportista['FK_I_ID_ESTADO_CIVIL']).change();
          $("#Localidad").val(persona.deportista['FK_I_ID_LOCALIDAD']).change();
          $("#Agrupacion").val(persona.deportista['FK_I_ID_AGRUPACION']).change();
          $("#Deporte").val(persona.deportista['FK_I_ID_DEPORTE']).change();
          $("#Modalidad").val(persona.deportista['FK_I_ID_MODALIDAD']).change();
          $("#Etapa").val(persona.deportista['FK_I_ID_ETAPA']).change();
          $("#Departamento").val(persona.deportista['FK_I_ID_DEPARTAMENTO']).change();
          $("#Barrio").val(persona.deportista['FK_I_ID_BARRIO']).change();
      }
      
      $('#modal_form_persona').modal('show');
    };


    $('#personas').delegate('button[data-role="InformacionBasica"]', 'click', function(e){
        var id = $(this).data('rel');
        $.get("deportista/" + id + "", function (response) {
            popular_modal_persona(response);
        });
    });

});