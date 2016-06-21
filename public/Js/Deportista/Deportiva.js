var contador = 0;
var conEnt =[];
$(function(e){   
    RegistroDeportiva();
    
    $('#AgregarEntrenador').on('click', function(e){ SeleccionEntrenador($('#Entrenador').val()); });   
    
    $('#personas').delegate('button[data-role="InformacionDeportiva"]', 'click', function(e){    
        var id = $(this).data('rel');        
        $.get("deportista/" + id + "", function (deportista) {
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

    document.getElementById("tituloDeportiva").innerHTML= "GESTOR DE FUNCIONARIOS EN EL MÓDULO DE RENDIMIENTO DEPORTIVO";
    document.getElementById("nombreDeportD").innerHTML= nombreDeportista.toUpperCase();
    document.getElementById("CedulaD").innerHTML=cedulaDeportista;
    
    $('input[name="Id_Persona"]').val($.trim(persona['Id_Persona']));
    
    if(persona.deportista){
          
          $('input[name="Id_Deportista"]').val($.trim(persona.deportista['PK_I_ID_DEPORTISTA']));
          $("#Club_Deportivo").val(persona.deportista['FK_I_ID_CLUB_DEPORTIVO']).change();
          $("#Talla_Camisa").val(persona.deportista['FK_I_ID_TALLA_CAMISA']).change();
          $("#Talla_Zapatos").val(persona.deportista['FK_I_ID_TALLA_ZAPATOS']).change();
          $("#Talla_Chaqueta").val(persona.deportista['FK_I_ID_TALLA_CHAQUETA']).change();
          $("#Talla_Pantalon").val(persona.deportista['FK_I_ID_TALLA_PANTALON']).change();
      }
    
    
    $('#modal_form_deportiva').modal('show');
};

function SeleccionEntrenador(id){
    $.get("entrenador/" + id + "", function (persona) {
        //console.log(persona);
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
            conEnt[id] = persona.entrenador['PK_I_ID_ENTRENADOR'];
            console.log('depues->'+conEnt);            
        }
    });
}

function RegistroDeportiva(){
    $('#Enviar2').on('click', function () {
        var Id_Persona = $("#Id_Persona").val();
        var Id_Deportista = $("#Id_Deportista").val();
        var Club_Deportivo = $("#Club_Deportivo").val();
        var Entrenador = $("#Entrenador").val();
        var Talla_Camisa = $("#Talla_Camisa").val();
        var Talla_Zapatos = $("#Talla_Zapatos").val();
        var Talla_Chaqueta = $("#Talla_Chaqueta").val();
        var Talla_Pantalon = $("#Talla_Pantalon").val();
        var ArrayEntrenador = conEnt;
        
        if(ArrayEntrenador.length == 0){
            Validacion('Entrenador', 'Primero debe escoger uno o más entrenadores.');
            return false;
        }else{Normal('Entrenador');}
        
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
            Proceso ('PUT', 'EditDeportiva/'+Id_Deportista, datos, token);
        }     
    });
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
          //  $('#modal_form_deportiva').modal('hide');
        },
        error: function (xhr) {          
            $("#mensajeIncorrectoDos").empty();
            if(xhr.responseJSON.Club_Deportivo){ Validacion('Club_Deportivo', xhr.responseJSON.Club_Deportivo);}else{Normal('Club_Deportivo');}
            if(xhr.responseJSON.Talla_Camisa){ Validacion('Talla_Camisa', xhr.responseJSON.Talla_Camisa);}else{Normal('Talla_Camisa');}
            if(xhr.responseJSON.Talla_Zapatos){ Validacion('Talla_Zapatos', xhr.responseJSON.Talla_Zapatos);}else{Normal('Talla_Zapatos');}
            if(xhr.responseJSON.Talla_Chaqueta){ Validacion('Talla_Chaqueta', xhr.responseJSON.Talla_Chaqueta);}else{Normal('Talla_Chaqueta');}
            if(xhr.responseJSON.Talla_Pantalon){ Validacion('Talla_Pantalon', xhr.responseJSON.Talla_Pantalon);}else{Normal('Talla_Pantalon');}
                        
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
}

function Validacion(campo, mensaje){
    $("#"+campo).css({ 'border-color': '#B94A48' });    
    $("#"+campo+"L").css({ 'color': '#B94A48' });    
    
    var texto = $("#mensajeIncorrectoDos").html();
    
    $("#mensajeIncorrectoDos").html(texto + '<br>' + mensaje);
    $("#mensaje-incorrecto-dos").fadeIn();
}

function Normal(campo){
    $("#"+campo).css({ 'border-color': '#CCCCCC' });    
    $("#"+campo+"L").css({ 'color': '#555555' });    
}