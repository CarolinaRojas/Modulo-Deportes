<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartamentoModel extends Model
{
    protected $table = 'departamento';
    protected $primaryKey = 'Id_Departamento';
    protected $fillable = ['Nombre_Departamento'];
    protected $connection = '';

    public $timestamps = false;
    
    public function __construct()
    {
        $this->connection = 'db_principal';
    }
}
