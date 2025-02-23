<?php

namespace App\Tasks\Auth;

use App\Queries\Auth\FindUserByPhoneQuery;
use Closure;

class CheckUserExistsTask
{
    private FindUserByPhoneQuery $findUserQuery;

    public function __construct(FindUserByPhoneQuery $findUserQuery)
    {
        $this->findUserQuery = $findUserQuery;
    }

    public function __invoke(object $payload, Closure $next): mixed
    {

        $user = $this->findUserQuery->handle($payload);

        $payload->user = $user;

        return $next($payload);
    }

}
