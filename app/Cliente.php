<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';

    protected $fillable = [
        'cliente', 'rfc', 'empresa_id', 'asentamiento_id'
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    public function asentamiento()
    {
        return $this->belongsTo('App\Asentamiento');
    }
}
