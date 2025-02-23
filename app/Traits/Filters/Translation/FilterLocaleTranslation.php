<?php

namespace App\Traits\Filters\Translation;

use Illuminate\Database\Eloquent\Builder;

trait FilterLocaleTranslation
{
    /**
     * @param string $locale Locale.
     * @return Builder
     */
    public function locale(string $locale): Builder
    {
        return $this->builder->whereHas('translations', function ($query) use ($locale) {
            return $query->whereLocale($locale);
        });
    }
}
