$(function(e){ 
    
    var CurrentDate = new Date();
    var date = CurrentDate.getDate();
    CurrentDate.setDate(1);
    CurrentDate.setMonth(CurrentDate.getMonth());
    CurrentDate.setDate(date);
    
    $('#fInicioDate').datepicker({        
       format: 'yyyy-mm',
       startView: 'year',
       minViewMode: 'months',
       autoclose: true,   
       endDate : CurrentDate.getFullYear()+'-'+CurrentDate.getMonth(),
    });
    
    $('#fFinDate').datepicker({
       format: 'yyyy-mm',
       startView: 'year',
       minViewMode: 'months',
       autoclose: true,   
       endDate : CurrentDate.getFullYear()+'-'+CurrentDate.getMonth(),
    });
    
    $('#personas').delegate('button[data-role="ApoyoServicios"]', 'click', function(e){    
        var id = $(this).data('rel'); 
        $("#mensaje-incorrecto-tres").fadeOut();
        document.getElementById("fInicio").value = '';
        /*document.getElementById("fFin").value = '';*/
        Normal('fInicio');
        Normal('fFin');
        $.get("HEtapa/" + id + "", function (deportista) {
            popular_modal_apoyo(deportista);
        })
    });   
    
    $('#BuscarReporte').click(function (){    
        $("#mensajeIncorrectoTres").empty();
        $("#mensaje-incorrecto-tres").fadeOut();
        Normal('fInicio');
        Normal('fFin');
        
        var id = $('button[data-role="ApoyoServicios"]').data('rel'); 
        var inicio  = document.getElementById("fInicio").value;
        /*var fin  = document.getElementById("fFin").value;        */
        if(!id || !inicio /*|| !fin*/){
            if(!inicio){                
                ValidacionDeportiva("fInicio", 'Ingrese una fecha de inicio para generar el reporte.');
            }
           /* if(!fin){
                ValidacionDeportiva("fFin", 'Ingrese una fecha de finalización para generar el reporte.');
            }*/
            return false;
        }else{
            BuscarIndividual(id, inicio/*, fin*/) ;
        }
    });
    
    $('#AgregarEstimulo').click(function () {
        AgregarEstimulo();
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
         $('input[name="Id_Deportista"]').val($.trim(persona.deportista['PK_I_ID_DEPORTISTA']));
        $("#SImagen3").append("<img id='Imagen3' src=''>");
        $("#Imagen3").attr('src',$("#Imagen3").attr('src')+persona.deportista['V_URL_IMG']+'?' + (new Date()).getTime());        
    }
    $('#modal_form_apoyo').modal('show');
    
}

function BuscarIndividual(id, inicio/*, fin*/){
    location.href = 'HistorialIndividual/'+id+'/'+inicio/*+'/'+fin*/;
}

function AgregarEstimulo(){
    $("#mensaje-incorrecto-tres").fadeOut();
    Normal('Tipo_Estimulo');
    Normal('Valor_Estimulo');
    
    var Id_Deportista = $("#Id_Deportista").val();
    var Tipo_Estimulo = $('#Tipo_Estimulo').val();
    var Valor_Estimulo = $('#Valor_Estimulo').val();
    var token = $("#token").val();
    
    var datos = {Tipo_Estimulo:Tipo_Estimulo, Valor_Estimulo: Valor_Estimulo, Id_Deportista: Id_Deportista, tipo: 'estimulos'};
    
    ProcesoApoyo ('POST', 'AddEstimulo', datos, token);   
}
 
function ProcesoApoyo (tipo, url, datos, token){
    $.ajax({
        type: tipo,
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        dataType: 'json',
        data: datos,
        success: function (xhr) {
            alert(xhr.Mensaje);
            $('#Tipo_Estimulo').val('');
            $('#Valor_Estimulo').val('');
        },
        error: function (xhr) {        
            console.log('err');
            console.log(xhr);
            $("#mensajeIncorrectoTres").empty();
            if(xhr.responseJSON.Tipo_Estimulo){ ValidacionDeportiva('Tipo_Estimulo', xhr.responseJSON.Tipo_Estimulo);}else{Normal('Tipo_Estimulo');}
            if(xhr.responseJSON.Valor_Estimulo){ ValidacionDeportiva('Valor_Estimulo', xhr.responseJSON.Valor_Estimulo);}else{Normal('Valor_Estimulo');}
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