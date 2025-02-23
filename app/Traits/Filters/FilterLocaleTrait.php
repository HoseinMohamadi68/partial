<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterLocaleTrait
{
    /**
     * Filter by Address1.
     *
     * @param string $locale Address1.
     *
     * @return Builder
     */
    protected function locale(string $locale): Builder
    {
        return $this->builder->whereLocaleLike($locale);
    }
}
