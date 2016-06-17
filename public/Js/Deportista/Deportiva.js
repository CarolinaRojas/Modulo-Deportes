$(function(e){   
    $('#personas').delegate('button[data-role="InformacionDeportiva"]', 'click', function(e){    
        var id = $(this).data('rel');
        $.get("deportista/" + id + "", function (response) {
            popular_modal_deportiva(response);
        })
    });   
});

function popular_modal_deportiva(persona){
    console.log(persona);
    var nombreDeportista="";
    var cedulaDeportista="";

    /*nombreDeportista = $.trim(persona['Primer_Apellido'])+'1 '+$.trim(persona['Segundo_Apellido'])+' '+$.trim(persona['Primer_Nombre'])+' '+$.trim(persona['Segundo_Nombre']);
    $('p[name="Cedula"]').val($.trim(persona['Cedula']));
    cedulaDeportista = "CC: "+ $.trim(persona['Cedula']);*/


    document.getElementById("tituloDeportiva").innerHTML= "GESTOR DE FUNCIONARIOS EN EL MÓDULO DE RENDIMIENTO DEPORTIVO";
    document.getElementById("nombreDeport").innerHTML= nombreDeportista.toUpperCase();
    document.getElementById("Cedula").innerHTML=cedulaDeportista;
    $('#modal_form_deportiva').modal('show');
};