<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    protected $fillable = [
        'titre', 'description','image','id_user'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
