var html;

$(function(e){   
    
    var $personas_actuales = $('#personas').html();    
    
    function buscar(e){        
        var key = $('input[name="buscador"]').val();
        $.get('personaBuscarDeportista/'+key,{}, function(data){              
            if(data.length > 0){
              var html = '';      
              $.each(data, function(i, e){                                          
                $.get("entrenador/" + e['Id_Persona'] + "", function (response) {
                    if(response.entrenador){
                        html = '<li class="list-group-item" style="border:0">'+
                                  '<div class="row">'+
                                      '<span class="label label-warning glyphicon-class">Esta persona ya se encuentra registrada como un entrenador.   '+
                                      '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
                                      '</span>'+
                                      '<br><br>'+
                                      '<h4 class="list-group-item-heading">'+                                              
                                          ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                      '<p class="list-group-item-text"> '+
                                      '<small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small>'+
                                  '</dvi><br>';
                    }else{
                        $.get("deportista/" + e['Id_Persona'] + "", function (responseDep) {
                            html += '<li class="list-group-item" style="border:0">'+
                                       '<br>'+                                                     
                                         '<div class="row">'+
                                             '<h4 class="list-group-item-heading">'+
                                                 ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                             '<p class="list-group-item-text">'+
                                             '<small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small>'+
                                         '</dvi><br><br><br>';
                           if(responseDep.deportista){
                                      html +=  '<div class="row">'+
                                                   '<div class="pull-left btn-group" role="group" aria-label="Informacion" id="Botonera" name="Botonera">'+
                                                        '<button id="InformacionBasica" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionBasica" data-rel="'+e['Id_Persona']+'" class="btn btn-primary btn-sm">Información Basica</button>'+
                                                        '<button id="InformacionDeportiva" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionDeportiva" data-rel="'+e['Id_Persona']+'" class="btn btn-default btn-sm">Información Deportiva</button>'+
                                                        '<button id="ApoyoServicios" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="ApoyoServicios" data-rel="'+e['Id_Persona']+'" class="btn btn-primary btn-sm">Apoyos y servicios</button>'+
                                                   '</div>'+
                                               '</div>';
                           }else{
                               html +=   '<div class="row">'+
                                             '<div class="pull-left btn-group" role="group" aria-label="Informacion" id="Botonera" name="Botonera">'+
                                                 '<button id="InformacionBasica" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionBasica" data-rel="'+e['Id_Persona']+'" class="btn btn-primary btn-sm">Información Basica</button>'+
                                             '</div>'+
                                         '</div>';
                           }     
                           html += '</li>';

                           $('#personas').html(html);
                           $('#paginador').fadeOut();
                       }).done(function (){
                           $('#buscar span').removeClass('glyphicon-refresh').addClass('glyphicon-remove');
                           $('#buscar span').empty();
                           document.getElementById("buscar").disabled = false;
                       });
                    }
                    html += '</li>';
                    $('#personas').html(html);
                    $('#paginador').fadeOut();                    
                });
              });
            }else{     
                $('#buscar span').removeClass('glyphicon-refresh').addClass('glyphicon-remove');
                $('#buscar span').empty();
                document.getElementById("buscar").disabled = false;
                $('#personas').html( '<li class="list-group-item" style="border:0"><div class="row"><h4 class="list-group-item-heading">No se encuentra ninguna persona registrada con estos datos.</h4></dvi><br>');
                $('#paginador').fadeOut();
            }        
          },
          'json'
        );
    };
    
    function reset(e){        
        $('input[name="buscador"]').val('');
      
        $('input[name="Direccion_Residencia"]').val('');          
        $('input[name="Telefono_Fijo"]').val('');
        $('input[name="Telefono_Celular"]').val('');
        $('input[name="Correo_Electronico"]').val('');
        $('input[name="Grupo_Etnico"]').val('');
        $('input[name="Estado_Civil"]').val('');
        $('input[name="Hijos"]').val('');
        $('input[name="Cuenta"]').val('');
        $('input[name="Id_Deportista"]').val('');
        $("#Localidad").val('').change();
            
        $('input[name="Id_Deportista"]').val('');
        $("#Club_Deportivo").val('').change();
        $("#Talla_Camisa").val('').change();
        $("#Talla_Zapatos").val('').change();
        $("#Talla_Chaqueta").val('').change();
        $("#Talla_Pantalon").val('').change();
        
        $('#Fotografia').val('');
            
        $("#Eps").val('').change();
        $("#Estado_Civil").val('').change();
        $('input[name="Localidad"]').val('');
        $("#Agrupacion").val('').change();
        $("#Departamento").val('').change();
        $("#EtapaNacional").val('').change();
        $("#EtapaInternacional").val('').change();
        $('input[name="Barrio"]').val('');
        $("#Banco").val('').change();
        $("#Tipo_Cuenta").val('').change();
        $("#Estrato").val('').change();
        $("#Grupo_Sanguineo").val('').change();
        $("#Tipo_Deportista").val('').change();
        $("#Situacion_Militar").val('').change();
        document.getElementById("Fecha_Ingreso").value = '';
        document.getElementById("Fecha_Retiro").value = '';
                
        $('Tipo_Estimulo').val('').change();
        $('Valor_Estimulo').val('').change();
        $('Valor_SMMLV').val('');
        
        $('Club_Deportivo').val('').change();
        $('Entrenador').val('').change();
        $('Talla_Camisa').val('').change();
        $('Talla_Zapatos').val('').change();
        $('Talla_Chaqueta').val('').change();
        $('Talla_Pantalon').val('').change();
        $("#PanelEntrenador").empty();
        
        $('#personas').html($personas_actuales);
        $('#paginador').fadeIn();
        
        $('#buscar span').removeClass('glyphicon-refresh').addClass('glyphicon-search');
        $('#buscar span').empty();
        document.getElementById("buscar").disabled = false;
    };    
    
    function popular_modal_persona(persona){
        
      var nombreDeportista="";
      var cedulaDeportista="";

      nombreDeportista = $.trim(persona['Primer_Apellido'])+' '+$.trim(persona['Segundo_Apellido'])+' '+$.trim(persona['Primer_Nombre'])+' '+$.trim(persona['Segundo_Nombre']);
      $('p[name="Cedula"]').val($.trim(persona['Cedula']));
      cedulaDeportista = "CC: "+ $.trim(persona['Cedula']);

      document.getElementById("nombreDeport").innerHTML= nombreDeportista.toUpperCase();
      document.getElementById("Cedula").innerHTML=cedulaDeportista;

      $("#Pais").val(persona['Id_Pais']).change();
      $('input[name="Fecha_Nacimiento"]').val($.trim(persona['Fecha_Nacimiento']));
      $('input[name="Nombre_Ciudad"]').val($.trim(persona['Nombre_Ciudad']));
      $("#Genero").val(persona['Id_Genero']).change();
      $("#Grupo_Etnico").val(persona['Id_Etnia']).change();
      $('input[name="Id_Persona"]').val($.trim(persona['Id_Persona']));
      $("#Deporte").empty();
      $("#Modalidad").empty();
      $("#EtapaNacional").empty();
      $("#EtapaInternacional").empty();
      $("#Modalidad").append("<option value=''>Seleccionar</option>");
      $("#Deporte").append("<option value=''>Seleccionar</option>");
      $("#EtapaNacional").append("<option value=''>Seleccionar</option>");      
      $("#EtapaInternacional").append("<option value=''>Seleccionar</option>");      
      $("#SImagen").empty();
                  
      if(persona.deportista){
          
        if(persona.deportista['V_URL_IMG'] != ''){
            $("#SImagen").append("<img id='Imagen' src=''>");
            $("#Imagen").attr('src',$("#Imagen").attr('src')+persona.deportista['V_URL_IMG']+'?' + (new Date()).getTime());
        }else{            
            $("#SImagen").append('<span class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br>No ha ingresado la imágen del deportista.</span>');
        }
                    
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
          $('input[name="Localidad"]').val($.trim(persona.deportista['V_LOCALIDAD']));
          
          $("#Agrupacion").val(persona.deportista['FK_I_ID_AGRUPACION']).change();
          $("#Departamento").val(persona.deportista['FK_I_ID_DEPARTAMENTO']).change();
          
          
          $('input[name="Barrio"]').val($.trim(persona.deportista['V_BARRIO']));
          $("#Banco").val(persona.deportista['FK_I_ID_BANCO']).change();
          $("#Tipo_Cuenta").val(persona.deportista['FK_I_ID_TIPO_CUENTA']).change();
          $('input[name="Id_Deportista"]').val($.trim(persona.deportista['PK_I_ID_DEPORTISTA']));
          $("#Estrato").val(persona.deportista['FK_I_ID_ESTRATO']).change();
          $("#Localidad").val(persona.deportista['FK_I_ID_LOCALIDAD']).change();
          $("#Grupo_Sanguineo").val(persona.deportista['FK_I_ID_GRUPO_SANGUINEO']).change();
          $("#Tipo_Deportista").val(persona.deportista['FK_I_ID_TIPO_DEPORTISTA']).change();
          $("#Situacion_Militar").val(persona.deportista['FK_I_ID_SITUACION_MILITAR']).change();
          document.getElementById("Fecha_Ingreso").value = persona.deportista['D_FECHA_INGRESO'];
          
         if(persona.deportista['D_FECHA_RETIRO'] != '0000-00-00'){
             alert(persona.deportista['D_FECHA_RETIRO'])
            document.getElementById("Fecha_Retiro").value = persona.deportista['D_FECHA_RETIRO'];         
            }
          
          showDeportes(persona.deportista['FK_I_ID_AGRUPACION'], persona.deportista['FK_I_ID_DEPORTE']);          
          showModalidades(persona.deportista['FK_I_ID_DEPORTE'], persona.deportista['FK_I_ID_MODALIDAD']);          
          $("#EtapaNacional").empty();
          $("#EtapaInternacional").empty();
          
          showEtapas(persona.deportista['FK_I_ID_TIPO_DEPORTISTA'], persona.deportista['FK_I_ID_ETAPA_NACIONAL'], persona.deportista['FK_I_ID_ETAPA_INTERNACIONAL']);          
          
      }else{            
         $("#SImagen").append('<span class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br>No ha ingresado la imágen del deportista.</span>');
      }
        $('#modal_form_persona').modal('show');
        $("#InformacionBasica").button('reset');
    };    

    function RegistroDeportista(){

        $('#Enviar').on('click', function () {
            $("#Enviar").button('loading');
            var Id_Persona = $("#Id_Persona").val();
            var Id_Deportista = $("#Id_Deportista").val();
            var Eps = $('#Eps').val();

            var Localidad = $('#Localidad').val();
            var Barrio = $('#Barrio').val();
            var Direccion_Residencia = $('#Direccion_Residencia').val();
            var Telefono_Fijo = $('#Telefono_Fijo').val();
            var Telefono_Celular = $('#Telefono_Celular').val();
            var Correo_Electronico = $('#Correo_Electronico').val();
            var Estado_Civil = $('#Estado_Civil').val();
            var Hijos = $('#Hijos').val();
            var Banco = $('#Banco').val();
            var Tipo_Cuenta = $('#Tipo_Cuenta').val();
            var Cuenta = $('#Cuenta').val();
            var Deporte = $('#Deporte').val();
            var Modalidad = $('#Modalidad').val();
            var Agrupacion = $('#Agrupacion').val();
            var EtapaNacional = $('#EtapaNacional').val();
            var EtapaInternacional = $('#EtapaInternacional').val();

            var Estrato = $('#Estrato').val();
            var Grupo_Sanguineo = $('#Grupo_Sanguineo').val();
            var Tipo_Deportista = $('#Tipo_Deportista').val();
            var Situacion_Militar = $('#Situacion_Militar').val();
            var SMMLV = $('#SMMLV').val();
            var Fecha_Ingreso = document.getElementById("Fecha_Ingreso").value;
            var Fecha_Retiro= document.getElementById("Fecha_Retiro").value;

            var datos = {
                        Eps: Eps,

                        Localidad: Localidad,
                        Barrio: Barrio,
                        Direccion_Residencia: Direccion_Residencia,
                        Telefono_Fijo: Telefono_Fijo,
                        Telefono_Celular: Telefono_Celular,
                        Correo_Electronico: Correo_Electronico,
                        Estado_Civil: Estado_Civil,
                        Hijos: Hijos,
                        Banco: Banco,
                        Tipo_Cuenta: Tipo_Cuenta,
                        Cuenta: Cuenta,
                        Deporte: Deporte,
                        Modalidad: Modalidad,
                        Agrupacion: Agrupacion,
                        EtapaNacional: EtapaNacional,
                        EtapaInternacional: EtapaInternacional,
                        Id_Persona: Id_Persona,
                        Id_Deportista: Id_Deportista,
                        Estrato: Estrato,
                        Grupo_Sanguineo: Grupo_Sanguineo,
                        Tipo_Deportista: Tipo_Deportista,
                        Situacion_Militar: Situacion_Militar,
                        SMMLV: SMMLV,
                        Fecha_Ingreso: Fecha_Ingreso,
                        Fecha_Retiro: Fecha_Retiro,
                    }

            $("#mensajeIncorrecto").html(':');

            var token = $("#token").val();

            if(Id_Deportista){
                Proceso('POST', 'EditDatos/'+ Id_Deportista, datos, token);
            }else{            
                Proceso('POST', 'AddDatos', datos, token);
            }        
        });
    }

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
                if(xhr.responseJSON.Grupo_Sanguineo){ Validacion('Grupo_Sanguineo', xhr.responseJSON.Grupo_Sanguineo);}else{Normal('Grupo_Sanguineo');}
                if(xhr.responseJSON.Eps){ Validacion('Eps', xhr.responseJSON.Eps);}else{Normal('Eps');}
                if(xhr.responseJSON.Estado_Civil){ Validacion('Estado_Civil', xhr.responseJSON.Estado_Civil);}else{Normal('Estado_Civil');}
                if(xhr.responseJSON.Estrato){ Validacion('Estrato', xhr.responseJSON.Estrato);}else{Normal('Estrato');}
                if(xhr.responseJSON.Situacion_Militar){ Validacion('Situacion_Militar', xhr.responseJSON.Situacion_Militar);}else{Normal('Situacion_Militar');}
                if(xhr.responseJSON.Hijos){ Validacion('Hijos', xhr.responseJSON.Hijos);}else{Normal('Hijos');}
                if(xhr.responseJSON.Departamento){ Validacion('Departamento', xhr.responseJSON.Departamento);}else{Normal('Departamento');}
                if(xhr.responseJSON.Localidad){ Validacion('Localidad', xhr.responseJSON.Localidad);}else{Normal('Localidad');}
                if(xhr.responseJSON.Barrio){ Validacion('Barrio', xhr.responseJSON.Barrio);}else{Normal('Barrio');}
                if(xhr.responseJSON.Direccion_Residencia){ Validacion('Direccion_Residencia', xhr.responseJSON.Direccion_Residencia);}else{Normal('Direccion_Residencia');}
                if(xhr.responseJSON.Telefono_Fijo){ Validacion('Telefono_Fijo', xhr.responseJSON.Telefono_Fijo);}else{Normal('Telefono_Fijo');}
                if(xhr.responseJSON.Telefono_Celular){ Validacion('Telefono_Celular', xhr.responseJSON.Telefono_Celular);}else{Normal('Telefono_Celular');}
                if(xhr.responseJSON.Correo_Electronico){ Validacion('Correo_Electronico', xhr.responseJSON.Correo_Electronico);}else{Normal('Correo_Electronico');}
                if(xhr.responseJSON.Tipo_Deportista){ Validacion('Tipo_Deportista', xhr.responseJSON.Tipo_Deportista);}else{Normal('Tipo_Deportista');}
                if(xhr.responseJSON.Banco){ Validacion('Banco', xhr.responseJSON.Banco);}else{Normal('Banco');}
                if(xhr.responseJSON.Tipo_Cuenta){ Validacion('Tipo_Cuenta', xhr.responseJSON.Tipo_Cuenta);}else{Normal('Tipo_Cuenta');}
                if(xhr.responseJSON.Cuenta){ Validacion('Cuenta', xhr.responseJSON.Cuenta);}else{Normal('Cuenta');}
                if(xhr.responseJSON.Deporte){ Validacion('Deporte', xhr.responseJSON.Deporte);}else{Normal('Deporte');}
                if(xhr.responseJSON.Modalidad){ Validacion('Modalidad', xhr.responseJSON.Modalidad);}else{Normal('Modalidad');}
                if(xhr.responseJSON.Agrupacion){ Validacion('Agrupacion', xhr.responseJSON.Agrupacion);}else{Normal('Agrupacion');}
                if(xhr.responseJSON.EtapaNacional){ Validacion('EtapaNacional', xhr.responseJSON.EtapaNacional);}else{Normal('EtapaNacional');}
                if(xhr.responseJSON.EtapaInternacional){ Validacion('EtapaInternacional', xhr.responseJSON.EtapaInternacional);}else{Normal('EtapaInternacional');}
                if(xhr.responseJSON.SMMLV){ Validacion('SMMLV', xhr.responseJSON.SMMLV);}else{Normal('SMMLV');}
                if(xhr.responseJSON.Fecha_Ingreso){ Validacion('Fecha_Ingreso', xhr.responseJSON.Fecha_Ingreso);}else{Normal('Fecha_Ingreso');}
                if(xhr.responseJSON.Fecha_Retiro){ Validacion('Fecha_Retiro', xhr.responseJSON.Fecha_Retiro);}else{Normal('Fecha_Retiro');}

                var scrollPos;                    
                scrollPos = $("#mensajeIncorrecto").offset().top;
                $(window).scrollTop(scrollPos);
                $('#Enviar').button('reset');
                return false;
            }
        }).done(function(e){
            $('#Enviar').button('reset');
        });

    }

    function showDeportes(id, sel) {  

        if(id){
            if(!sel){
                $("#Modalidad").empty();
                $("#Modalidad").append("<option value=''>Seleccionar</option>");
            }
            $.get("getDeportes/" + id + "", function (response) {            
               $("#Deporte").empty();            
                $("#Deporte").append("<option value=''>Seleccionar</option>");            
                $.each(response, function(i, e){
                    $("#Deporte").append("<option value='" +e.PK_I_ID_DEPORTE + "'>" + e.V_NOMBRE_DEPORTE + "</option>");
                });
            }).done(function(e){
                $("#Deporte").val(sel);
            });
        }
    }

    function showModalidades(id, seleccion) {
        if(id){
            $("#Modalidad").empty();
            $.get("getModalidades/" + id + "", function (response) {    
                $("#Modalidad").append("<option value=''>Seleccionar</option>");
                $.each(response, function(i, e){
                   $('#Modalidad').append('<option value="'+ e.PK_I_ID_MODALIDAD +'">'+ e.V_NOMBRE_MODALIDAD +'</option>');
                });
            }).done(function(e){
                $("#Modalidad").val(seleccion);
            });
        }
    }

    function showEtapas(id_tipo_deportista, seleccion_nal, seleccion_inter) {      
        if(id_tipo_deportista != 0){
            var id_tipo_etapa_nac = 0;
            var id_tipo_etapa_inter = 0;

            if(id_tipo_deportista == 1){
                id_tipo_etapa_nac = 1;
                id_tipo_etapa_inter = 2

            }else if(id_tipo_deportista == 2){
                id_tipo_etapa_nac = 3;
                id_tipo_etapa_inter = 4;
            }

            $.get("getEtapasNac/" + id_tipo_etapa_nac + "", function (response) {
                $("#EtapaNacional").empty();
                    $("#EtapaNacional").append("<option value=''>Seleccionar</option>");
                    $.each(response, function(i, e){
                        $('#EtapaNacional').append('<option value="'+ e.PK_I_ID_ETAPA +'">'+ e.V_NOMBRE_ETAPA +'</option>');
                    });
            }).done(function(e){
                $("#EtapaNacional").val(seleccion_nal);
            });

            $.get("getEtapasInter/" + id_tipo_etapa_inter + "", function (response) {
                $("#EtapaInternacional").empty();
                    $("#EtapaInternacional").append("<option value=''>Seleccionar</option>");
                    $.each(response, function(i, e){
                        $('#EtapaInternacional').append('<option value="'+ e.PK_I_ID_ETAPA +'">'+ e.V_NOMBRE_ETAPA +'</option>');
                    });
            }).done(function(e){
                $("#EtapaInternacional").val(seleccion_inter);
            });        
        }

    }
    
    function guardaImagen(idPersona, mensaje){
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
                alert(mensaje+data);
                $("#Imagen").attr('src',$("#Imagen").attr('src')+idPersona+'_deportista.png?' + (new Date()).getTime());            
                $("#Botonera").empty();
                var botonera = '<button id="InformacionBasica" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionBasica" data-rel="'+idPersona+'" class="btn btn-primary btn-sm">Información Basica</button>\
                                <button id="InformacionDeportiva" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="InformacionDeportiva" data-rel="'+idPersona+'" class="btn btn-default btn-sm">Información Deportiva</button>\
                                <button id="ApoyoServicios" autocomplete="off" data-loading-text="Cargando..." type="button" data-role="ApoyoServicios" data-rel="'+idPersona+'" class="btn btn-primary btn-sm">Apoyos y servicios</button>';
                $("#Botonera").append(botonera);
                $('#modal_form_persona').modal('hide');

            },
            error: function(jqXHR, textStatus, errorThrown){
                Validacion('Fotografia', 'Error en la imagen');
            }

        });
    }    

    RegistroDeportista();
    
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
                $(this).data('role', 'reset');
                buscar(e);          
            break;
            case 'reset':                 
                $('#buscar span').removeClass('glyphicon-remove').addClass('glyphicon-refresh');
                $('#buscar span').append(' Cargando...');
                document.getElementById("buscar").disabled = true;
                $(this).data('role', 'buscar');
                reset(e);
            break;
        }
    });
    
    $('#personas').delegate('button[data-role="InformacionBasica"]', 'click', function(e){
        $("#InformacionBasica").button('loading');
        $("#mensajeIncorrectoB").empty();
        $("#mensaje-incorrectoB").fadeOut();
        var id = $(this).data('rel');
        $.get("deportista/" + id + "", function (response) {             
            $("#mensaje-incorrecto").fadeOut();
            $('#Fotografia').val('');
            Normal('Grupo_Sanguineo'); Normal('Eps'); Normal('Estado_Civil'); Normal('Estrato'); Normal('Situacion_Militar');
            Normal('Hijos'); Normal('Departamento'); Normal('Localidad'); Normal('Barrio'); Normal('Direccion_Residencia'); Normal('Telefono_Fijo'); 
            Normal('Telefono_Celular'); Normal('Correo_Electronico'); Normal('Tipo_Deportista'); Normal('Banco'); Normal('Cuenta');
            Normal('Deporte'); Normal('Modalidad'); Normal('Agrupacion'); Normal('EtapaNacional');Normal('EtapaInternacional');Normal('Tipo_Cuenta'); Normal('Fecha_Ingreso'); Normal('Fecha_Retiro')
            popular_modal_persona(response);
        });
    });
    
    $('#Fecha_Ingreso_Date').datepicker({        
       format: 'yyyy-mm-dd',
       autoclose: true,   
    });
    
    $('#Fecha_Retiro_Date').datepicker({        
       format: 'yyyy-mm-dd',
       autoclose: true,
    });

    $('#Tipo_Deportista').on('change', function(e){
        showEtapas($('#Tipo_Deportista').val());
    });

    $('#Agrupacion').on('change', function(e){
        showDeportes($('#Agrupacion').val());
    });

    $('#Deporte').on('change', function(e){
        showModalidades($('#Deporte').val());
    });
});