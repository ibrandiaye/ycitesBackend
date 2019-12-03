<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable = [
        'titre', 'description', 'latitude','longitude','etat','image','citoyen_id','categorie_id','type'
    ];

    public function citoyen(){
        return $this->belongsTo(Citoyen::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
