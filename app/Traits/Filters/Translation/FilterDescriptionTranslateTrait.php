<?php

namespace App\Traits\Filters\Translation;

use Illuminate\Database\Eloquent\Builder;

trait FilterDescriptionTranslateTrait
{
    /**
     * Filter By Name.
     *
     * @param string $description Description.
     * @return Builder
     */
    public function description(string $description): Builder
    {
        return $this->builder->whereHas('translations', function ($query) use ($description) {
            return $query->whereDescriptionLike($description);
        });
    }
}
