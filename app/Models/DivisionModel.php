<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DivisionModel extends Model
{
    protected $table = 'tb_srd_division';
    protected $primaryKey = 'PK_I_ID_DIVISION';
    protected $fillable = ['FK_I_ID_MODALIDAD', 'V_NOMBRE_DIVISION'];    
}
