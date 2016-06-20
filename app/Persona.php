<?php

namespace App;

use Idrd\Usuarios\Repo\Persona as MPersona;

class Persona extends MPersona
{
    public function deportista()
    {
        return $this->hasOne('App\DeportistaModel', 'FK_I_ID_PERSONA');
    }
    
    public function entrenador()
    {
        return $this->hasOne('App\EntrenadorModel', 'FK_I_ID_PERSONA');
    }
}
