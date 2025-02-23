<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterTitleFaTrait
{
    /**
     * Filter by Title.
     *
     * @param string $titleFa TitleFa.
     *
     * @return Builder
     */
    protected function titleFa(string $titleFa): Builder
    {
        return $this->builder->where('title_fa', 'like', '%'.$titleFa.'%');
    }
}
