<?php

namespace App\Models;

use App\Enums\StatusTransportadora;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportadora extends Model
{
    use SoftDeletes, HasFactory;

    protected $with = ['motoristas'];
    protected $fillable = [
        'nome_transportadora',
        'cnpj_transportadora',
        'status_transportadora'
    ];

    protected $casts = [
        'status_transportadora' => StatusTransportadora::class,
    ];

    protected function cnpjTransportadora(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => preg_replace('/[^0-9]/', '', $value)
        );
    }

    public function motoristas(): BelongsToMany
    {
        return $this->belongsToMany(Motorista::class, 'motorista_transportadoras',
                    'transportadora_id', 'motorista_id');
    }
}
