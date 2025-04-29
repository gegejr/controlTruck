<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    use HasFactory;

    protected $fillable = [
        'caminhao_id',
        'eixo_numero',
        'lado',
    ];

    public function caminhao()
    {
        return $this->belongsTo(Caminhao::class);
    }

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }
}
