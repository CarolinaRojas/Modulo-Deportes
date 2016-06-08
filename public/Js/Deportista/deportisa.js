$(function(e)
  { 
                var $personas_actuales = $('#personas').html();
                var URL = $('#main_persona').data('url');
                var buscar = function(e)
                {

                  var key = $('input[name="buscador"]').val();
                  if (key.length > 2)
                  {
                    $('#buscar span').removeClass('glyphicon-search').addClass('glyphicon-remove');
                    $('#buscar').data('role', 'reset');

                    $.get(
                      'personaBuscarDeportista/'+key,
                      {}, 
                      function(data)
                      {
                        if(data.length > 0)
                        {
                          var html = '';
                          $.each(data, function(i, e){
                            html += '<li class="list-group-item" style="border:0">'+

                                                '<br>'+                                                     
                                                      '<div class="row">'+
                                                          '<div class="col-xs-12">'+
                                                              '<div class="row">'+
                                                                  '<div class="col-xs-6">'+
                                                                            '<h4 class="list-group-item-heading">'+
                                                                                ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                                                            '<p class="list-group-item-text">'+
                                                                            '<small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small>'+
                                                                  '</div>'+
                                                                  
                                                                  '<div class="col-xs-6 ">'+
                                                                            '<div class="pull-right btn-group" role="group" aria-label="Informacion">'+
                                                                              '<button type="button" data-role="InformacionBasica" data-rel="'+e['Id_Persona']+'" class="btn btn-primary">Información Basica</button>'+
                                                                              '<button type="button" data-role="InformacionDeportiva" data-rel="'+e['Id_Persona']+'" class="btn btn-default">Información Deportiva</button>'+
                                                                              '<button type="button" class="btn btn-primary">Apoyos y servicios</button>'+
                                                                            '</div>'+
                                                                  '</div>'+
                                                              '</div>'+
                                                          '</div>'+
                                                      '</div>'+

                                                  
                                      '</li>';

                              
                                            
                                        
                          });
                          $('#personas').html(html);
                          $('#paginador').fadeOut();
                        }
                      },
                      'json'
                    )
                  } else if(key.length == 0){
                    reset(e);
                  }
                };


                $('#personas').delegate('button[data-role="InformacionBasica"]', 'click', function(e){
                    var id = $(this).data('rel');
                    
                     $.get(
                      'personaDeportista/'+id,
                      {},
                      function(data)
                      { 
                        if(data)
                        {
                          popular_modal_persona(data);
                        }
                      },
                      'json'
                    );
                  });

                $('#personas').delegate('button[data-role="InformacionDeportiva"]', 'click', function(e){
                    var id = $(this).data('rel');
                    
                     $.get(
                      'personaDeportistaDatos/'+id,
                      {},
                      function(data)
                      { 
                        alert(data);
                        if(data)
                        {
                          
                          $('.modal-content').html(data);
                          $('#modal_form_persona').modal('show');

                        }
                      },
                      'json'
                    );
                  });

                $('#buscar').on('click', function(e)
                {
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

                var popular_errores_modal = function(data)
                {
                  $('#form_deportista .form-group').removeClass('has-error');
                  var selector = '';
                  for (var error in data){
                      if (typeof data[error] !== 'function') {
                          switch(error)
                          {
                            case 'uno':
                            case 'dos':
                            case 'tres':
                              selector = 'input';
                            break;

                            case 'Cedula':
                            case 'Primer_Apellido':
                            case 'Primer_Nombre':
                            case 'Fecha_Nacimiento':
                            case 'Id_Genero':
                              selector = 'input';
                            break;
                          }
                          $('#form_deportista '+selector+'[name="'+error+'"]').closest('.form-group').addClass('has-error');
                      }
                  }
                }

          $('#form_deportista').on('submit', function(e){
            
                  $.post(
                    'Deportista/ingreso',
                    $(this).serialize(),
                    function(data){
                      if(data.status == 'error')
                      {
                        popular_errores_modal(data.errors);
                      } else {
                        $('#alerta').show();
                        $('#modal_form_persona').modal('hide');

                        setTimeout(function(){
                          $('#alerta').hide();
                        }, 4000)
                      }
                    },
                    'json'
                  );

                  e.preventDefault();
          });



          var reset = function(e)
                {
                  $('input[name="buscador"]').val('');
                  $('#buscar span').removeClass('glyphicon-remove').addClass('glyphicon-search');
                  $('#personas').html($personas_actuales);
                  $('#paginador').fadeIn();
                };


                var popular_modal_persona = function(persona)
                {
                  var nombreDeportista="";
                  var cedulaDeportista="";
                 
                  nombreDeportista=$.trim(persona['Primer_Apellido'])+' '+$.trim(persona['Segundo_Apellido'])+' '+$.trim(persona['Primer_Nombre'])+' '+$.trim(persona['Segundo_Nombre']);
                  $('p[name="Cedula"]').val($.trim(persona['Cedula']));
                  cedulaDeportista=$.trim(persona['Cedula']);
                  

                  document.getElementById("titulo").innerHTML= "INFORMACIÓN BASICA";
                  document.getElementById("nombreDeport").innerHTML= nombreDeportista.toUpperCase();
                  document.getElementById("Cedula").innerHTML=cedulaDeportista;
                  
                  $('input[name="Id_Pais"]').val($.trim(persona['Id_Pais']));
                  $('input[name="Fecha_Nacimiento"]').val($.trim(persona['Fecha_Nacimiento']));
                  $('input[name="Nombre_Ciudad"]').val($.trim(persona['Nombre_Ciudad']));

                  
                  $('#modal_form_persona').modal('show');
                };


 });