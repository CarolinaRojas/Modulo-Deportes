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
    $('#fInicioDateGeneral').datepicker({        
       format: 'yyyy-mm',
       startView: 'year',
       minViewMode: 'months',
       autoclose: true,   
       endDate : CurrentDate.getFullYear()+'-'+CurrentDate.getMonth(),
    });
    
    $('#fFinDateGeneral').datepicker({
       format: 'yyyy-mm',
       startView: 'year',
       minViewMode: 'months',
       autoclose: true,   
       endDate : CurrentDate.getFullYear()+'-'+CurrentDate.getMonth(),
    });
    
    
    $('[data-toggle="tooltip"]').tooltip('show');
    
    
    $("#BotonReporteGeneral").on('click', function(e){
        Normal('Genero');Normal('Edad');Normal('Localidad');Normal('Agrupacion');Normal('Deporte');Normal('Modalidad');Normal('fInicioGeneral');Normal('fFinGeneral');
        ShowAgrupaciones();
        ShowGenero();
        ShowLocalidad();
    });
    
    $("#Agrupacion").on('change', function(e){
        ShowDeportes(this.value);
    });
    
    $("#Deporte").on('change', function(e){
        ShowModalidades(this.value);
    });
    
    function ShowGenero(){
        $("#Genero").empty();
        $("#Genero").append("<option value=''>Seleccionar</option>");
        $.get("generos", function (generos) {
            $.each(generos, function(i, e){
                    $("#Genero").append("<option value='" +e.Id_Genero + "'>" + e.Nombre_Genero + "</option>");
            });
        });
    }
    
    function ShowLocalidad(){
        $("#Localidad").empty();
        $("#Localidad").append("<option value=''>Seleccionar</option>");
        $.get("localidades", function (localidades) {
            $.each(localidades, function(i, e){
                    $("#Localidad").append("<option value='" +e.Id_Localidad + "'>" + e.Nombre_Localidad + "</option>");
            });
        });
    }
    
    function ShowAgrupaciones(){
        $("#Agrupacion").empty();
        $("#Agrupacion").append("<option value=''>Seleccionar</option>");
        $("#Deporte").empty();
        $("#Deporte").append("<option value=''>Seleccionar</option>");
        $("#Modalidad").empty();
        $("#Modalidad").append("<option value=''>Seleccionar</option>");
        $.get("agrupaciones", function (agrupaciones) {
            $.each(agrupaciones, function(i, e){
                    $("#Agrupacion").append("<option value='" +e.PK_I_ID_AGRUPACION + "'>" + e.V_NOMBRE_AGRUPACION + "</option>");
            });
        });
    }
    
    function ShowDeportes(id){
        $("#Deporte").empty();
        $("#Deporte").append("<option value=''>Seleccionar</option>");
        $("#Modalidad").empty();
        $("#Modalidad").append("<option value=''>Seleccionar</option>");
        $.get("deportes/"+id, function (deportes) {
            $.each(deportes, function(i, e){
                    $("#Deporte").append("<option value='" +e.PK_I_ID_DEPORTE + "'>" + e.V_NOMBRE_DEPORTE + "</option>");
            });
        });
    }
    
    function ShowModalidades(id){
        $("#Modalidad").empty();
        $("#Modalidad").append("<option value=''>Seleccionar</option>");
        $.get("modalidades/"+id, function (modalidades) {
            $.each(modalidades, function(i, e){
                    $("#Modalidad").append("<option value='" +e.PK_I_ID_MODALIDAD + "'>" + e.V_NOMBRE_MODALIDAD + "</option>");
            });
        });
    }
    
    
    
    
});

function DescargaReporteEstimulos(){
    var id = 47;
     $("#mensajeIncorrectoReporte").empty();
     $("#mensaje-incorrecto-reporte").fadeOut();
        Normal('fInicio');
        Normal('fFin');

        var inicio  = document.getElementById("fInicio").value;
        var fin  = document.getElementById("fFin").value;        
        if(!id || !inicio || !fin){
            if(!inicio){                
                ValidacionDeportiva("fInicio", 'Ingrese una fecha de inicio para generar el reporte.');
            }
            if(!fin){
                ValidacionDeportiva("fFin", 'Ingrese una fecha de finalización para generar el reporte.');
            }
            return false;
        }else{
            BuscarReporte(id, inicio, fin) ;
        }
}

