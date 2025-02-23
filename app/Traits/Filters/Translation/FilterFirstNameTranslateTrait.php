<?php

namespace App\Traits\Filters\Translation;

use App\Models\Translations\LeaderTranslation;
use Illuminate\Database\Eloquent\Builder;

trait FilterFirstNameTranslateTrait
{
    /**
     * Filter By First Name.
     *
     * @param string $firstName First Name.
     * @return Builder
     */
    public function firstName(string $firstName): Builder
    {
        return $this->builder->whereHas('translations', function ($query) use ($firstName) {
            return $query->where(LeaderTranslation::FIRST_NAME,'like','%'.$firstName.'%');
        });
    }
}
