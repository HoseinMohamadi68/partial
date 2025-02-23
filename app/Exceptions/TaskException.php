<?php

namespace App\Exceptions;


class TaskException extends BaseException
{
    public function __construct(string $message, int $statusCode = 422)
    {
        parent::__construct("Task Error: " . $message, $statusCode);
    }
}
