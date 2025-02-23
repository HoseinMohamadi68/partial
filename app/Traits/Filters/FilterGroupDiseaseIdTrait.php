<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterGroupDiseaseIdTrait
{
    /**
     * Filter by  Group Disease Id.
     *
     * @param integer $groupDiseaseId  Group Disease Id.
     *
     * @return Builder
     */
    protected function groupDiseaseId(int $groupDiseaseId): Builder
    {
        return $this->builder->where('group_disease_id',$groupDiseaseId);
    }
}