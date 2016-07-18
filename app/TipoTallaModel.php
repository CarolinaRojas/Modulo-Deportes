<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTallaModel extends Model
{
    protected $table = 'tb_srd_tipo_talla';
    protected $primaryKey = 'PK_I_ID_TIPO_TALLA';
    protected $fillable = ['V_NOMBRE_TIPO_TALLA'];
    
    public function tipo_talla(){
        return $this->hasMany('App\TallaModel', 'FK_I_ID_TIPO_TALLA');
    }
}
