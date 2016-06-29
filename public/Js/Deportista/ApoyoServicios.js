$(function(e){ 
    $('#fInicioDate').datepicker({        
       format: 'yyyy-mm-dd',
       autoclose: true,   
    });
    
    $('#fFinDate').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true,
    });
    
    $('#personas').delegate('button[data-role="ApoyoServicios"]', 'click', function(e){    
        var id = $(this).data('rel'); 
        $("#mensaje-incorrecto-tres").fadeOut();
        Normal('fInicio');
        Normal('fFin');
        $.get("HEtapa/" + id + "", function (deportista) {
            popular_modal_apoyo(deportista);
        })
    });   
    
    $('#BuscarReporte').click(function (){       
        $("#mensajeIncorrectoTres").empty();
        Normal('fInicio');
        Normal('fFin');
        
        var id = $('button[data-role="ApoyoServicios"]').data('rel'); 
        var inicio  = document.getElementById("fInicio").value;
        var fin  = document.getElementById("fFin").value;        
       alert(inicio +'----'+fin);
        if(!id || !inicio || !fin){
            if(!inicio){                
                ValidacionDeportiva("fInicio", 'Ingrese una fecha de inicio para generar el reporte.');
            }
            if(!fin){
                ValidacionDeportiva("fFin", 'Ingrese una fecha de finalización para generar el reporte.');
            }
            return false;
        }else{
            BuscarIndividual(id, inicio, fin) ;
        }
    });
    
});

function popular_modal_apoyo(persona){
    var nombreDeportista="";
    var cedulaDeportista="";
    
    nombreDeportista = $.trim(persona['Primer_Apellido'])+' '+$.trim(persona['Segundo_Apellido'])+' '+$.trim(persona['Primer_Nombre'])+' '+$.trim(persona['Segundo_Nombre']);
    $('p[name="CedulaA"]').val($.trim(persona['Cedula']));
    cedulaDeportista = "CC: "+ $.trim(persona['Cedula']);

    document.getElementById("nombreDeportA").innerHTML= nombreDeportista.toUpperCase();
    document.getElementById("CedulaA").innerHTML=cedulaDeportista;
    
    $('input[name="Id_Persona"]').val($.trim(persona['Id_Persona']));
    $("#SImagen3").empty();
    
     if(persona.deportista){
        $("#SImagen3").append("<img id='Imagen3' src=''>");
        $("#Imagen3").attr('src',$("#Imagen3").attr('src')+persona.deportista['V_URL_IMG']+'?' + (new Date()).getTime());        
    }
    $('#modal_form_apoyo').modal('show');
    
}

function BuscarIndividual(id, inicio, fin){
    //alert(inicio +'----'+fin);
    var personaX;
    var tabla = '';
    var nombreDeportista = '';
    $.get("HEtapa/" + id + "", function (deportista) {            
            personaX = deportista;
            nombreDeportista = $.trim(personaX['Primer_Apellido'])+' '+$.trim(personaX['Segundo_Apellido'])+' '+$.trim(personaX['Primer_Nombre'])+' '+$.trim(personaX['Segundo_Nombre']);
            tabla += '<br>\n\
             <div class="col-md-12">\n\
                <table id="ApoyoData"  class="table table-striped table-borderless dt-responsive nowrap " cellspacing="0" width="100%">\n\
                <thead>\n\
                   <th>FECHA INICIO</th>\n\
                   <th>FECHA FIN</th>\n\
                   <th>NOMBRE</th>\n\
                   <th>OPCIÓN</th>\n\
                </thead>\n\
                <tr>\n\
                   <td>'+ inicio +'</td>\n\
                   <td>'+ fin +'</td>\n\
                   <td>'+nombreDeportista+'</td>\n\
                   <td>\n\
                      <button onclick="DescargaHistorial(this, \''+inicio+'\', \''+ fin +'\');" value="'+id+'" id="DescargaExcel" name="DescargaExcel" type="button" class="btn btn-default">\n\
                        <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>\n\
                        Descarga Excel\n\
                      </button>\n\
                   </td>\n\
                </tr>\n\
                </table>\n\
              </div>';
    
        $("#reporteIndividual").append(tabla);
        //$("#DescargaExcel").focus();
    });
}

 function DescargaHistorial(id, inicio, fin){
     //Descarga de archivo excel
     alert(id.value +'---'+ inicio +'----'+ fin);
     $.get('HistorialIndividual/'+id.value+'/'+inicio+'/'+fin, function (Hdeportista){        
        console.log(Hdeportista);
    });

 }





/*


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
        
        if(ArrayEntrenador.length == 0){
            ValidacionDeportiva('Entrenador', 'Primero debe escoger uno o más entrenadores.');
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
            ProcesoDeportiva ('PUT', 'EditDeportiva/'+Id_Deportista, datos, token);
        }     
    });
}
*/
function ProcesoDeportiva (tipo, url, datos, token){
    $.ajax({
        type: tipo,
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        dataType: 'json',
        data: datos,
        success: function (xhr) {
            alert(xhr.Mensaje);
//            $("#Botonera").empty();
//            var botonera = '<button type="button" data-role="InformacionBasica" data-rel="'+datos['Id_Persona']+'" class="btn btn-primary">Información Basica</button>\
//                            <button type="button" data-role="InformacionDeportiva" data-rel="'+datos['Id_Persona']+'" class="btn btn-default">Información Deportiva</button>\
//                            <button type="button" data-role="ApoyoServicios" data-rel="'+datos['Id_Persona']+'" class="btn btn-primary">Apoyos y servicios</button>';
//            $("#Botonera").append(botonera);
//            $('#modal_form_deportiva').modal('hide');
        },
        error: function (xhr) {          
//            $("#mensajeIncorrectoDos").empty();
//            if(xhr.responseJSON.Club_Deportivo){ ValidacionDeportiva('Club_Deportivo', xhr.responseJSON.Club_Deportivo);}else{Normal('Club_Deportivo');}
//            if(xhr.responseJSON.Talla_Camisa){ ValidacionDeportiva('Talla_Camisa', xhr.responseJSON.Talla_Camisa);}else{Normal('Talla_Camisa');}
//            if(xhr.responseJSON.Talla_Zapatos){ ValidacionDeportiva('Talla_Zapatos', xhr.responseJSON.Talla_Zapatos);}else{Normal('Talla_Zapatos');}
//            if(xhr.responseJSON.Talla_Chaqueta){ ValidacionDeportiva('Talla_Chaqueta', xhr.responseJSON.Talla_Chaqueta);}else{Normal('Talla_Chaqueta');}
//            if(xhr.responseJSON.Talla_Pantalon){ ValidacionDeportiva('Talla_Pantalon', xhr.responseJSON.Talla_Pantalon);}else{Normal('Talla_Pantalon');}
//                        
//            var scrollPos;                    
//            scrollPos = $("#mensajeIncorrectoDos").offset().top;
//            $(window).scrollTop(scrollPos);
//            return false;
        }
    });
}

function ValidacionDeportiva(campo, mensaje){
    $("#"+campo).css({ 'border-color': '#B94A48' });    
    $("#"+campo+"L").css({ 'color': '#B94A48' });    
    
    var texto = $("#mensajeIncorrectoTres").html();
    
    $("#mensajeIncorrectoTres").html(texto + '<br>' + mensaje);
    $("#mensaje-incorrecto-tres").fadeIn();
    $('#mensaje-incorrecto-tres').focus();
}

function Normal(campo){
    $("#"+campo).css({ 'border-color': '#CCCCCC' });    
    $("#"+campo+"L").css({ 'color': '#555555' });    
}