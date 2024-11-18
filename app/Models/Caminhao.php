<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caminhao extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'placa_caminhao',
        'motorista_id',
        'modelo_id'
    ];

    public function modelo(): HasOne
    {
        return $this->hasOne(Modelo::class, 'modelo_id');
    }

    public function motorista(): BelongsTo
    {
        return $this->belongsTo(Motorista::class, 'motorista_id');
    }
}
