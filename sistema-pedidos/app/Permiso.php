<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    public function roles() {

        return $this->belongsToMany(Rol::class,'roles_permisos');
            
     }
     
     public function users() {
     
        return $this->belongsToMany(User::class,'users_permisos');
            
     }
}
