<?php

namespace App\Http\Controllers;

use App\Filters\FiltersInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const DEFAULT_PAGE_SIZE = 10;
    const PER_PAGE = 'per_page';
    const STATUS = 'status';

    /**
     * @param FiltersInterface $filters FiltersInterface.
     * @param Model            $model   Model.
     *
     * @return array[]
     */
    protected function getAdditionals( $filters, Model $model): array
    {
        return [
            'meta' => [
                'filters' => $filters->attributes,
                'orderByColumns' => $filters->orderByColumns
            ],
        ];
    }

    /**
     * @param Request $request BaseRequest.
     *
     * @return mixed
     */
    protected function getPageSize(Request $request): mixed
    {
        $pageSize = self::DEFAULT_PAGE_SIZE;
        if ($request->has(self::PER_PAGE) && !empty($request->get(self::PER_PAGE))) {
            $pageSize = (int) $request->get(self::PER_PAGE);
        }

        return $pageSize;
    }

    protected function successResponse($message)
    {
        return $this->getResponse(['message' => $message], Response::HTTP_OK);
    }

    protected function errorResponse($message, $statusCode)
    {
        return $this->getResponse(['message' => $message], $statusCode);
    }
}
