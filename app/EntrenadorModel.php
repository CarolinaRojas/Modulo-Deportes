<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntrenadorModel extends Model
{
    protected $table = 'TB_SRD_ENTRENADOR';
    protected $primaryKey = 'PK_I_ID_ENTRENADOR';
    protected $fillable = [
        'FK_I_ID_PERSONA',
        'V_TELEFONO'
        ];
    
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'FK_I_ID_PERSONA');
    }
}
