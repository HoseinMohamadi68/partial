<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterStatusTrait
{
    /**
     * @param string $status Status.
     *
     * @return Builder
     */
    public function status(string $status): Builder
    {
        return $this->builder->whereStatus($status);
    }

    /**
     * @param array $status Status.
     *
     * @return Builder
     */
    public function statusIn(array $status): Builder
    {
        return $this->builder->whereStatusIn($status);
    }

    /**
     * @param array $status Status.
     *
     * @return Builder
     */
    public function statusNotIn(array $status): Builder
    {
        return $this->builder->whereStatusNotIn($status);
    }
}
