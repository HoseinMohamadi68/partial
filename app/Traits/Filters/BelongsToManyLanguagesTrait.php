<?php

namespace  App\Traits\Filters;

use App\Models\Language\Language;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToManyLanguagesTrait
{
    /**
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class);
    }
}
