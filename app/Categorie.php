<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'nom'
    ];
    public function reclamations(){
        return $this->hasMany(Reclamation::class);
    }
}
