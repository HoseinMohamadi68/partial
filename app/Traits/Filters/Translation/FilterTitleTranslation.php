<?php

namespace App\Traits\Filters\Translation;

use Illuminate\Database\Eloquent\Builder;

trait FilterTitleTranslation
{
    /**
     * @param string $title Title.
     *
     * @return Builder
     */
    public function title(string $title): Builder
    {
        return $this->builder->whereHas('translations', function ($query) use ($title) {
            return $query->whereNameLike($title);
        });
    }
}
