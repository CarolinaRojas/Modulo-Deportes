<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeportistaEstimuloModel extends Model
{
    protected $table = 'tb_srd_deportista_estimulo';
    protected $primaryKey = 'PK_I_ID_DEPORTISTA_ESTIMULO';
    protected $fillable = ['FK_I_ID_DEPORTISTA_E', 
                           'FK_I_ID_TIPO_ESTIMULO', 
                           'V_VALOR_ESTIMULO',
                            'I_SMMLV'];
}
