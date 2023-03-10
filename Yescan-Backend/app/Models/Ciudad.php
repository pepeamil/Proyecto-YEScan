<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use SoftDeletes;
    protected $table = "ciudades";
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $fillable =[
        'nombre_ciudad',
        'provincia_id'
    ];        
}
 