function Normal(campo){
    $("#"+campo).css({ 'border-color': '#CCCCCC' });    
    $("#"+campo+"L").css({ 'color': '#555555' });    
}

function ValidacionDeportiva(campo, mensaje){
    $("#"+campo).css({ 'border-color': '#B94A48' });    
    $("#"+campo+"L").css({ 'color': '#B94A48' });    

    var texto = $("#mensajeIncorrectoReporte").html();

    $("#mensajeIncorrectoReporte").html(texto + '<br>' + mensaje);
    $("#mensaje-incorrecto-reporte").fadeIn();
    $('#mensaje-incorrecto-reporte').focus();
}

function Normal(campo){
    $("#"+campo).css({ 'border-color': '#CCCCCC' });    
    $("#"+campo+"L").css({ 'color': '#555555' });    
}

function BuscarReporte(id, inicio, fin){
    location.href = 'HistorialEstimulos/'+id+'/'+inicio+'/'+fin;
}

function ReporteGeneral(){
    Normal('Genero');Normal('Edad');Normal('Localidad');Normal('Agrupacion');Normal('Deporte');Normal('Modalidad');Normal('fInicioGeneral');Normal('fFinGeneral');
    var token = $("#token").val();
    var Genero = $("#Genero").val();
    var Edad = $("#Edad").val();
    var Localidad = $("#Localidad").val();    
    var Agrupacion = $("#Agrupacion").val();
    var Deporte = $("#Deporte").val();
    var Modalidad = $("#Modalidad").val();    
    var inicio  = document.getElementById("fInicioGeneral").value;
    var fin  = document.getElementById("fFinGeneral").value;
    var datos = {
                Genero: Genero,
                Edad: Edad, 
                Localidad: Localidad,
                Agrupacion: Agrupacion,
                Deporte: Deporte,
                Modalidad: Modalidad,
                inicio: inicio,
                fin: fin
                  };
    $.ajax({
        type: 'POST',
        url: 'ReporteGeneral',
        headers: {'X-CSRF-TOKEN': token},
        dataType: 'json',
        data: datos,        
        success: function (xhr) {  
            $("#mensajeIncorrectoReporte").empty();
            $("#mensaje-incorrecto-reporte").fadeOut();
            if(xhr.Genero || xhr.Edad || xhr.Localidad || xhr.Agrupacion || xhr.Deporte || xhr.Modalidad || xhr.inicio || xhr.fin){                    
                if(xhr.Genero){ ValidacionDeportiva('Genero', xhr.Genero);}else{Normal('Genero');}
                if(xhr.Edad){ ValidacionDeportiva('Edad', xhr.Edad);}else{Normal('Edad');}
                if(xhr.Localidad){ ValidacionDeportiva('Localidad', xhr.Localidad);}else{Normal('Localidad');}
                if(xhr.Agrupacion){ ValidacionDeportiva('Agrupacion', xhr.Agrupacion);}else{Normal('Agrupacion');}
                if(xhr.Deporte){ ValidacionDeportiva('Deporte', xhr.Deporte);}else{Normal('Deporte');}
                if(xhr.Modalidad){ ValidacionDeportiva('Modalidad', xhr.Modalidad);}else{Normal('Modalidad');}
                if(xhr.inicio){ ValidacionDeportiva('fInicioGeneral', xhr.inicio);}else{Normal('fInicioGeneral');}
                if(xhr.fin){ ValidacionDeportiva('fFinGeneral', xhr.fin);}else{Normal('fFinGeneral');}

                var scrollPos;                    
                scrollPos = $("#mensajeIncorrectoReporte").offset().top;
                $(window).scrollTop(scrollPos);
                return false;
            }
            console.log('succ');
            console.log(xhr);
        },
        error: function (xhr) {                  

            console.log('err');
            console.log(xhr);              

        }
    });
}

