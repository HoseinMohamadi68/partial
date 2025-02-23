<?php

namespace App\Processes\Order;

use App\Processes\BaseProcess;

use App\Tasks\Order\MatchOrderTask;
use App\Tasks\Order\StoreOrderTask;



final class OrderProcess extends BaseProcess
{
    protected array $tasks = [
        StoreOrderTask::class,
        MatchOrderTask::class,
    ];
}

