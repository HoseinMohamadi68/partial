<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterRequiredVisaTrait
{
    /**
     * @param boolean $requiredVisa Required Visa.
     *
     * @return Builder
     */
    public function requiredVisa(bool $requiredVisa): Builder // phpcs:ignore
    {
        if ($requiredVisa) {
            return $this->builder->whereRequiredVisa();
        }

        return $this->builder->whereNotRequiredVisa();
    }
}
