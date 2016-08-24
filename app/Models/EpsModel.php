<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EpsModel extends Model
{
    protected $table = 'eps';
    protected $primaryKey = 'Id_Eps';
    protected $fillable = ['Nombre_Eps'];
    protected $connection = '';

    public $timestamps = false;
    
    public function __construct()
    {
        $this->connection = 'db_principal';
    }
}