<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsable extends Model
{
    use SoftDeletes;
    protected $table = "responsables";
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $fillable =[
        'email',
        'dni',
        'pass',
        'id_ciudad'
    ];
}
