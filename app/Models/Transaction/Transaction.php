<?php

namespace App\Models\Transaction;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded=[];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
