<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterIpdTrait
{
    /**
     * @param boolean $active  Active.
     *
     * @return Builder
     */
    public function ipd(bool $active): Builder // phpcs:ignore
    {

        return $this->builder->where('ipd',$active);
    }
}
