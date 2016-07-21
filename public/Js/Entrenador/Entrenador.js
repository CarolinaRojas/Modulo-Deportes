var etapas = [];
var modalidades;

$(function(e){ 
    
    getEtapas();
    getModalidades($('#Deporte').val());
    var $personas_actuales = $('#personas').html();    
    var URL = $('#main_persona').data('url');    
    
    var reset = function(e){        
      
        $('#buscar span').removeClass('glyphicon-remove').addClass('glyphicon-search');
        $('#personas').html($personas_actuales);
        $('#paginador').fadeIn();
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
    
    
    $('#personas').delegate('button[data-role="InformacionEntrenador"]', 'click', function(e){ var id = $(this).data('rel'); InfoBasica(id); }); 
    
    $('#Enviar').on('click', function () { RegistroEntrenador(); });
    
    $('#Agrupacion').on('change', function(e){ showDeportes($('#Agrupacion').val()); });
    
    $('#Deporte').on('change', function(e){ showModalidades($('#Deporte').val()); });
    
});

function buscar(e){
    var key = $('input[name="buscador"]').val();
    if (key.length > 2){
        $('#buscar span').removeClass('glyphicon-search').addClass('glyphicon-remove');
        $('#buscar').data('role', 'reset');

        $.get(
            'personaBuscarDeportista/'+key,{}, 
          function(data){              
            if(data.length > 0){
              var html = '';
              $.each(data, function(i, e){                                          
                     $.get("deportista/" + e['Id_Persona'] + "", function (response) {
                         
                        if(response.deportista){
                            html += '<li class="list-group-item" style="border:0">'+
                                      '<div class="row">'+
                                          '<span class="label label-warning glyphicon-class">Esta persona ya se encuentra registrada como deportista.   '+
                                          '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
                                          '</span>'+
                                          '<br><br>'+
                                          '<h4 class="list-group-item-heading">'+                                              
                                              ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                          '<p class="list-group-item-text"> '+
                                          '<small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small>'+
                                      '</dvi><br>';
                        }else{
                            html += '<li class="list-group-item" style="border:0">'+
                                    '<br>'+                                                     
                                      '<div class="row">'+
                                          '<h4 class="list-group-item-heading">'+
                                              ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                          '<p class="list-group-item-text">'+
                                          '<small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small>'+
                                      '</dvi><br><br><br>'+
                                      '<div class="row">'+
                                          '<div class="pull-left btn-group" role="group" aria-label="Informacion" id="Botonera" name="Botonera">'+
                                              '<button type="button" data-role="InformacionEntrenador" data-rel="'+e['Id_Persona']+'" class="btn btn-primary btn-sm">Información Basica</button>'+
                                          '</div>'+
                                      '</div>';
                        }
                        html += '</li>';
                        
                        $('#personas').html(html);
                        $('#paginador').fadeOut();
                    });
              });              
            }            
          },
          'json'
        )
      } else if(key.length == 0){
        reset(e);
      }
    };
    
function Validacion(campo, mensaje){
    $("#"+campo).css({ 'border-color': '#B94A48' });    
    $("#"+campo+"L").css({ 'color': '#B94A48' });    
    
    var texto = $("#mensajeIncorrecto").html();
    
    $("#mensajeIncorrecto").html(texto + '<br>' + mensaje);
    $("#mensaje-incorrecto").fadeIn();
    $('#mensaje-incorrecto').focus();
}

function Normal(campo){
    $("#"+campo).css({ 'border-color': '#CCCCCC' });    
    $("#"+campo+"L").css({ 'color': '#555555' });    
}
    
function InfoBasica(id){    
        $.get("entrenador/" + id + "", function (response) {            
            popular_modal_entrenador(response);
        });
        $("#mensaje-incorrecto").fadeOut();
        Normal('Telefono_Fijo'); Normal('Telefono_Celular'); Normal('Correo_Electronico');            
}

function popular_modal_entrenador(persona){
        var nombreEntrenador="";
        var cedulaEntrenador="";

        nombreEntrenador = $.trim(persona['Primer_Apellido'])+' '+$.trim(persona['Segundo_Apellido'])+' '+$.trim(persona['Primer_Nombre'])+' '+$.trim(persona['Segundo_Nombre']);
        $('p[name="Cedula"]').val($.trim(persona['Cedula']));
        cedulaEntrenador = "CC: "+ $.trim(persona['Cedula']);

        document.getElementById("nombreEntrenador").innerHTML= nombreEntrenador.toUpperCase();
        document.getElementById("cedulaEntrenador").innerHTML=cedulaEntrenador;

        $("#Pais").val(persona['Id_Pais']).change();
        $('input[name="Fecha_Nacimiento"]').val($.trim(persona['Fecha_Nacimiento']));
        $('input[name="Nombre_Ciudad"]').val($.trim(persona['Nombre_Ciudad']));
        $("#Genero").val(persona['Id_Genero']).change();
        $("#Grupo_Etnico").val(persona['Id_Etnia']).change();
        $('input[name="Id_Persona"]').val($.trim(persona['Id_Persona']));
        $("#SImagen").empty();
        
        if(persona.entrenador){      
            if(persona.entrenador['V_URL_IMG'] != ''){
                $("#SImagen").append("<img id='Imagen' src=''>");
                $("#Imagen").attr('src',$("#Imagen").attr('src')+persona.deportista['V_URL_IMG']+'?' + (new Date()).getTime());
            }else{            
                $("#SImagen").append('<span class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br>No ha ingresado la imágen del deportista.</span>');
            }
            $('input[name="Id_Entrenador"]').val($.trim(persona.entrenador['PK_I_ID_ENTRENADOR']));
            $('input[name="Telefono_Fijo"]').val($.trim(persona.entrenador['V_TELEFONO_FIJO']));
            $('input[name="Telefono_Celular"]').val($.trim(persona.entrenador['V_TELEFONO_CELULAR']));
            $('input[name="Correo_Electronico"]').val($.trim(persona.entrenador['V_CORREO_ELECTRONICO']));
            
            
            //showDeportes(persona.entrenador['FK_I_ID_AGRUPACION'], persona.deportista['FK_I_ID_DEPORTE']);
            
        }else{            
            $("#SImagen").append('<span class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br>No ha ingresado la imágen del entrenador.</span>');
        }
      
    $('#modal_form_entrenador').modal('show');
}


function RegistroEntrenador(){    
    
    var Id_Persona = $("#Id_Persona").val();
    var Id_Entrenador = $("#Id_Entrenador").val();
    var Telefono_Fijo = $('#Telefono_Fijo').val();
    var Telefono_Celular = $('#Telefono_Celular').val();
    var Correo_Electronico = $('#Correo_Electronico').val();
    var Deporte = $('#Deporte').val();
    var Agrupacion = $('#Agrupacion').val();    
    var  Etapa_Entrenamiento = [];
    var Modalidad = [];
    var nombre = '';
    var nombreM = '';
    
    $.each(etapas, function(i, e){
        nombre = '#etapa'+e['PK_I_ID_ETAPA_ENTRENAMIENTO'];
        if($(nombre).is(":checked") == true){
            Etapa_Entrenamiento[Etapa_Entrenamiento.length] = e['PK_I_ID_ETAPA_ENTRENAMIENTO'];
        }
    });
    
    if(Deporte){                
        $.each(modalidades, function(i, e){
           nombreM = '#modalidad'+e['PK_I_ID_MODALIDAD'];
            if($(nombreM).is(":checked") == true){
               Modalidad[Modalidad.length] = e['PK_I_ID_MODALIDAD'];
            }
        });
    }
    
    var datos = {
            Id_Persona: Id_Persona,
            Telefono_Fijo: Telefono_Fijo,
            Telefono_Celular: Telefono_Celular,
            Correo_Electronico: Correo_Electronico,
            Deporte: Deporte,
            Agrupacion: Agrupacion,
            Etapa_Entrenamiento: Etapa_Entrenamiento,
            Modalidad: Modalidad
        }   
    $("#mensajeIncorrecto").html(':');        
    var token = $("#token").val();

    if(Id_Entrenador){
        Proceso('POST', 'EditEntrenador/'+ Id_Entrenador, datos, token);
    }else{            
        Proceso('POST', 'AddEntrenador', datos, token);
    }
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
          /*  $("#Botonera").empty();
            var botonera = '<button type="button" data-role="InformacionBasica" data-rel="'+datos['Id_Persona']+'" class="btn btn-primary btn-sm">Información Basica</button>\
                            <button type="button" data-role="InformacionDeportiva" data-rel="'+datos['Id_Persona']+'" class="btn btn-default btn-sm">Información Deportiva</button>\
                            <button type="button" data-role="ApoyoServicios" data-rel="'+datos['Id_Persona']+'" class="btn btn-primary btn-sm">Apoyos y servicios</button>';
            $("#Botonera").append(botonera);*/
            $('#modal_form_persona').modal('hide');
        },
        error: function (xhr) {
            if(xhr.responseJSON.Telefono_Fijo){ Validacion('Telefono_Fijo', xhr.responseJSON.Telefono_Fijo);}else{Normal('Telefono_Fijo');}
            if(xhr.responseJSON.Telefono_Celular){ Validacion('Telefono_Celular', xhr.responseJSON.Telefono_Celular);}else{Normal('Telefono_Celular');}
            if(xhr.responseJSON.Correo_Electronico){ Validacion('Correo_Electronico', xhr.responseJSON.Correo_Electronico);}else{Normal('Correo_Electronico');}
            if(xhr.responseJSON.Etapa_Entrenamiento){ Validacion('Etapa_Entrenamiento', xhr.responseJSON.Etapa_Entrenamiento);}else{Normal('Etapa_Entrenamiento');}
            if(xhr.responseJSON.Deporte){ Validacion('Deporte', xhr.responseJSON.Deporte);}else{Normal('Deporte');}
            if(xhr.responseJSON.Agrupacion){ Validacion('Agrupacion', xhr.responseJSON.Agrupacion);}else{Normal('Agrupacion');}
            if(xhr.responseJSON.Modalidad){ Validacion('Modalidad', xhr.responseJSON.Modalidad);}else{Normal('Modalidad');}
        
            var scrollPos;                    
            scrollPos = $("#mensajeIncorrecto").offset().top;
            $(window).scrollTop(scrollPos);
            return false;
        }
    });
    
}

