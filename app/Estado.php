<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;

    protected $table = 'estados';

    protected $fillable = [
        'estado', 'pais_id',
    ];

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }

    public function municipios()
    {
        return $this->hasMany('App\Municipio');
    }
}
