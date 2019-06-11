<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = 'ingrediente';

    public $timestamps = false;

    protected $fillable = [
        'nome'
    ];
}
