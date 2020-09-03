<?php

namespace App\Permisos;

use App\Permiso;
use App\Rol;

trait HasPermisosTrait {

   public function givePermisosTo(... $permisos) {

    $permisos = $this->getAllPermisos($permisos);
    dd($permisos);
    if($permisos === null) {
      return $this;
    }
    $this->permisos()->saveMany($permisos);
    return $this;
  }

  public function withdrawPermisosTo( ... $permisos ) {

    $permisos = $this->getAllPermisos($permisos);
    $this->permisos()->detach($permisos);
    return $this;

  }

  public function refreshPermisos( ... $permisos ) {

    $this->permisos()->detach();
    return $this->givePermisosTo($permisos);
  }

  public function hasPermisoTo($permiso) {

    return $this->hasPermisoThroughRol($permiso) || $this->hasPermiso($permiso);
  }

  public function hasPermisoThroughRol($permiso) {

    foreach ($permiso->roles as $rol){
      if($this->roles->contains($rol)) {
        return true;
      }
    }
    return false;
  }

  public function hasRol( ... $rol ) {

    foreach ($rol as $rol) {
      if ($this->roles->contains('slug', $rol)) {
        return true;
      }
    }
    return false;
  }

  public function rol() {

    return $this->belongsToMany(Rol::class,'users_roles');

  }
  public function permisos() {

    return $this->belongsToMany(Permiso::class,'users_permisos');

  }
  protected function hasPermiso($permiso) {

    return (bool) $this->permisos->where('slug', $permiso->slug)->count();
  }

  protected function getAllPermisos(array $permisos) {

    return Permiso::whereIn('slug',$permisos)->get();
    
  }

}
