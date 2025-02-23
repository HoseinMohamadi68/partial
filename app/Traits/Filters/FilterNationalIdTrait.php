<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterNationalIdTrait
{
    /**
     * Filter by National Id.
     *
     * @param string $nationalId National Id.
     *
     * @return Builder
     */
    protected function nationalId(string $nationalId): Builder
    {
        return $this->builder->whereNationalId($nationalId);
    }
}
