<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaTerceirizada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nome_resposnavel',
        'telefone',
    ];

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }
}
