<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodigoPostal extends Model
{
    use SoftDeletes;

    protected $table = 'codigos_postales';

    protected $fillable = [
        'codigo_postal', 'municipio_id',
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
}
