<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    protected $table = 'empleados';

    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'fechaNacimiento',
        'genero_id',
        'rfc',
        'curp',
        'imss',
        'asentamiento_id',
        'domicilio',
        'tel',
        'email'
    ];

    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }

    public function asentamiento()
    {
        return $this->belongsTo('App\Asentamiento');
    }

    public function contratos()
    {
        return $this->hasMany('App\Contrato');
    }

    public function usuario()
    {
        return $this->hasOne('App\Usuario');
    }
}
