<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asentamiento extends Model
{
    use SoftDeletes;

    protected $table = 'asentamientos';

    protected $fillable = [
        'asentamiento', 'codigo_postal_id',
    ];

    public function codigoPostal()
    {
        return $this->belongsTo('App\CodigoPostal');
    }
}
