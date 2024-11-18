<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Motorista extends Model
{
    protected $fillable = [
        'nome_motorista',
        'cpf_motorista',
        'data_nascimento_motorista',
        'email_motorista'
    ];

    public function caminhoes(): HasMany
    {
        return $this->hasMany(Caminhao::class);
    }

    public function transportadoras(): BelongsToMany
    {
        return $this->belongsToMany(Transportadora::class, 'motorista_transportadora',
                    'motorista_id', 'transportadora_id');
    }
}
