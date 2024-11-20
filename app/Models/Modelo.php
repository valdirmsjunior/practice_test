<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_caminhao',
        'cor_caminhao'
    ];

    public function caminhao(): BelongsTo
    {
        return $this->belongsTo(Caminhao::class);
    }
}
