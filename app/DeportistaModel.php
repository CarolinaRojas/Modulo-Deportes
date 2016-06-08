<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeportistaModel extends Model
{
    protected $table = 'TB_SRD_DEPORTISTA';
    protected $primaryKey = 'PK_I_ID_DEPORTISTA';
    protected $fillable = [
        'FK_I_ID_PERSONA',
        'FK_I_ID_ESTADO_CIVIL',
        'FK_I_ID_ESTRATO',
        'FK_I_ID_GRUPO',
        'FK_I_ID_AGRUPACION',
        'FK_I_ID_DEPORTE',
        'FK_I_ID_MODALIDAD',
        'FK_I_ID_ETAPA',
        'FK_I_ID_TIPO_DEPORTISTA',
        'FK_I_ID_BANCO',
        'V_DIRECCION_RESIDENCIA',
        'V_BARRIO',
        'V_TELEFONO_FIJO',
        'V_TELEFONO_CELULAR',
        'V_CORREO_ELECTRONICO',
        'B_SITUACION_MILITAR',
        'V_CANTIDAD_HIJOS',
        'V_NUMERO_CUENTA'
        ];
}
