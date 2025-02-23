<?php

namespace App\Http\Entities\Enums;

enum StatusType: int
{
    case PENDING = 0;
    case PARTIALLY_COMPLETED = 1;
    case COMPLETED = 2;

    public static function getStatusType(string $status): StatusType
    {
        return match ($status) {
            'Pending' => self::PENDING,
            'Partially' => self::PARTIALLY_COMPLETED,
            'Completed' => self::COMPLETED,
        };
    }


    public static function getStatusName(int $value): string
    {
        return match ($value) {
            self::PENDING->value => 'Pending',
            self::PARTIALLY_COMPLETED->value => 'Partially',
            self::COMPLETED->value => 'Completed',
        };
    }
}
