<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubDeportivoModel extends Model
{
    protected $table = 'TB_SRD_CLUB_DEPORTIVO';
    protected $primaryKey = 'PK_I_ID_CLUB_DEPORTIVO';
    protected $fillable = ['V_NOMBRE_CLUB_DEPORTIVO'];
}
