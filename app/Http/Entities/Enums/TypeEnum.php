<?php

namespace App\Http\Entities\Enums;

use InvalidArgumentException;

enum TypeEnum: int
{
    case SELL = 0;
    case BUY = 1;

    public static function getTypeOrder(string $status): int
    {
        return match (strtolower($status)) {
            'sell' => self::SELL->value,
            'buy' => self::BUY->value,
            default => throw new InvalidArgumentException("Invalid type: $status"),
        };
    }

    public static function getTypeName(int $value): string
    {
        return match ($value) {
            self::SELL->value => 'sell',
            self::BUY->value => 'buy',
            default => throw new InvalidArgumentException("Invalid type value: $value"),
        };
    }
}
