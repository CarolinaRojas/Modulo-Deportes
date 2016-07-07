<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubDeportivoModel extends Model
{
    protected $table = 'tb_srd_club_deportivo';
    protected $primaryKey = 'PK_I_ID_CLUB_DEPORTIVO';
    protected $fillable = ['V_NOMBRE_CLUB_DEPORTIVO'];
}
