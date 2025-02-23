<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterFullNameTrait
{
    /**
     * Filter by fullName.
     *
     * @param string $fullName  FullName.
     *
     * @return Builder
     */
    protected function fullname(string $fullName): Builder
    {
        return $this->builder->where('full_name','like','%'.$fullName.'%');
    }
}
