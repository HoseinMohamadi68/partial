<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterCountryIdTrait
{
    /**
     * Filter by Country Id.
     *
     * @param integer $countryId Country Id.
     *
     * @return Builder
     */
    protected function countryId(int $countryId): Builder
    {
        return $this->builder->where('country_id',$countryId);
    }

    /**
     * Filter by Country Ids.
     *
     * @param array $countryIds Country Ids.
     *
     * @return Builder
     */
    protected function countryIds(array $countryIds): Builder
    {
        return $this->builder->whereCountryIdIn($countryIds);
    }
}
