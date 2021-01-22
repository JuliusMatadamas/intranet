<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $table = 'empresas';

    protected $fillable = [
        'nombre_largo', 'nombre_corto', 'asentamiento_id',
    ];

    public function asentamiento()
    {
        return $this->belongsTo('App\Asentamiento');
    }
}
