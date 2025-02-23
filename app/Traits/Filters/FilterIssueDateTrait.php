<?php

namespace  App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterIssueDateTrait
{
    /**
     * Filter by Greater Than IssueDate.
     *
     * @param string $issueDate IssueDate.
     *
     * @return Builder
     */
    public function issueDateGreaterThan(string $issueDate): Builder
    {
        return $this->builder->whereIssueDateGreaterThan($issueDate);
    }

    /**
     * Filter by Less Than IssueDate.
     *
     * @param string $issueDate IssueDate.
     *
     * @return Builder
     */
    public function issueDateLessThan(string $issueDate): Builder
    {
        return $this->builder->whereIssueDateLessThan($issueDate);
    }
}
