<?php

namespace App\Tasks;

use App\Exceptions\BaseException;
use App\Exceptions\NotFoundException;
use App\Exceptions\TaskException;
use Exception;
use Illuminate\Support\Facades\Log;

abstract class BaseTask
{
    public function execute(mixed $data): mixed
    {
        try {
            return $this->handle($data);
        } catch (NotFoundException $e) {
            Log::warning("Not Found Exception in " . static::class, ['message' => $e->getMessage(), 'data' => $data]);
            throw $e;
        } catch (BaseException $e) {
            Log::error("Base Exception in " . static::class, ['message' => $e->getMessage(), 'data' => $data]);
            throw $e;
        } catch (Exception $e) {
            Log::critical("Unhandled Exception in " . static::class, ['message' => $e->getMessage(), 'data' => $data]);
            throw new TaskException($e->getMessage(), 422);
        }
    }

    /**
     * Method signature in the parent class.
     * It accepts mixed data so subclasses can enforce their own types.
     */
    abstract protected function handle(mixed $data): mixed;
}
