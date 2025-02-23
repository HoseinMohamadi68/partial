<?php

namespace App\Processes\Auth;

use App\Processes\BaseProcess;
use App\Tasks\Auth\CheckUserExistsTask;
use App\Tasks\Auth\SendOtpTask;


final class SendOtpProcess extends BaseProcess
{
    protected array $tasks = [
        CheckUserExistsTask::class,
        SendOtpTask::class,
    ];
}
