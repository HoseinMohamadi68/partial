<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FiltersInterface
{
    /**
     * Apply the filters.
     *
     * @param  Builder $builder Builder.
     *
     * @return Builder
     */
    public function apply(Builder $builder): Builder;
}
