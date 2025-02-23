<?php

namespace  App\Traits\Filters;

use App\Models\Profile\Leader;
use Illuminate\Database\Eloquent\Builder;

trait FilterPassportNumberTrait
{
    /**
     * Filter by National Number.
     *
     * @param string $passportNumber Passport Number.
     *
     * @return Builder
     */
    protected function passportNumber(string $passportNumber): Builder
    {
        return $this->builder->where(Leader::PASSPORT_NUMBER, 'like', '%'.$passportNumber.'%');
    }
}
