<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pneu extends Model
{
    use HasFactory;

    protected $fillable = [
        'medida',
        'marca',
        'modelo',
        'tipo',
        'status',
    ];

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }

    public function getDescricaoAttribute()
    {
        return "{$this->marca} / {$this->modelo} ({$this->medida})";
    }
}
