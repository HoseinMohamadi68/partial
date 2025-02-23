<?php

namespace  App\Traits\Filters;

use App\Models\Profile\Leader;
use Illuminate\Database\Eloquent\Builder;

trait FilterTrackingCodeTrait
{
    /**
     * Filter by Tracking Code.
     *
     * @param string $trackingCode Tracking Code.
     *
     * @return Builder
     */
    protected function trackingCode(string $trackingCode): Builder
    {
        return $this->builder->where(Leader::TRACKING_CODE, 'like', '%'.$trackingCode.'%');
    }
}
