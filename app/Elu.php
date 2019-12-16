<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elu extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'telephone','email','photo','fonction','profession','genre'
    ];
}
