<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeporteModel extends Model
{
    protected $table = 'tb_srd_deporte';
    protected $primaryKey = 'PK_I_ID_DEPORTE';
    protected $fillable = ['FK_I_ID_AGRUPACION', 'FK_I_ID_TIPO_DEPORTISTA','V_NOMBRE_DEPORTE'];
    
    
    public static function getDeportesJSON($id, $id_tipo_deportista){
        return DeporteModel::where('FK_I_ID_AGRUPACION', '=', $id)
                ->get();
    }
    
}