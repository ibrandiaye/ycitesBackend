<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citoyen extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'telephone','email'
    ];
    public function reclamations(){
        return $this->hasMany(Reclamation::class);
    }
}
