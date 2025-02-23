<?php


namespace  App\Traits\Filters;


use Illuminate\Database\Eloquent\Builder;

trait FilterUpdatedAtTrait
{
    /**
     * Filter by UpdatedAt.
     *
     * @param string $updatedAt UpdatedAt.
     *
     * @return Builder
     */
    protected function updatedAt(string $updatedAt): Builder
    {
		
        return $this->builder->whereUpdatedAt($updatedAt);
    }

    /**
     * Filter by Freather Than UpdatedAt.
     *
     * @param string $updatedAt UpdatedAt.
     *
     * @return Builder
     */
    public function updatedAtGreaterThan(string $updatedAt): Builder
    {
        return $this->builder->whereUpdatedAtGreaterThan($updatedAt);
    }

    /**
     * Filter by Less Than UpdatedAt.
     *
     * @param string $updatedAt UpdatedAt.
     *
     * @return Builder
     */
    public function updatedAtLessThan(string $updatedAt): Builder
    {
        return $this->builder->whereUpdatedAtLessThan($updatedAt);
    }

    /**
     * Filter by UpdatedAt.
     *
     * @param string $updatedAt UpdatedAt.
     *
     * @return Builder
     */
    public function startUpdatedAt(string $updatedAt): Builder
    {
        return $this->builder->whereDate('updated_at', '>=', $updatedAt);
    }

    /**
     * Filter by UpdatedAt.
     *
     * @param string $updatedAt UpdatedAt.
     *
     * @return Builder
     */
    public function endUpdatedAt(string $updatedAt): Builder
    {
        return $this->builder->whereDate('updated_at', '<=', $updatedAt);
    }
}
