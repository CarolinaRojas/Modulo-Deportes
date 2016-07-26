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
    $('[data-toggle="tooltip"]').tooltip('show');
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
function BuscarReporte(id, inicio, fin){
    location.href = 'HistorialEstimulos/'+id+'/'+inicio+'/'+fin;
}