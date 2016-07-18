<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallaModel extends Model
{
    protected $table = 'tb_srd_talla';
    protected $primaryKey = 'PK_I_ID_TALLA';
    protected $fillable = ['FK_I_ID_GENERO', 'FK_I_ID_TIPO_TALLA', 'V_EU', 'V_UK', 'V_USA'];
    
    public function genero(){
        return $this->belongsTo('App\Genero', 'FK_I_ID_GENERO');
    }
    public function tipo_talla(){
        return $this->belongsTo('App\TipoTallaModel', 'FK_I_ID_TIPO_TALLA');
    }
}