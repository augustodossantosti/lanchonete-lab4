<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lanche extends Model
{
    protected $table = 'lanche';
    public $timestamps = false;
    protected $fillable = [
        'nome', 'valor'
    ];

    public function ingredientes()
    {
        return $this->belongsToMany(\App\Models\Ingrediente::class)->withPivot('quantidade');
    }
}
