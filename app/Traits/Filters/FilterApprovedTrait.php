<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterApprovedTrait
{
    /**
     * @param boolean $approved Approved.
     * @return Builder
     */
    public function used(bool $approved): Builder
    {
        if ($approved) {
            return $this->builder->whereUsed();
        }

        return $this->builder->whereNotUsed();
    }

    /**
     * Filter by approved.
     *
     * @param bool $approved Approved.
     *
     * @return Builder
     */
    protected function approved(bool $approved): Builder
    {
        return $this->builder->whereApproved($approved);
    }
}
