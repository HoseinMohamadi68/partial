<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterNickNameTrait
{
    /**
     * Filter by name.
     *
     * @param string $nickName  Nick Name.
     *
     * @return Builder
     */
    protected function nickname(string $nickName): Builder
    {
        return $this->builder->where('nick_name','like','%'.$nickName.'%');
    }
}
