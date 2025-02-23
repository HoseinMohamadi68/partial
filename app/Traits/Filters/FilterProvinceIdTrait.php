<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterProvinceIdTrait
{
    /**
     * Filter by Province Id.
     *
     * @param integer $provinceId Province Id.
     *
     * @return Builder
     */
    protected function provinceId(int $provinceId): Builder
    {
        return $this->builder->whereProvinceId($provinceId);
    }

    /**
     * Filter by Province Ids.
     *
     * @param array $provinceIds Province Ids.
     *
     * @return Builder
     */
    protected function provinceIds(array $provinceIds): Builder
    {
        return $this->builder->whereProvinceIdIn($provinceIds);
    }
}
