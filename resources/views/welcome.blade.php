@extends('master')
@section('content')
    <div class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">BIENVENIDO</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <center>
                        <h2> {{$deportista->Primer_Nombre}} {{$deportista->Segundo_Nombre}} {{$deportista->Primer_Apellido}} {{$deportista->Segundo_Apellido}}
                        </h2>
                    </center>                  
                </div>
            </div>
        </div>		    
    </div>
@stop
