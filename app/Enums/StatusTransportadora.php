<?php

namespace App\Enums;

enum StatusTransportadora: int
{
    case ENABLE = 1;
    case DISABLE = 0;

    public function label(): string
    {
        return match ($this) {
            self::ENABLE => 'Ativo',
            self::DISABLE => 'Desativado',
        };
    }
}
