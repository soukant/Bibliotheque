<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $primaryKey = 'id_auteur';
    protected $fillable = [
        'nom', 'prenom'
    ];
}
