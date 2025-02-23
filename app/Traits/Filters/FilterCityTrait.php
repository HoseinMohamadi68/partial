<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterCityTrait
{
    /**
     * Filter by City.
     *
     * @param string $city City.
     *
     * @return Builder
     */
    protected function city(string $city): Builder
    {
        return $this->builder->where('city','like','%'.$city.'%');
    }
}
