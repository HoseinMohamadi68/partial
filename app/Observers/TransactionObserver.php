<?php

namespace App\Observers;

use App\Http\Entities\Enums\FieldNames;
use App\Models\Order\Order;
use App\Models\Transaction\Transaction;

class TransactionObserver
{

    public function creating(Transaction $transaction)
    {

        $transaction->{FieldNames::FEE->value} = Order::calculateFee(
            $transaction->{FieldNames::GOLD_WEIGHT->value},
            $transaction->{FieldNames::TOTAL_PRICE->value}
        );
    }
}
