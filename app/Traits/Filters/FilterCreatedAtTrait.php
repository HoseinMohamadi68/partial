<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterCreatedAtTrait
{
    /**
     * Filter by CreatedAt.
     *
     * @param string $createdAt CreatedAt.
     *
     * @return Builder
     */
    protected function createdAt(string $createdAt): Builder
    {
        return $this->builder->whereCreatedAt($createdAt);
    }

    /**
     * Filter by Freather Than CreatedAt.
     *
     * @param string $createdAt CreatedAt.
     *
     * @return Builder
     */
    public function createdAtGreaterThan(string $createdAt): Builder
    {
        return $this->builder->whereCreatedAtGreaterThan($createdAt);
    }

    /**
     * Filter by Less Than CreatedAt.
     *
     * @param string $createdAt CreatedAt.
     *
     * @return Builder
     */
    public function createdAtLessThan(string $createdAt): Builder
    {
        return $this->builder->whereCreatedAtLessThan($createdAt);
    }

    /**
     * Filter by CreatedAt.
     *
     * @param string $createdAt CreatedAt.
     *
     * @return Builder
     */
    public function startCreatedAt(string $createdAt): Builder
    {
        return $this->builder->whereDate('created_at', '>=', $createdAt);
    }

    /**
     * Filter by CreatedAt.
     *
     * @param string $createdAt CreatedAt.
     *
     * @return Builder
     */
    public function endCreatedAt(string $createdAt): Builder
    {
        return $this->builder->whereDate('created_at', '<=', $createdAt);
    }
}
