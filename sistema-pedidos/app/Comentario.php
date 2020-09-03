<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $guarded = [];
    protected $table='comentarios';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Commentario::class,'parent_id')->with('replies.user');
    }
}
