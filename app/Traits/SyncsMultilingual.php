<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait SyncsMultilingual
{
    protected function syncMultilingual(Model $model, array $languages): Model
    {
        $model->translations()->delete();
        $model->translations()->createMany($languages);
        return $model->refresh();
    }
}
