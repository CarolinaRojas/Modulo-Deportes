var etapas = [];
var modalidades;
var IdMod;

$(function(e){ 
    
    getEtapas();
    
    getModalidades($('#Deporte').val());
            
    function buscar(e){
        var key = $('input[name="buscador"]').val();
        var html = '';
        $.get('personaBuscarDeportista/'+key,{}, function(persona){
            if(persona.length > 0){
                //Si hay persona registrada
                $.get("deportista/" + +persona[0].Id_Persona + "", function (deportistaE){
                    if(deportistaE.deportista){
                        //ES un deportista
                        html += '<li class="list-group-item" style="border:0">'+
                                  '<div class="row">'+
                                      '<span class="label label-warning glyphicon-class">Esta persona ya se encuentra registrada como deportista.   '+
                                      '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
                                      '</span>'+
                                      '<br><br>'+
                                      '<h4 class="list-group-item-heading">'+
                                      persona[0].Primer_Apellido.toUpperCase()+' '+persona[0].Segundo_Apellido.toUpperCase()+' '+persona[0].Primer_Nombre.toUpperCase()+' '+persona[0].Segundo_Nombre.toUpperCase()+''+'</h4>'+                                  
                                      '<p class="list-group-item-text"> '+
                                      '<small>Identificación: '+persona[0].tipo_documento['Nombre_TipoDocumento']+' '+persona[0].Cedula+'</small>'+
                                  '</dvi><br>';
                          $('#personas').html(html);
                          $('#paginador').fadeOut();
                          
                    }else{ 
                        //No es un deportista
                        $.get('entrenador/'+persona[0].Id_Persona,{}, function(entrenador){
                            html += '<li class="list-group-item" style="border:0">'+
                                '<br>'+                                                     
                                  '<div class="row">'+
                                      '<h4 class="list-group-item-heading">'+
                                            persona[0].Primer_Apellido.toUpperCase()+' '+persona[0].Segundo_Apellido.toUpperCase()+' '+persona[0].Primer_Nombre.toUpperCase()+' '+persona[0].Segundo_Nombre.toUpperCase()+''+'</h4>'+
                                      '<p class="list-group-item-text">'+
                                      '<small>Identificación: '+persona[0].tipo_documento['Nombre_TipoDocumento']+' '+persona[0].Cedula+'</small>'+
                                  '</dvi><br><br><br>'+
                                  '<div class="row">';
                            if(entrenador.entrenador){
                                //Ya existe como entrenador                                
                                      html += '<div class="pull-left btn-group" role="group" aria-label="Informacion" id="Botonera" name="Botonera">'+
                                                    '<button id="InformacionEntrenador" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionEntrenador" data-rel="'+persona[0].Id_Persona+'" class="btn btn-primary btn-sm">Información Basica</button>'+
                                                    '<button id="HistorialDeportistas" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="HistorialDeportistas" data-rel="'+persona[0].Id_Persona+'" class="btn btn-default btn-sm">Historial Deportistas</button>'+
                                                '</div>'+
                                            '</div>';
                            }else{
                                //No existe como entrenador
                                html += '<div class="pull-left btn-group" role="group" aria-label="Informacion" id="Botonera" name="Botonera">'+
                                                    '<button id="InformacionEntrenador" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionEntrenador" data-rel="'+persona[0].Id_Persona+'" class="btn btn-primary btn-sm">Información Basica</button>'+
                                                '</div>'+
                                            '</div>';
                            }
                            $('#personas').html(html);
                            $('#paginador').fadeOut();
                        });
                    }
                    html += '</li>';                    
                }).done(function(e){
                    $('#buscar span').removeClass('glyphicon-refresh').addClass('glyphicon-remove');
                    $('#buscar span').empty();
                    document.getElementById("buscar").disabled = false;
                });                 
            }else{
                //'NO hay persona
                 $('#buscar span').removeClass('glyphicon-refresh').addClass('glyphicon-remove');
                $('#buscar span').empty();
                document.getElementById("buscar").disabled = false;
                html = '<li class="list-group-item" style="border:0"><div class="row"><h4 class="list-group-item-heading">No se encuentra ninguna persona registrada con estos datos.</h4></dvi><br>';
            }
            $('#personas').html(html);
            $('#paginador').fadeOut();            
            
        });
    };
    
    function reset(e){ 
        $('input[name="buscador"]').val('');
        $('input[name="Telefono_Fijo"]').val('');     
        $('input[name="Telefono_Celular"]').val('');     
        $('input[name="Correo_Electronico"]').val('');     
        $("#Tipo_Deportista").val('').change();
        $("#Agrupacion").val('').change();
        $("#Deporte").val('').change();
        $("#Etapa_Entrenamiento").val('').change();
        $("#Modalidad").empty();
        $('#Fotografia').val('');
        $('input[name="Id_Entrenador"]').val('');
        $("#IdDeporte").val('');
        IdMod = '';
        
        $("input[type=checkbox]").prop('checked', false);
        Normal('Telefono_Fijo'); Normal('Telefono_Celular'); Normal('Correo_Electronico'); Normal('Agrupacion'); Normal('Deporte'); Normal('Etapa_Entrenamiento'); Normal('Modalidad');        
      
        $('#personas').empty();
        $('#paginador').fadeIn();
        
        $('#buscar span').removeClass('glyphicon-refresh').addClass('glyphicon-search');
        $('#buscar span').empty();
        document.getElementById("buscar").disabled = false;
        document.getElementById("buscador").disabled = false;
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
        $('#Fotografia').val('');
            $.get("entrenador/" + id + "", function (response) {            
                popular_modal_entrenador(response);
            });
            $("#mensaje-incorrecto").fadeOut();
            Normal('Telefono_Fijo'); Normal('Telefono_Celular'); Normal('Correo_Electronico'); Normal('Agrupacion'); Normal('Deporte'); Normal('Etapa_Entrenamiento'); Normal('Modalidad');        
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
        IdMod = '';
        
        if(persona.entrenador){      
            if(persona.entrenador['V_URL_IMG'] != ''){
                $("#SImagen").append("<img id='Imagen' src=''>");
                $("#Imagen").attr('src',$("#Imagen").attr('src')+persona.entrenador['V_URL_IMG']+'?' + (new Date()).getTime());
            }else{            
                $("#SImagen").append('<span class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br>No ha ingresado la imágen del deportista.</span>');
            }            
            $("#IdDeporte").val(persona.entrenador['FK_I_ID_DEPORTE']);
            $('input[name="Id_Entrenador"]').val($.trim(persona.entrenador['PK_I_ID_ENTRENADOR']));
            $('input[name="Telefono_Fijo"]').val($.trim(persona.entrenador['V_TELEFONO_FIJO']));
            $('input[name="Telefono_Celular"]').val($.trim(persona.entrenador['V_TELEFONO_CELULAR']));
            $('input[name="Correo_Electronico"]').val($.trim(persona.entrenador['V_CORREO_ELECTRONICO']));
            $("#Tipo_Deportista").val(persona.entrenador['FK_I_ID_TIPO_DEPORTISTA']).change();
            $("#Agrupacion").val(persona.entrenador['FK_I_ID_AGRUPACION']).change();            
            IdMod = persona.entrenador.modalidades_entrenador;
            
            /*marcación de etapas de entrenamiento*/
            $.each(persona.entrenador.etapas_entrenador, function(i, e){
                $("#etapa"+e['PK_I_ID_ETAPA_ENTRENAMIENTO']).prop("checked", "checked");
            });            
            
        }else{            
            $("#SImagen").append('<span class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br>No ha ingresado la imágen del entrenador.</span>');
        }
      
        $('#modal_form_entrenador').modal('show');
        $("#InformacionEntrenador").button('reset');
    }
    
    function RegistroEntrenador(){    
    
        var Id_Persona = $("#Id_Persona").val();
        var Id_Entrenador = $("#Id_Entrenador").val();
        var Telefono_Fijo = $('#Telefono_Fijo').val();
        var Telefono_Celular = $('#Telefono_Celular').val();
        var Correo_Electronico = $('#Correo_Electronico').val();
        var Deporte = $('#Deporte').val();
        var Tipo_Deportista = $("#Tipo_Deportista").val();
        var Agrupacion = $('#Agrupacion').val();    
        var Etapa_Entrenamiento = [];
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
                Modalidad: Modalidad,
                Tipo_Deportista: Tipo_Deportista
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
              guardaImagen(datos['Id_Persona'], xhr.Mensaje);
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
                $("#Enviar").button('reset');
                return false;
            }
        }).done(function(){
            $("#Enviar").button('reset');
        });

    }
    
    function showDeportes(id, id_tipo_deportista, sel) {  
        $("#Deporte").empty();            
        $("#Deporte").append("<option value=''>Seleccionar</option>");
        $("#Modalidad").empty();
        if(id && id_tipo_deportista){
            if(!sel){
                $("#Modalidad").empty();
            }
            $.get("getDeportes/" + id + "/" + id_tipo_deportista, function (response) {            
               $("#Deporte").empty();            
                $("#Deporte").append("<option value=''>Seleccionar</option>");            
                $.each(response, function(i, e){
                    $("#Deporte").append("<option value='" +e.PK_I_ID_DEPORTE + "'>" + e.V_NOMBRE_DEPORTE + "</option>");
                });
            }).done(function(e){
                $("#Deporte").val(sel).change();
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
              $.each(IdMod, function(i, e){
                    $("#modalidad"+e['PK_I_ID_MODALIDAD']).prop("checked", "checked");
                });
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

    function guardaImagen(idPersona, mensaje){
        var token = $("#token").val();
        $.ajax({
            url: 'AddImagenEnt/'+idPersona,
            type: 'POST',
            data:  new FormData($("#Formulario_Imagen")[0]),
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            headers: {'X-CSRF-TOKEN': token},
            success: function(data){
                alert(mensaje+data);
                $("#Imagen").attr('src',$("#Imagen").attr('src')+idPersona+'_deportista.png?' + (new Date()).getTime());            
                $("#Botonera").empty();
                var botonera = '<button id="InformacionEntrenador" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionEntrenador" data-rel="'+idPersona+'" class="btn btn-primary btn-sm">Información Basica</button>'+
                                                    '<button id="HistorialDeportistas" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="HistorialDeportistas" data-rel="'+idPersona+'" class="btn btn-default btn-sm">Historial Deportistas</button>';
                $("#Botonera").append(botonera);
                $('#modal_form_entrenador').modal('hide');

            },
            error: function(jqXHR, textStatus, errorThrown){
                Validacion('Fotografia', 'Error en la imagen');
            }

        });
    }    
        
    $('#personas').delegate('button[data-role="HistorialDeportistas"]', 'click', function(e){  
        $("#HistorialDeportistas").button('loading');
        var id = $(this).data('rel');
        $("#deportistas").empty();
        $('#numDeportistas').empty();
        $.get("entrenador/" + id + "", function (persona) {       
            if(persona.entrenador){
                if((persona.entrenador.historialdeportistas).length > 0){
                    $('#numDeportistas').append((persona.entrenador['historialdeportistas']).length);                        
                    $('#ver_mas').append('<button id="EntrenadorDeportistas" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="EntrenadorDeportistas" data-rel="'+persona['Id_Persona']+'" class="btn btn-primary btn-sm">Ver deportistas</button>');
                    var html = '';
                    $.each(persona.entrenador['historialdeportistas'], function(i, e){                        
                        t.row.add( ['<tr>\n\
                                    <td>\n\
                                        <h5 class="list-group-item-heading">'+e.persona.Primer_Apellido+' '+e.persona.Segundo_Apellido+' '+e.persona.Primer_Nombre+' '+e.persona.Segundo_Nombre+'</h5>\n\
                                        <p class="list-group-item-text">\n\
                                            <div class="row">\n\
                                                <div class="col-xs-12">\n\
                                                    <div class="row">\n\
                                                        <div class="col-xs-12 col-sm-6 col-md-3"><small>Identificación: '+e.persona.Cedula+'</small></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </p>\n\
                                    </td>\n\
                                </tr>'] ).draw( false );
                    });
                    $("#deportistas").append(html);
                }else{
                    $('#numDeportistas').append('0');
                    $("#deportistas").append('<li class="list-group-item"><h5 class="list-group-item-heading">Este entrenador aún no cuenta con deportistas asignados.</h5></li>');
                }
            }
        }).done(function(){
            $('#modal_form_deportistas').modal('show');
            $("#HistorialDeportistas").button('reset');
        });      
    }); 
    
    $('#buscar').on('click', function(e){
        $("#mensajeIncorrectoB").empty();
        $("#mensaje-incorrectoB").fadeOut();
        $("#buscador").css({ 'border-color': '#CCCCCC' });    
        $("#buscar").css({ 'border-color': '#CCCCCC' });    
        var key = $('input[name="buscador"]').val();
        if(!key && $(this).data('role') == 'buscar'){
            $("#buscador").css({ 'border-color': '#B94A48' });
            $("#buscar").css({ 'border-color': '#B94A48' });
            var texto = $("#mensajeIncorrectoB").html();

            $("#mensajeIncorrectoB").html(texto + '<br>' + 'Debe ingresar un parámetro para realizar la búsqueda.');
            $("#mensaje-incorrectoB").fadeIn();
            $('#mensaje-incorrectoB').focus();            
            return false;
        }        
        var role = $(this).data('role');               
        
        switch(role){
            case 'buscar':                
                $('#buscar span').removeClass('glyphicon-search').addClass('glyphicon-refresh');
                $('#buscar span').append(' Cargando...');
                 document.getElementById("buscar").disabled = true;
                 document.getElementById("buscador").disabled = true;
                $(this).data('role', 'reset');
                buscar(e);          
            break;
            case 'reset':                 
                $('#buscar span').removeClass('glyphicon-remove').addClass('glyphicon-refresh');
                $('#buscar span').append(' Cargando...');
                document.getElementById("buscar").disabled = true;
                document.getElementById("buscador").disabled = true;
                $(this).data('role', 'buscar');
                reset(e);
            break;
        }     
    });
    
    $('#personas').delegate('button[data-role="InformacionEntrenador"]', 'click', function(e){ var id = $(this).data('rel'); InfoBasica(id); $("#InformacionEntrenador").button('loading');}); 
    
    $('#Enviar').on('click', function () { RegistroEntrenador(); $("#Enviar").button('loading'); });
    
    $("#Tipo_Deportista").on('change', function(e){
        $("#Agrupacion").val('').change();
    });
    
    $('#Agrupacion').on('change', function(e){showDeportes($('#Agrupacion').val(), $("#Tipo_Deportista").val(), $("#IdDeporte").val());});
    
    $('#Deporte').on('change', function(e){showModalidades($('#Deporte').val()), $("#IdModalidad").val();});
         
    var t = $('#HDData').DataTable({
        retrieve: true,
        select: true,
        "responsive": true,
        "ordering": true,
        "info": true,
        "language": {
            url: 'public/DataTables/Spanish.json',
            searchPlaceholder: "Buscar"
        }
    });
 
});

function ValidaCampo(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z0-9\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
 }