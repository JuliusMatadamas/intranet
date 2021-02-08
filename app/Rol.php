<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	protected $table = 'roles';

	public function usuarios()
    {
    	return $this->belongsToMany(Usuario::class)->withTimestamps();
    }
}
