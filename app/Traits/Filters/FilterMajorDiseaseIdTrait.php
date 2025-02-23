<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterMajorDiseaseIdTrait
{
    /**
     * Filter by  Major Disease Id.
     *
     * @param integer $majorDiseaseId  Major Disease Id.
     *
     * @return Builder
     */
    protected function majorDiseaseId(int $majorDiseaseId): Builder
    {
        return $this->builder->where('major_disease_id', $majorDiseaseId);
    }
}