function showDeportes(id, sel) {      
    $("#Deporte").empty();
    $("#Deporte").append("<option value=''>Seleccionar</option>");
    if(id){        
        $.get("getDeportes/" + id + "", function (response) {            
            $.each(response, function(i, e){
                $("#Deporte").append("<option value='" +e.PK_I_ID_DEPORTE + "'>" + e.V_NOMBRE_DEPORTE + "</option>");
            });
        }).done(function(e){
            $("#Deporte").val(sel);
        });
    }
}

function showModalidades(id, seleccion) {    
    $("#Modalidad").empty();
    if(id){        
         getModalidades(id);
        $.get("getModalidades/" + id + "", function (response) {                
            $.each(response, function(i, e){
               $('#Modalidad').append('<input type="checkbox"  name="modalidad'+e.PK_I_ID_MODALIDAD+'" id ="modalidad'+e.PK_I_ID_MODALIDAD+'" /><small>'+e.V_NOMBRE_MODALIDAD+'</small><br>');
            });
        }).done(function(e){
            $("#Modalidad").val(seleccion);
        });
    }
}

function getEtapas(){
 etapas = [];
    $.get("getEtapasEntrenamiento", function (etapasM) {    
        etapas = etapasM;
    });
}
function getModalidades(id){
    if(id){
        $.get("getModalidades/" + id + "", function (modalidadesM) {
            modalidades = modalidadesM;
        });
    }
}



/*function guardaImagen(idPersona){
    var token = $("#token").val();
    $.ajax({
        url: 'AddImagen/'+idPersona,
        type: 'POST',
        data:  new FormData($("#Formulario_Imagen")[0]),
        mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        headers: {'X-CSRF-TOKEN': token},
        success: function(data){
            $("#Imagen").attr('src',$("#Imagen").attr('src')+idPersona+'_deportista.png?' + (new Date()).getTime());
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log('error');
            $("#errores").html(errorThrown);
        }        
    });
}*/