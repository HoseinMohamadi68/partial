<?php

namespace App\Filters\Order;

use App\Filters\Filters;
use App\Traits\Filters\FilterIdsTrait;

class OrderFilter extends Filters
{
    use FilterIdsTrait;

    protected array $filters = [
        'ids',
    ];

    public array $attributes = [
        'ids' => 'array',
    ];

    public array $orderByColumns = [
        'id',
    ];
}

