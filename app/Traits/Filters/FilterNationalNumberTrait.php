<?php

namespace  App\Traits\Filters;

use App\Models\Profile\Leader;
use Illuminate\Database\Eloquent\Builder;

trait FilterNationalNumberTrait
{
    /**
     * Filter by National Number.
     *
     * @param string $nationalNumber National Number.
     *
     * @return Builder
     */
    protected function nationalNumber(string $nationalNumber): Builder
    {
        return $this->builder->where(Leader::NATIONAL_NUMBER, 'like', '%'.$nationalNumber.'%');
    }
}
