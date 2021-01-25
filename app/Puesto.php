<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puesto extends Model
{
    use SoftDeletes;

    protected $table = 'puestos';

    protected $fillable = [
        'puesto',
    ];

    public function contratos()
    {
        return $this->hasMany('App\Contrato');
    }

}
