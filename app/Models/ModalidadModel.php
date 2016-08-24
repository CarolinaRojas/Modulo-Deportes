<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalidadModel extends Model
{
    protected $table = 'tb_srd_modalidad';
    protected $primaryKey = 'PK_I_ID_MODALIDAD';
    protected $fillable = ['FK_I_ID_DEPORTE', 'V_NOMBRE_MODALIDAD'];
    
    public static function getModalidadesJSON($id){
        return ModalidadModel::where('FK_I_ID_DEPORTE', '=', $id)
                ->get();
    }
}
