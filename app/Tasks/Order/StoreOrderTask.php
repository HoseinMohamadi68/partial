<?php

namespace App\Tasks\Order;

use App\Http\Entities\Enums\FieldNames;
use App\Http\Entities\Enums\StatusType;
use App\Http\Entities\Enums\TypeEnum;
use App\Models\Order\Order;
use App\Models\Region\Country;
use App\Tasks\BaseTask;


class StoreOrderTask
{

    public function handle($payload, \Closure $next)
    {
        $totalPrice = $payload->gold_weight * $payload->price_per_gram;
        $fee = Order::calculateFee($payload->gold_weight, $totalPrice);

        $order = Order::create([
            FieldNames::USER_ID->value=> $payload->user_id,
            FieldNames::TYPE->value =>  TypeEnum::from((int) $payload->type),
            FieldNames::GOLD_WEIGHT->value => $payload->gold_weight,
            FieldNames::PRICE_PER_GRAM->value => $payload->price_per_gram,
            FieldNames::TOTAL_PRICE->value => $totalPrice,
            FieldNames::FEE->value =>$fee,
            FieldNames::STATUS->value => StatusType::PENDING->value,
        ]);

        $payload->order = $order;

        return $next($payload);
    }
}
