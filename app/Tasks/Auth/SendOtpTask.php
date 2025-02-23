<?php

namespace App\Tasks\Auth;

use App\Commands\Auth\RegisterOrLoginUserCommand;
use App\Commands\Auth\SendOtpCommand;
use App\Models\User\User;
use Closure;

class SendOtpTask
{
    private SendOtpCommand $sendOtpCommand;

    private RegisterOrLoginUserCommand $registerOrLoginUserCommand;

    public function __construct(SendOtpCommand $sendOtpCommand, RegisterOrLoginUserCommand $registerOrLoginUserCommand)
    {
        $this->sendOtpCommand = $sendOtpCommand;
        $this->registerOrLoginUserCommand = $registerOrLoginUserCommand;
    }

    public function __invoke(object $payload, Closure $next): User
    {
        if(!$payload->user) {

            $payload->user = $this->registerOrLoginUserCommand->handle($payload);
        }
           $user = $this->sendOtpCommand->handle($payload);


        return $next($user);
    }
}
