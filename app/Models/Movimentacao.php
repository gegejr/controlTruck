<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'motorista_id',
        'caminhao_id',
        'eixo_id',
        'pneu_id',
        'empresa_terceirizada_id',
        'tipo_movimentacao',
        'data_movimentacao',
        'observacoes',
    ];

    public function motorista()
    {
        return $this->belongsTo(User::class, 'motorista_id');
    }

    public function caminhao()
    {
        return $this->belongsTo(Caminhao::class);
    }

    public function eixo()
    {
        return $this->belongsTo(Eixo::class);
    }

    public function pneu()
    {
        return $this->belongsTo(Pneu::class);
    }

    public function empresasTerceirizada()
    {
        return $this->belongsTo(EmpresaTerceirizada::class);
    }
}
