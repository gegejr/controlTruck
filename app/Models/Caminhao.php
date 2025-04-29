<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminhao extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'modelo',
        'ano',
    ];

    public function eixos()
    {
        return $this->hasMany(Eixo::class);
    }

    public function motoristas()
    {
        return $this->hasMany(User::class);
    }

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }

    public function motorista()
    {
        return $this->hasOne(User::class, 'caminhao_id');
    }

}
