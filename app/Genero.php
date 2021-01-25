<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use SoftDeletes;

    protected $table = 'generos';

    protected $fillable = [
        'genero',
    ];

    public function empleados()
    {
        return $this->hasMany('App\Empleado');
    }
}
