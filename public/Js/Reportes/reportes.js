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
    
    function Limpiar(){
        $("#mensajeIncorrectoReporte").empty();
        $("#mensaje-incorrecto-reporte").fadeOut();
        Normal('Genero');Normal('Edad');Normal('Localidad');  Normal('Tipo_Deportista'); Normal('EtapaNacional'); Normal('EtapaInternacional');Normal('Agrupacion');Normal('Deporte');Normal('Modalidad');Normal('fInicioGeneral');Normal('fFinGeneral');
        
        Normal('fInicio');
        Normal('fFin');
    }
    
    $("#HistorialDeportistas").on('click', function(e){
        Limpiar();
    });
    
    $("#BotonReporteGeneral").on('click', function(e){
        ShowAgrupaciones();
        ShowGenero();
        ShowLocalidad();
        ShowTipoDeportista();
    });
    
    $("#Agrupacion").on('change', function(e){
        ShowDeportes(this.value);
    });
    
    $("#Deporte").on('change', function(e){
        ShowModalidades(this.value);
    });
    
    $("#Tipo_Deportista").on('change', function(e){
        ShowEtapas(this.value);
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
    
    function ShowTipoDeportista(){
        $("#Tipo_Deportista").empty();
        $("#Tipo_Deportista").append("<option value=''>Seleccionar</option>");
        $.get("tipoDeportistas", function (tipoDeportista) {
            $.each(tipoDeportista, function(i, e){
                    $("#Tipo_Deportista").append("<option value='" +e.PK_I_ID_TIPO_DEPORTISTA + "'>" + e.V_NOMBRE_TIPO_DEPORTISTA + "</option>");
            });
        });
    }
    
    function ShowEtapas(id_tipo_deportista) {      
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
            });

            $.get("getEtapasInter/" + id_tipo_etapa_inter + "", function (response) {
                $("#EtapaInternacional").empty();
                    $("#EtapaInternacional").append("<option value=''>Seleccionar</option>");
                    $.each(response, function(i, e){
                        $('#EtapaInternacional').append('<option value="'+ e.PK_I_ID_ETAPA +'">'+ e.V_NOMBRE_ETAPA +'</option>');
                    });
            });        
        }
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

function ValidacionReporteGeneral(){
    $("#mensajeIncorrectoReporte").empty();
    $("#mensaje-incorrecto-reporte").fadeOut();
    
    Normal('Genero');Normal('Edad');Normal('Localidad'); Normal('Tipo_Deportista'); Normal('EtapaNacional'); Normal('EtapaInternacional'); Normal('Agrupacion');Normal('Deporte');Normal('Modalidad');Normal('fInicioGeneral');Normal('fFinGeneral');
    var token = $("#token").val();
    var Genero = $("#Genero").val();
    var Edad = $("#Edad").val();
    var Localidad = $("#Localidad").val();  
    var Tipo_Deportista = $("#Tipo_Deportista").val();
    var EtapaNacional = $("#EtapaNacional").val();
    var EtapaInternacional = $("#EtapaInternacional").val();
    var Agrupacion = $("#Agrupacion").val();
    var Deporte = $("#Deporte").val();
    var Modalidad = $("#Modalidad").val();    
    var inicio  = document.getElementById("fInicioGeneral").value;
    var fin  = document.getElementById("fFinGeneral").value;
    var datos = {
                Genero: Genero,
                Edad: Edad, 
                Localidad: Localidad,
                Tipo_Deportista: Tipo_Deportista,
                EtapaNacional: EtapaNacional,
                EtapaInternacional: EtapaInternacional,
                Agrupacion: Agrupacion,
                Deporte: Deporte,
                Modalidad: Modalidad,
                inicio: inicio,
                fin: fin
                  };
    var conEnt =[];
    conEnt[0] = Genero;
    conEnt[1] = Edad;
    conEnt[2] = Localidad;
    conEnt[3] = Agrupacion;
    conEnt[4] = Deporte;
    conEnt[5] = Modalidad;
    conEnt[6] = inicio;
    conEnt[7] = fin;
    conEnt[8] = Tipo_Deportista;
    conEnt[9] = EtapaNacional;
    conEnt[10] = EtapaInternacional;
    
    $.ajax({
        type: 'POST',
        url: 'ValidacionReporteGeneral',
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
                if(xhr.Tipo_Deportista){ ValidacionDeportiva('Tipo_Deportista', xhr.Tipo_Deportista);}else{Normal('Tipo_Deportista');}
                if(xhr.EtapaNacional){ ValidacionDeportiva('EtapaNacional', xhr.EtapaNacional);}else{Normal('EtapaNacional');}
                if(xhr.EtapaInternacional){ ValidacionDeportiva('EtapaInternacional', xhr.EtapaInternacional);}else{Normal('EtapaInternacional');}
                if(xhr.Agrupacion){ ValidacionDeportiva('Agrupacion', xhr.Agrupacion);}else{Normal('Agrupacion');}
                if(xhr.Deporte){ ValidacionDeportiva('Deporte', xhr.Deporte);}else{Normal('Deporte');}
                if(xhr.Modalidad){ ValidacionDeportiva('Modalidad', xhr.Modalidad);}else{Normal('Modalidad');}
                if(xhr.inicio){ ValidacionDeportiva('fInicioGeneral', xhr.inicio);}else{Normal('fInicioGeneral');}
                if(xhr.fin){ ValidacionDeportiva('fFinGeneral', xhr.fin);}else{Normal('fFinGeneral');}

                var scrollPos;                    
                scrollPos = $("#mensajeIncorrectoReporte").offset().top;
                $(window).scrollTop(scrollPos);
                return false;
            }else{
                if(xhr.Mensaje == 'validator ok'){
                    location.href = 'DRepoGeneral/'+49+'/'+conEnt;
                }else{
                    console.log('no');
                }
            }
        },
        error: function (xhr){
            console.log('err');
            console.log(xhr);              

        }
    });
}