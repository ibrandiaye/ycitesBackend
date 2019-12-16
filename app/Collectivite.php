<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collectivite extends Model
{
    protected $fillable = [
        'type', 'designation', 'superficie','population','densite','region',
        'latitude','longitude','telephone'
    ];
}
