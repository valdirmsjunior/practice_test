<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportadora extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'nome_transportadora',
        'cnpj_transportadora',
        'status_transportadora'
    ];

    public function motoristas(): BelongsToMany
    {
        return $this->belongsToMany(Motorista::class, 'motorista_transportadoras',
                    'motorista_id', 'transportadora_id');
    }
}
