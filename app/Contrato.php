<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use SoftDeletes;

    protected $table = 'contratos';

    protected $fillable = [
        'empleado_id',
        'plan_id',
        'puesto_id',
        'sueldo',
        'alta',
        'baja'
    ];

    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }

    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }

    public function puesto()
    {
        return $this->belongsTo('App\Puesto');
    }
}
