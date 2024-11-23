<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorista extends Model
{
    use SoftDeletes, HasFactory;

    protected $with = ['caminhoes'];
    protected $fillable = [
        'nome_motorista',
        'cpf_motorista',
        'data_nascimento_motorista',
        'email_motorista'
    ];

    protected $casts = [
        'data_nascimento_motorista' => 'datetime'
    ];

    protected function cpfMotorista(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => preg_replace('/[^0-9]/', '', $value)
        );
    }

    protected function dataNascimentoMotorista(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => substr($value, 6, 4).'-'.substr($value, 3, 2).'-'.substr($value, 0, 2)
        );
    }

    public function caminhoes(): HasMany
    {
        return $this->hasMany(Caminhao::class);
    }

    public function transportadoras(): BelongsToMany
    {
        return $this->belongsToMany(Transportadora::class, 'motorista_transportadoras',
                    'motorista_id', 'transportadora_id');
    }
}
