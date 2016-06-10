<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalidadModel extends Model
{
    protected $table = 'localidad';
    protected $primaryKey = 'Id_Localidad';
    protected $fillable = ['Nombre_Localidad'];
    protected $connection = '';

    public $timestamps = false;
    
    public function __construct()
    {
        $this->connection = 'db_principal';
    }
}
