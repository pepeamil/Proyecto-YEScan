<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use SoftDeletes;
    protected $table = "consultas";
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $fillable =[
        'nombre',
        'apellido',
        'email',
        'mensaje'
    ];    
}
