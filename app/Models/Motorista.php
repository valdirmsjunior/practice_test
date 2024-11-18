<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorista extends Model
{
    use SoftDeletes, HasFactory;
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
        return $this->belongsToMany(Transportadora::class, 'motorista_transportadoras',
                    'transportadora_id', 'motorista_id');
    }
}
