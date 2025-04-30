<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminhao extends Model
{
    use HasFactory;

    // 👇 Adicione esta linha:
    protected $table = 'caminhoes';

    protected $fillable = [
        'placa',
        'modelo',
        'ano',
        'marca',
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
