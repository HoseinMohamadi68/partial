<?php

namespace App\Tasks\Order;

use App\Http\Entities\Enums\FieldNames;
use App\Http\Entities\Enums\StatusType;
use App\Http\Entities\Enums\TypeEnum;
use App\Models\Order\Order;
use App\Models\Region\Country;
use App\Models\Transaction\Transaction;
use App\Tasks\BaseTask;


class MatchOrderTask
{

    public function handle($payload, \Closure $next)
    {
        $matchingOrders = $this->getMatchingOrders($payload->order);
        foreach ($matchingOrders as $matchingOrder) {
            $transactionGoldWeight = min($payload->order->gold_weight, $matchingOrder->gold_weight);

            Transaction::create( [
                'order_id'   => $matchingOrder->id,
                'buyer_id'   => $payload->order->type->value == TypeEnum::BUY->value ? $payload->order->user_id : $matchingOrder->user_id,
                'seller_id'  => $payload->order->type->value == TypeEnum::SELL->value ? $payload->order->user_id : $matchingOrder->user_id,
                'gold_weight' => $transactionGoldWeight,
                'price'      =>  $payload->order->price_per_gram,
                'total_price' => $transactionGoldWeight * $payload->order->price_per_gram
            ]);

            // کم کردن مقدار طلای معامله‌شده
            $payload->order->gold_weight -= $transactionGoldWeight;
            $matchingOrder->gold_weight -= $transactionGoldWeight;

            // اگر سفارش فروشنده تمام شد، `completed` شود
            if ($matchingOrder->gold_weight <= 0) {
                $matchingOrder->status = StatusType::COMPLETED->value;
            } else {
                $matchingOrder->status =  StatusType::PARTIALLY_COMPLETED->value; // اگر هنوز مقداری باقی‌مانده، `partial` باشد
            }

            $matchingOrder->save();

            // اگر سفارش خریدار هم تمام شد، `completed` شود
            if ($payload->order->gold_weight <= 0) {
                $payload->order->status = StatusType::COMPLETED->value;
                break; // نیازی به ادامه نیست
            } else {
                $payload->order->status =  StatusType::PARTIALLY_COMPLETED->value;
            }
        }

        $payload->order->save();
        return $next($payload);
    }
    protected function getMatchingOrders($order)
    {

        return Order::where(FieldNames::PRICE_PER_GRAM->value, $order->price_per_gram)
            ->where(FieldNames::TYPE->value, $order->type->name === 0 ? 1 : 0)
            ->whereIn(FieldNames::STATUS->value, [0, 1])
            ->get();
    }
}
