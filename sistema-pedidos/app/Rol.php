<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='roles';
    public function permisos() {

        return $this->belongsToMany(Permiso::class,'roles_permisos');
            
     }
     
     public function users() {
     
        return $this->belongsToMany(User::class,'users_roles');
            
     }
}

