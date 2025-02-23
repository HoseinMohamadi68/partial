<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterNationalityTrait
{
    /**
     * Filter by name.
     *
     * @param string $nationality Nationality.
     *
     * @return Builder
     */
    protected function nationality(string $nationality): Builder
    {
        return $this->builder->where('nationality','like',$nationality);
    }
}
