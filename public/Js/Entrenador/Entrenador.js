$(function(e){ 
    //buscar(e);
    var $personas_actuales = $('#personas').html();    
    var URL = $('#main_persona').data('url');    
    
    var reset = function(e){        
      
        $('#buscar span').removeClass('glyphicon-remove').addClass('glyphicon-search');
        $('#personas').html($personas_actuales);
        $('#paginador').fadeIn();
    }; 
    
    $('#buscar').on('click', function(e){
      var role = $(this).data('role');
      switch(role)
      {
        case 'buscar':
          $(this).data('role', 'reset');
          buscar(e);
        break;

        case 'reset':
          $(this).data('role', 'buscar');
          reset(e);
        break;
      }
    });
});

function buscar(e){
    var key = $('input[name="buscador"]').val();
    if (key.length > 2){
        $('#buscar span').removeClass('glyphicon-search').addClass('glyphicon-remove');
        $('#buscar').data('role', 'reset');

        $.get(
            'personaBuscarDeportista/'+key,{}, 
          function(data){              
            if(data.length > 0){
              var html = '';
              $.each(data, function(i, e){                                          
                     $.get("deportista/" + e['Id_Persona'] + "", function (response) {
                         html += '<li class="list-group-item" style="border:0">'+
                                    '<br>'+                                                     
                                      '<div class="row">'+
                                          '<h4 class="list-group-item-heading">'+
                                              ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                          '<p class="list-group-item-text">'+
                                          '<small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small>'+
                                      '</dvi><br><br><br>';
                        if(response.deportista){
                                   html +=  '<div class="row">'+
                                                '<div class="pull-left btn-group" role="group" aria-label="Informacion" id="Botonera" name="Botonera">'+
                                                     'Este es un deportista'+
                                                '</div>'+
                                            '</div>';
                        }else{
                            html +=   '<div class="row">'+
                                          '<div class="pull-left btn-group" role="group" aria-label="Informacion" id="Botonera" name="Botonera">'+
                                              '<button type="button" data-role="InformacionBasica" data-rel="'+e['Id_Persona']+'" class="btn btn-primary btn-sm">Información Basica</button>'+
                                          '</div>'+
                                      '</div>';
                        }
                        html += '</li>';
                        
                        $('#personas').html(html);
                        $('#paginador').fadeOut();
                    });
              });              
            }            
          },
          'json'
        )
      } else if(key.length == 0){
        reset(e);
      }
    };