<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterExpertiseTrait
{
    /**
     * Filter by expertise.
     *
     * @param string $expertise  expertise.
     *
     * @return Builder
     */
    protected function expertise(string $expertise): Builder
    {
        return $this->builder->where('expertise','like','%'.$expertise.'%');
    }
}
