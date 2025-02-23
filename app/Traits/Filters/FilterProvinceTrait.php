<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterProvinceTrait
{
    /**
     * Filter by name.
     *
     * @param string $province  Name.
     *
     * @return Builder
     */
    protected function province(string $province): Builder
    {
        return $this->builder->where('province',$province);
    }
}
