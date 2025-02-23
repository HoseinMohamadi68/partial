<?php

namespace App\Http\Controllers\Order;

use App\Filters\Order\OrderFilter;
use App\Http\Controllers\Controller;
use App\Http\Entities\DataTransferObjects\Order\OrderDTO;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Region\CountryResource;
use App\Jobs\MatchOrdersJob;
use App\Models\Order\Order;
use App\Models\Region\Country;
use App\Processes\Order\OrderProcess;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    private OrderProcess $orderProcess;

    public function __construct(OrderProcess $orderProcess)
    {
        $this->orderProcess = $orderProcess;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderFilter $filters, Request $request): AnonymousResourceCollection
    {
        return OrderResource::collection(
            Order::filter($filters)
                ->with([ 'transactions'])
                ->paginate($this->getPageSize($request)),
        )->additional($this->getAdditionals($filters, new Order()));
    }

    public function store(OrderRequest $request){
        try {
            $dataDto = OrderDTO::fromArray($request->validated());

            $result = $this->orderProcess->run($dataDto);

            return new OrderResource($result->order);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
