var contador = 0;
var conEnt =[];
$(function(e){       
    
    RegistroDeportiva();
    
    $('#AgregarEntrenador').on('click', function(e){ SeleccionEntrenador($('#Entrenador').val()); });   
    
    $('#personas').delegate('button[data-role="InformacionDeportiva"]', 'click', function(e){    
        var id = $(this).data('rel');        
        $.get("deportista/" + id + "", function (deportista) {
            $("#mensaje-incorrecto-dos").fadeOut();
            Normal('Club_Deportivo');
            Normal('Entrenador');
            Normal('Talla_Camisa');
            Normal('Talla_Zapatos');
            Normal('Talla_Chaqueta');
            Normal('Talla_Pantalon');
                popular_modal_deportiva(deportista);
            })
    });   
});

function popular_modal_deportiva(persona){
    
    var nombreDeportista="";
    var cedulaDeportista="";
    
    nombreDeportista = $.trim(persona['Primer_Apellido'])+' '+$.trim(persona['Segundo_Apellido'])+' '+$.trim(persona['Primer_Nombre'])+' '+$.trim(persona['Segundo_Nombre']);
    $('p[name="Cedula"]').val($.trim(persona['Cedula']));
    cedulaDeportista = "CC: "+ $.trim(persona['Cedula']);

    document.getElementById("nombreDeportD").innerHTML= nombreDeportista.toUpperCase();
    document.getElementById("CedulaD").innerHTML=cedulaDeportista;
    
    $('input[name="Id_Persona"]').val($.trim(persona['Id_Persona']));
    $("#SImagen2").empty();
    
    
    ShowEntrenadores(persona.deportista['FK_I_ID_DEPORTE']);
    
    if(persona.deportista){
        
        if(persona.deportista['V_URL_IMG'] != ''){
            $("#SImagen2").append("<img id='Imagen2' src=''>");
            $("#Imagen2").attr('src',$("#Imagen2").attr('src')+persona.deportista['V_URL_IMG']+'?' + (new Date()).getTime());
        }else{            
            $("#SImagen2").append('<span class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br>No ha ingresado la imágen del deportista.</span>');
        }
        
        $('#PanelEntrenador').empty(); 
        
        $('input[name="Id_Deportista"]').val($.trim(persona.deportista['PK_I_ID_DEPORTISTA']));
        $("#Club_Deportivo").val(persona.deportista['FK_I_ID_CLUB_DEPORTIVO']).change();
        
        ShowRopa(persona['Id_Genero'], 1, persona.deportista['FK_I_ID_TALLA_CAMISA'], persona.deportista['FK_I_ID_TALLA_CHAQUETA'], persona.deportista['FK_I_ID_TALLA_PANTALON']);
        ShowZapatos(persona['Id_Genero'], 2, persona.deportista['FK_I_ID_TALLA_ZAPATOS']);
       
        contador = 0;
        conEnt =[];
        
        $.get("Dentrenadores/"+persona.deportista['PK_I_ID_DEPORTISTA'], function (persona) {
              if(persona){
                  console.log(persona.entrenadores);
                  $.each(persona.entrenadores, function(i, e){
                      var Nombre = e.persona['Primer_Nombre']+' '+e.persona['Segundo_Nombre']+' '+e.persona['Primer_Apellido']+' '+e.persona['Segundo_Apellido'];
                      var Telefono = 'Telefóno fijo: '+e.V_TELEFONO_FIJO+' - '+'Telefóno celular: '+e.V_TELEFONO_CELULAR;
                      var id = e.FK_I_ID_PERSONA;
                      var id_entrenador = e.PK_I_ID_ENTRENADOR
                      var campos = '<div class="panel panel-default" id="DivEntrenador'+id+'" name="DivEntrenador'+id+'" >\n\
                            <div class="panel-body" >\n\
                                <input type="hidden" id ="IdEntrenador'+id+'" name="IdEntrenador'+id+'" value="'+id_entrenador+'" />\n\
                                <h4>ENTRENADOR:</h4>\n\
                                <div class="col-md-4">\n\
                                    <h5>Nombre: <small id="Nombre_Entrenador'+id+'" name="Nombre_Entrenador'+id+'">'+Nombre+'</small></h5>\n\
                                </div>\n\
                                <div class="col-md-4">\n\
                                    <h5>Contacto: <small>'+Telefono+'</small></h5>\n\
                                </div>\n\
                                <div class="col-md-2">\n\
                                    <button onclick="DesechaEntrenador(this, \''+Nombre+'\' )" type="button" class="btn btn-danger" id="EliminarEntrenador" name="EliminarEntrenador" value="'+e.FK_I_ID_PERSONA+'">-</button>\n\
                                </div>\n\
                            </div>\n\
                        </div>';            
                    $('#PanelEntrenador').append(campos);                                 
                    $("#Entrenador option[value='"+e.FK_I_ID_PERSONA+"']").remove();                    
                    conEnt[id] = id_entrenador;
                  });
              }      
            });
    }else{
        ShowRopa(persona['Id_Genero'], 1);
        ShowZapatos(persona['Id_Genero'], 2);
    }
    $('#modal_form_deportiva').modal('show');
};

