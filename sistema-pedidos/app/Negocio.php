<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    protected $table='negocios';
    protected $fillable = ['nombre','correo','telefono','ruc','avatar','user_id'];

    public function user() 
    {
        return $this->belongsTo(User::class,'users_negocios');  
    }

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'commentable')->whereNull('parent_id');
    }
}
