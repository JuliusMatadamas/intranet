<?php

namespace App;

use App\Rol;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'empleado_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class)->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $rol) {
                if($this->hasRole($rol)){
                    return true;
                }
            }
        }
        else {
            if($this->hasRole($roles)){
                return true;
            }
        }
    }

    public function hasRole($rol)
    {
        if($this->roles()->where('nombre', $rol)->first()){
            return true;
        }
        return false;
    }
}