function SeleccionEntrenador(id){      
    $.get("entrenador/" + id + "", function (persona) {
        if(persona.entrenador){
            var Nombre = persona['Primer_Nombre']+' '+persona['Segundo_Nombre']+' '+persona['Primer_Apellido']+' '+persona['Segundo_Apellido'];
            var Telefono = persona.entrenador['V_TELEFONO'];
            var campos = '<div class="panel panel-default" id="DivEntrenador'+id+'" name="DivEntrenador'+id+'" >\n\
                            <div class="panel-body" >\n\
                                <input type="hidden" id ="IdEntrenador'+id+'" name="IdEntrenador'+id+'" value="'+persona.entrenador['PK_I_ID_ENTRENADOR']+'" />\n\
                                <h4>ENTRENADOR:</h4>\n\
                                <div class="col-md-4">\n\
                                    <h5>Nombre: <small id="Nombre_Entrenador'+id+'" name="Nombre_Entrenador'+id+'">'+Nombre+'</small></h5>\n\
                                </div>\n\
                                <div class="col-md-4">\n\
                                    <h5>Contacto: <small>'+Telefono+'</small></h5>\n\
                                </div>\n\
                                <div class="col-md-2">\n\
                                    <button onclick="DesechaEntrenador(this, \''+Nombre+'\' )" type="button" class="btn btn-danger" id="EliminarEntrenador" name="EliminarEntrenador" value="'+persona['Id_Persona']+'">-</button>\n\
                                </div>\n\
                            </div>\n\
                        </div>';                        
            $('#PanelEntrenador').append(campos);            
            document.getElementById("Entrenador").remove(document.getElementById("Entrenador").selectedIndex);
            contador = contador + 1;
            conEnt[(conEnt.length)+1] = persona.entrenador['PK_I_ID_ENTRENADOR'];          
        }
    });
}

function RegistroDeportiva(){
    $('#EnviarDeportiva').on('click', function () {
        var Id_Persona = $("#Id_Persona").val();
        var Id_Deportista = $("#Id_Deportista").val();
        var Club_Deportivo = $("#Club_Deportivo").val();
        var Entrenador = $("#Entrenador").val();
        var Talla_Camisa = $("#Talla_Camisa").val();
        var Talla_Zapatos = $("#Talla_Zapatos").val();
        var Talla_Chaqueta = $("#Talla_Chaqueta").val();
        var Talla_Pantalon = $("#Talla_Pantalon").val();
        var ArrayEntrenador = conEnt;        
        
        var datos = {                    
                    Id_Persona: Id_Persona,
                    Id_Deportista: Id_Deportista,
                    Club_Deportivo: Club_Deportivo,
                    Entrenador: Entrenador,
                    Talla_Camisa: Talla_Camisa,
                    Talla_Zapatos: Talla_Zapatos,
                    Talla_Chaqueta: Talla_Chaqueta,
                    Talla_Pantalon: Talla_Pantalon,
                    ArrayEntrenador: ArrayEntrenador
                }
        
        var token = $("#token").val();
                
        if(Id_Deportista){
            ProcesoDeportiva ('POST', 'EditDeportiva/'+Id_Deportista, datos, token);
        }     
    });
}

function ProcesoDeportiva (tipo, url, datos, token){
    $.ajax({
        type: tipo,
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        dataType: 'json',
        data: datos,
        success: function (xhr) {
            alert(xhr.Mensaje);
            $("#Botonera").empty();
            var botonera = '<button type="button" data-role="InformacionBasica" data-rel="'+datos['Id_Persona']+'" class="btn btn-primary btn-sm">Información Basica</button>\
                            <button type="button" data-role="InformacionDeportiva" data-rel="'+datos['Id_Persona']+'" class="btn btn-default btn-sm">Información Deportiva</button>\
                            <button type="button" data-role="ApoyoServicios" data-rel="'+datos['Id_Persona']+'" class="btn btn-primary btn-sm">Apoyos y servicios</button>';
            $("#Botonera").append(botonera);
            $('#modal_form_deportiva').modal('hide');
        },
        error: function (xhr) {    
            $("#mensajeIncorrectoDos").empty();
            if(xhr.responseJSON.Club_Deportivo){ ValidacionDeportiva('Club_Deportivo', xhr.responseJSON.Club_Deportivo);}else{Normal('Club_Deportivo');}
            if(xhr.responseJSON.ArrayEntrenador){ ValidacionDeportiva('Entrenador', xhr.responseJSON.ArrayEntrenador);}else{Normal('Entrenador');}
            if(xhr.responseJSON.Talla_Camisa){ ValidacionDeportiva('Talla_Camisa', xhr.responseJSON.Talla_Camisa);}else{Normal('Talla_Camisa');}
            if(xhr.responseJSON.Talla_Zapatos){ ValidacionDeportiva('Talla_Zapatos', xhr.responseJSON.Talla_Zapatos);}else{Normal('Talla_Zapatos');}
            if(xhr.responseJSON.Talla_Chaqueta){ ValidacionDeportiva('Talla_Chaqueta', xhr.responseJSON.Talla_Chaqueta);}else{Normal('Talla_Chaqueta');}
            if(xhr.responseJSON.Talla_Pantalon){ ValidacionDeportiva('Talla_Pantalon', xhr.responseJSON.Talla_Pantalon);}else{Normal('Talla_Pantalon');}
                        
            var scrollPos;                    
            scrollPos = $("#mensajeIncorrectoDos").offset().top;
            $(window).scrollTop(scrollPos);
            return false;
        }
    });
}

