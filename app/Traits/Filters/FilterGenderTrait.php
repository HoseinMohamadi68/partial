<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterGenderTrait
{
    /**
     * Filter by gender.
     *
     * @param string $gender Gender.
     *
     * @return Builder
     */
    protected function gender(string $gender): Builder
    {
        return $this->builder->where('gender','like',$gender);
    }
}
