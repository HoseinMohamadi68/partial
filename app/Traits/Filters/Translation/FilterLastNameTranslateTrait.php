<?php

namespace App\Traits\Filters\Translation;

use App\Models\Translations\LeaderTranslation;
use Illuminate\Database\Eloquent\Builder;

trait FilterLastNameTranslateTrait
{
    /**
     * Filter By Last Name.
     *
     * @param string $lastName Last Name.
     * @return Builder
     */
    public function lastName(string $lastName): Builder
    {
        return $this->builder->whereHas('translations', function ($query) use ($lastName) {
            return $query->where(LeaderTranslation::LAST_NAME,'like','%'.$lastName.'%');
        });
    }
}
