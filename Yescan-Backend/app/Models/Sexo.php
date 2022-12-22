<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use SoftDeletes;
    protected $table = "sexos";
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $fillable =[
        'sexo',
    ];     
}
