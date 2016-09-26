<?php

namespace App\Models;

use Idrd\Usuarios\Repo\Persona as MPersona;

class Persona extends MPersona
{
    public function deportista()
    {
        return $this->hasOne('App\Models\DeportistaModel', 'FK_I_ID_PERSONA');
    }
    
    public function entrenador()
    {
        return $this->hasOne('App\Models\EntrenadorModel', 'FK_I_ID_PERSONA');
    }
}
