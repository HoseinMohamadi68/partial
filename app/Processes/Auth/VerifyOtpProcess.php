<?php

namespace App\Processes\Auth;

use App\Processes\BaseProcess;
use App\Tasks\Auth\VerifyOtpTask;


final class VerifyOtpProcess extends BaseProcess
{
    protected array $tasks = [
        VerifyOtpTask::class,
    ];
}
