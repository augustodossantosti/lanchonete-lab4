<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    public $timestamps = false;
    protected $fillable = [
        'cpf', 'valor_total'
    ];

    public function lanches()
    {
        return $this->belongsToMany(\App\Lanche::class)->withPivot('quantidade', 'subtotal');
    }
}
