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
      $("#Genero").val(persona['Id_Genero']).change();
      $("#Grupo_Etnico").val(persona['Id_Etnia']).change();
      $('input[name="Id_Persona"]').val($.trim(persona['Id_Persona']));
            
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
          $("#Banco").val(persona.deportista['FK_I_ID_BANCO']).change();
          $('input[name="Id_Deportista"]').val($.trim(persona.deportista['PK_I_ID_DEPORTISTA']));
          $("#Estrato").val(persona.deportista['FK_I_ID_ESTRATO']).change();
          $("#Grupo_Sanguineo").val(persona.deportista['FK_I_ID_GRUPO_SANGUINEO']).change();
          $("#Tipo_Deportista").val(persona.deportista['FK_I_ID_TIPO_DEPORTISTA']).change();
      }
      
      $('#modal_form_persona').modal('show');
    };

    $('#buscar').on('click', function(e){
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
    
    $('#personas').delegate('button[data-role="InformacionBasica"]', 'click', function(e){
        var id = $(this).data('rel');
        $.get("deportista/" + id + "", function (response) {
            popular_modal_persona(response);
        });
    });
   
});

$(document).ready(function () {    
    RegistroDeportista();
});

function RegistroDeportista(){
    $('#Enviar').on('click', function () {
        var Id_Persona = $("#Id_Persona").val();
        var Id_Deportista = $("#Id_Deportista").val();
        var Eps = $('#Eps').val();
        var Departamento = $('#Departamento').val();
        var Localidad = $('#Localidad').val();
        var Barrio = $('#Barrio').val();
        var Direccion_Residencia = $('#Direccion_Residencia').val();
        var Telefono_Fijo = $('#Telefono_Fijo').val();
        var Telefono_Celular = $('#Telefono_Celular').val();
        var Correo_Electronico = $('#Correo_Electronico').val();
        var Estado_Civil = $('#Estado_Civil').val();
        var Hijos = $('#Hijos').val();
        var Banco = $('#Banco').val();
        var Cuenta = $('#Cuenta').val();
        var Deporte = $('#Deporte').val();
        var Modalidad = $('#Modalidad').val();
        var Agrupacion = $('#Agrupacion').val();
        var Etapa = $('#Etapa').val();
        var Estrato = $('#Estrato').val();
        var Grupo_Sanguineo = $('#Grupo_Sanguineo').val();
        var Tipo_Deportista = $('#Tipo_Deportista').val();
        
        var datos = {
                    Eps: Eps,
                    Departamento: Departamento,
                    Localidad: Localidad,
                    Barrio: Barrio,
                    Direccion_Residencia: Direccion_Residencia,
                    Telefono_Fijo: Telefono_Fijo,
                    Telefono_Celular: Telefono_Celular,
                    Correo_Electronico: Correo_Electronico,
                    Estado_Civil: Estado_Civil,
                    Hijos: Hijos,
                    Banco: Banco,
                    Cuenta: Cuenta,
                    Deporte: Deporte,
                    Modalidad: Modalidad,
                    Agrupacion: Agrupacion,
                    Etapa: Etapa,
                    Id_Persona: Id_Persona,
                    Id_Deportista: Id_Deportista,
                    Estrato: Estrato,
                    Grupo_Sanguineo: Grupo_Sanguineo,
                    Tipo_Deportista: Tipo_Deportista
                }
                
        $("#mensajeIncorrecto").html(':');
        
        var token = $("#token").val();
                
        if(Id_Deportista){
            //Editar
            Proceso ('PUT', 'AddDatos/'+Id_Deportista, datos, token);

        }else{
            //Agregar 
            Proceso ('POST', 'AddDatos', datos, token);
        }        
    });
}

function Validacion(campo, mensaje){
    $("#"+campo).css({ 'border-color': '#B94A48' });    
    $("#"+campo+"L").css({ 'color': '#B94A48' });    
    
    var texto = $("#mensajeIncorrecto").html();
    
    $("#mensajeIncorrecto").html(texto + '<br>' + mensaje);
    $("#mensaje-incorrecto").fadeIn();
}

