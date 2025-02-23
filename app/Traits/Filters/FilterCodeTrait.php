<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterCodeTrait
{
    /**
     * Filter by Code.
     *
     * @param string $code Code.
     *
     * @return Builder
     */
    protected function code(string $code): Builder
    {
        return $this->builder->where('code', 'like', '%'.$code.'%');
    }
}
