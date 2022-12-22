<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidato extends Model
{
    use SoftDeletes;
    protected $table = "candidatos";
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $fillable =[
        'nombre_candidato',
        'raza',
        'edad',
        'responsable_id',
        'sexo_id'
    ];    
}
