<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'dni','telefono','imagen','direccion', 
        'usuario','password','idrol','estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol(){
        return $this->belongsTo('App\Roles');
    }
    public function proveedores(){
        return $this->belongsToMany('App\Proveedor','compras')->withPivot('numcompra','impuesto','total','estado');
    }
    public function clientes(){
        return $this->belongsToMany('App\Cliente','ventas');
    }
    protected $table='users';
}
