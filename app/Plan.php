<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $table = 'planes';

    protected $fillable = [
        'empresa_id',
        'cliente_id',
        'nombre',
        'inicia',
        'termina',
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function contratos()
    {
        return $this->hasMany('App\Contrato');
    }
}
