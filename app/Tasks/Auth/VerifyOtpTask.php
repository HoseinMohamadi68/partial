<?php

namespace App\Tasks\Auth;

use App\Commands\Auth\VerifyOtpCommand;
use Closure;
class VerifyOtpTask
{
    private VerifyOtpCommand $verifyOtpCommand;

    public function __construct(VerifyOtpCommand $verifyOtpCommand)
    {

        $this->verifyOtpCommand = $verifyOtpCommand;
    }

    public function __invoke(object $payload, Closure $next): mixed
    {
	    $token  = $this->verifyOtpCommand->handle($payload);

	    if ($token && isset($token['token'])) {
		    $payload->token = $token['token'];
		    $payload->user = $token['user'];
	    }

        return $next($payload);
    }
}
