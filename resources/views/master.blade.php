<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      @section('style')
          <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="{{ asset('public/Css/jquery-ui.css') }}" media="screen">    
          <link rel="stylesheet" href="{{ asset('public/Css/bootstrap.min.css') }}" media="screen">   
          <link rel="stylesheet" href="{{ asset('public/Css/sticky-footer.css') }}" media="screen">    
          <link rel="icon" type="image/png" href="{{ asset('public/Img/icono.png') }}" />
      @show
      @section('script')
          <script src="{{ asset('public/Js/General/jquery.js') }}"></script>
          <script src="{{ asset('public/Js/General/jquery-ui.js') }}"></script>
          <script src="{{ asset('public/Js/General/bootstrap.min.js') }}"></script>
          <script src="{{ asset('public/Js/General/main.js') }}"></script>

          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <script type="text/javascript">
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
          </script>
      @show
      <title>Módulo De Deportes</title>
  </head>

  <body>
       <!-- Menu Módulo -->
       <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <a href="{{ URL::to( '/') }}" class="navbar-brand">SIM</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Administración <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="themes">

                  <li ><a href="#" style="color:#1995dc">GESTIÓN USUARIO</a></li>
                  <li class="divider"></li>
                  @if($_SESSION['Usuario'][1] == 1)                  
                    <li class=”{{ Request::is( 'personas') ? 'active' : '' }}”><a href="{{ URL::to( 'personas') }}">Gestión de personas</a></li>
                  @endif
                </ul>
              </li>

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Deportista<span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="download">
                  <li><a href="#" style="color:#1995dc">GESTIÓN DEPORTIVA</a></li>
                  <li class="divider"></li>
                  @if($_SESSION['Usuario'][2] == 1)
                    <li><a href="{{URL::to('DatosDeportista')}}">Gestión de deportistas</a></li>
                  @endif
                  @if($_SESSION['Usuario'][3] == 1)
                    <li><a href="{{URL::to('reportes')}}"> <!--style="color:#1995dc"--> Reportes de deportistas</a></li>                  
                  @endif
                </ul>
              </li>
              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Entrenador<span class="caret"></span></a>
                @if($_SESSION['Usuario'][4] == 1)
                  <ul class="dropdown-menu" aria-labelledby="download">                  
                      <li><a href="{{URL::to('GestionEntrenador')}}">Gestión de entrenadores</a></li>  
                </ul>
              @endif
              </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Buscar">
                </div>                
                <button type="submit" class="btn btn-default">Ir</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="http://www.idrd.gov.co/sitio/idrd/" target="_blank">I.D.R.D</a></li>
              <li><a href="logout">Cerrar Sesión</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- FIN Menu Módulo -->        

      <!-- Contenedor información módulo -->
      </br></br>      
      <div class="container">
          <br>
          <div class="page-header" id="banner">   
            <div class="row">
                <div class="col-md-10 col-xs-8">
                <h1>MÓDULO DE DEPORTES</h1>
                <p class="lead"><h1>Subdirección de Recreación y Deportes</h1></p>
              </div>
              <div class="col-md-2 col-xs-4">
                 <div align="right"> 
                     <img src="public/Img/IDRD.JPG" class="img-responsive"/>
                 </div>                    
              </div>
            </div>
          </div>  
      </div>
      <!-- FIN Contenedor información módulo -->

      <!-- Contenedor panel principal -->
      <div class="container">
          @yield('content')
      </div>        
      <!-- FIN Contenedor panel principal -->
  </body>
</html>











