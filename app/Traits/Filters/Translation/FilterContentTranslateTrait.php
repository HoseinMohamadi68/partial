<?php

namespace App\Traits\Filters\Translation;

use Illuminate\Database\Eloquent\Builder;

trait FilterContentTranslateTrait
{
    /**
     * Filter By Name.
     *
     * @param string $content Content.
     * @return Builder
     */
    public function content(string $content): Builder
    {
        return $this->builder->whereHas('translations', function ($query) use ($content) {
            return $query->whereContentLike($content);
        });
    }
}
