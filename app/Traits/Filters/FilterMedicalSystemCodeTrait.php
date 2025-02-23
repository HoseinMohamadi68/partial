<?php

namespace  App\Traits\Filters;

use App\Models\Profile\Doctor;
use Illuminate\Database\Eloquent\Builder;

trait FilterMedicalSystemCodeTrait
{
    /**
     * Filter by Medical System Code.
     *
     * @param string $medicalSystemCode Medical_System_Code.
     *
     * @return Builder
     */
    protected function medicalSystemCode(string $medicalSystemCode): Builder
    {
        return $this->builder->where(Doctor::MEDICAL_SYSTEM_CODE,'like','%'.$medicalSystemCode.'%');
    }
}
