<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterDomainTrait
{
    /**
     * Filter by name.
     *
     * @param string $domain  Domain.
     *
     * @return Builder
     */
    protected function domain(string $domain): Builder
    {
        return $this->builder->where('domain','like','%'.$domain.'%');
    }
}
