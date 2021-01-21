<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $primaryKey = 'id_genre';
    protected $fillable = [
        'genre'
    ];
}