function DesechaEntrenador(id, nombre){
    document.getElementById("DivEntrenador"+id.value).remove(document.getElementById("DivEntrenador"+id.value));
    $('#Entrenador').append('<option value="'+id.value+'">'+nombre+'</option>');
    delete conEnt[parseInt(id.value)];
    conEnt = conEnt.filter(Boolean);
}

function ValidacionDeportiva(campo, mensaje){
    $("#"+campo).css({ 'border-color': '#B94A48' });    
    $("#"+campo+"L").css({ 'color': '#B94A48' });    
    
    var texto = $("#mensajeIncorrectoDos").html();
    
    $("#mensajeIncorrectoDos").html(texto + '<br>' + mensaje);
    $("#mensaje-incorrecto-dos").fadeIn();
    $('#mensaje-incorrecto-dos').focus();
}

function Normal(campo){
    $("#"+campo).css({ 'border-color': '#CCCCCC' });    
    $("#"+campo+"L").css({ 'color': '#555555' });    
}

function tallaZapatosInter(id_talla){
    if(id_talla){
        $("#TUK").empty();
        $("#TUSA").empty();
        $.get("getOnlyTalla/"+id_talla, function (talla) {
            $("#TUK").append(talla.V_UK);
            $("#TUSA").append(talla.V_USA);
        });
        document.getElementById("ZapatoInter").style.visibility = "visible";
    }else{
        document.getElementById("ZapatoInter").style.visibility = "hidden";
    }
}

function ShowRopa(id_genero, id_tipo, seleccion_camisa, seleccion_chaqueta, seleccion_pantalon){
    $.get("getTallas/"+id_genero+"/"+id_tipo, function (tallasRopa) {        
        $("#Talla_Camisa").empty();
        $("#Talla_Camisa").append("<option value=''>Seleccionar</option>");
        
        $("#Talla_Chaqueta").empty();
        $("#Talla_Chaqueta").append("<option value=''>Seleccionar</option>");
        
        $("#Talla_Pantalon").empty();
        $("#Talla_Pantalon").append("<option value=''>Seleccionar</option>");
        
        $.each(tallasRopa, function(i, e){
            $('#Talla_Camisa').append('<option value="'+ e.PK_I_ID_TALLA +'">'+ e.V_USA +'</option>');
            $('#Talla_Chaqueta').append('<option value="'+ e.PK_I_ID_TALLA +'">'+ e.V_USA +'</option>');
            $('#Talla_Pantalon').append('<option value="'+ e.PK_I_ID_TALLA +'">'+ e.V_USA +'</option>');
        });        
        
    }).done(function(e){
            $('#Talla_Camisa').val(seleccion_camisa);
            $('#Talla_Chaqueta').val(seleccion_chaqueta);
            $('#Talla_Pantalon').val(seleccion_pantalon);
    });
}

function ShowZapatos(id_genero, id_tipo, seleccion){
    $.get("getTallas/"+id_genero+"/"+id_tipo, function (tallasRopa) {        
        
        $("#Talla_Zapatos").empty();
        $("#Talla_Zapatos").append("<option value=''>Seleccionar</option>");
        
        $.each(tallasRopa, function(i, e){
            $('#Talla_Zapatos').append('<option value="'+ e.PK_I_ID_TALLA +'">'+ e.V_EU +'</option>');
        
        });        
        
    }).done(function(e){
            $('#Talla_Zapatos').val(seleccion);
            tallaZapatosInter(seleccion);
    });
}

function ShowEntrenadores(id, seleccion){    
    $.get("EntrenadorDeporte/"+id, function(entrenadores){
        if(entrenadores){
            $("#Entrenador").empty();
            $("#Entrenador").append("<option value=''>Seleccionar</option>");        
            $.each(entrenadores, function(i, e){                
                $('#Entrenador').append('<option value="'+ e.persona['Id_Persona'] +'">'+ e.persona['Primer_Nombre']+' '+e.persona['Segundo_Nombre']+' '+e.persona['Primer_Apellido']+' '+e.persona['Segundo_Apellido']+'</option>');
            });       
        }else{
            alert('No hay entrenadores registrados para el deporte que practica esta persona.');
        }
    });
}