function Normal(campo){
    $("#"+campo).css({ 'border-color': '#CCCCCC' });    
    $("#"+campo+"L").css({ 'color': '#555555' });    
}

function Proceso (tipo, url, datos, token){
     $.ajax({
        type: tipo,
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        dataType: 'json',
        data: datos,
        success: function (xhr) {
            alert(xhr.Mensaje);
            $('#modal_form_persona').modal('hide');
        },
        error: function (xhr) {                     
            if(xhr.responseJSON.Grupo_Sanguineo){ Validacion('Grupo_Sanguineo', xhr.responseJSON.Grupo_Sanguineo);}else{Normal('Grupo_Sanguineo');}
            if(xhr.responseJSON.Eps){ Validacion('Eps', xhr.responseJSON.Eps);}else{Normal('Eps');}
            if(xhr.responseJSON.Estrato){ Validacion('Estrato', xhr.responseJSON.Estrato);}else{Normal('Estrato');}
            if(xhr.responseJSON.Departamento){ Validacion('Departamento', xhr.responseJSON.Departamento);}else{Normal('Departamento');}
            if(xhr.responseJSON.Localidad){ Validacion('Localidad', xhr.responseJSON.Localidad);}else{Normal('Localidad');}
            if(xhr.responseJSON.Barrio){ Validacion('Barrio', xhr.responseJSON.Barrio);}else{Normal('Barrio');}
            if(xhr.responseJSON.Direccion_Residencia){ Validacion('Direccion_Residencia', xhr.responseJSON.Direccion_Residencia);}else{Normal('Direccion_Residencia');}
            if(xhr.responseJSON.Telefono_Fijo){ Validacion('Telefono_Fijo', xhr.responseJSON.Telefono_Fijo);}else{Normal('Telefono_Fijo');}
            if(xhr.responseJSON.Telefono_Celular){ Validacion('Telefono_Celular', xhr.responseJSON.Telefono_Celular);}else{Normal('Telefono_Celular');}
            if(xhr.responseJSON.Correo_Electronico){ Validacion('Correo_Electronico', xhr.responseJSON.Correo_Electronico);}else{Normal('Correo_Electronico');}
            if(xhr.responseJSON.Tipo_Deportista){ Validacion('Tipo_Deportista', xhr.responseJSON.Tipo_Deportista);}else{Normal('Tipo_Deportista');}
            if(xhr.responseJSON.Estado_Civil){ Validacion('Estado_Civil', xhr.responseJSON.Estado_Civil);}else{Normal('Estado_Civil');}
            if(xhr.responseJSON.Hijos){ Validacion('Hijos', xhr.responseJSON.Hijos);}else{Normal('Hijos');}
            if(xhr.responseJSON.Banco){ Validacion('Banco', xhr.responseJSON.Banco);}else{Normal('Banco');}
            if(xhr.responseJSON.Cuenta){ Validacion('Cuenta', xhr.responseJSON.Cuenta);}else{Normal('Cuenta');}
            if(xhr.responseJSON.Deporte){ Validacion('Deporte', xhr.responseJSON.Deporte);}else{Normal('Deporte');}
            if(xhr.responseJSON.Modalidad){ Validacion('Modalidad', xhr.responseJSON.Modalidad);}else{Normal('Modalidad');}
            if(xhr.responseJSON.Agrupacion){ Validacion('Agrupacion', xhr.responseJSON.Agrupacion);}else{Normal('Agrupacion');}
            if(xhr.responseJSON.Etapa){ Validacion('Etapa', xhr.responseJSON.Etapa);}else{Normal('Etapa');}


            var scrollPos;                    
            scrollPos = $("#mensajeIncorrecto").offset().top;
            $(window).scrollTop(scrollPos);

            return false;
        }
    });
    
}