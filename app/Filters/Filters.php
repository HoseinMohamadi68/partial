<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

abstract class Filters
{
    protected Request $request;
    protected Builder $builder;
    protected array $filters = [];
    public array $attributes = [];
    public array $orderByColumns = [];
    public array $filterLinks = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function generateFilterLinks(): array
    {
        $output = [];
        foreach ($this->filters as $filter) {
            $model = Str::endsWith($filter, 'Ids') ? Str::replaceLast('Ids', '', $filter) : Str::replaceLast(
                'Id',
                '',
                $filter
            );
            $pluralModel = Str::plural(Str::snake($model, '-'));
            $routeName = $pluralModel . '.index';

            $output[$filter] = Route::has($routeName) ? $pluralModel : (Route::has(
                Str::singular($pluralModel) . '.index'
            ) ? Str::singular($pluralModel) : null);
        }
        return $output;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $type = $this->attributes[$filter];
                if ($type == 'boolean') {
                    $value = $value === 'true';
                } elseif ($type == 'array' && is_array($value) && empty($value)) {
                    continue;
                }
                settype($value, $type);
                $this->$filter($value);
            }
        }

        if ($this->request->filled('orderBy')) {
            $this->orderBy($this->request->orderBy);
        }

        if ($this->request->filled('search')) {
            $this->searchOnAllColumns($this->request->search, $builder->getModel());
        }

        return $this->builder;
    }

    public function getFilters(): array
    {
        return array_filter($this->request->only($this->filters), function ($item) {
            return !is_null($item);
        });
    }

    protected function orderBy($orders)
    {
        if (!is_array($orders)) {
            $orders = json_decode($orders, true);
        }

        return $this->builder->when(!empty($orders), function ($query) use ($orders) {
            foreach ($orders as $key => $order) {
                if (!in_array($key, $this->orderByColumns) && !Str::contains($key, '.')) {
                    continue;
                }
                $query->orderBy($key, $order);
            }
        });
    }

    private function searchOnAllColumns(string $search, $model)
    {
        $this->builder->where(function ($query) use ($search, $model) {
            $allColumns = Schema::getColumnListing($model->getTable());
            foreach ($allColumns as $column) {
                $query->orWhere($column, 'LIKE', "%$search%");
            }
        });
    }
}
