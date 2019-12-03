<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    protected $fillable = [
        'titre', 'description','image','user_id','type'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
