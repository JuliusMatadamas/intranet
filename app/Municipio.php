<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipio extends Model
{
    use SoftDeletes;

    protected $table = 'municipios';

    protected $fillable = [
        'municipio', 'estado_id',
    ];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
