<?php

namespace App\Exceptions;


class NotFoundException extends BaseException
{
    public function __construct(string $message = "موردی یافت نشد.")
    {
        parent::__construct($message, 404);
    }
}
