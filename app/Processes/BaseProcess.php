<?php

namespace App\Processes;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Log;

abstract class BaseProcess
{
    protected array $tasks = [];

    public function run(object $payload): mixed
    {
        try {
            return app(Pipeline::class)
                ->send($payload)
                ->through($this->tasks)
                ->thenReturn();
        } catch (\Exception $e) {

            Log::error('error in process  ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new \Exception(trans('messages.unexpected_error') );
        }
    }
}
