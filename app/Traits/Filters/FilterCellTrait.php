<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterCellTrait
{
    /**
     * Filter by mobile.
     *
     * @param string $mobile Mobile.
     *
     * @return Builder
     */
    protected function cell(string $mobile): Builder
    {
        return $this->builder->where('cell','like',$mobile);
    }
}
