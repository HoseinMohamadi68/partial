<?php

namespace App\Models\Order;

use App\Http\Entities\Enums\FieldNames;
use App\Http\Entities\Enums\StatusType;
use App\Http\Entities\Enums\TypeEnum;
use App\Models\Transaction\Transaction;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const TABLE = 'orders';

    protected $fillable = [
        FieldNames::USER_ID->value,
        FieldNames::TYPE->value,
        FieldNames::GOLD_WEIGHT->value,
        FieldNames::PRICE_PER_GRAM->value,
        FieldNames::TOTAL_PRICE->value,
        FieldNames::FEE->value,
        FieldNames::FULFILLED_WEIGHT->value,
        FieldNames::STATUS->value,
    ];
    protected $casts = [
        FieldNames::TYPE->value => TypeEnum::class,
        FieldNames::STATUS->value => StatusType::class,
    ];

    public function scopeFilter(Builder $builder,  $filters): Builder
    {
        return $filters->apply($builder);
    }

   public function user(){
        return $this->belongsTo(User::class);
   }

   public function transactions(){
        return $this->hasMany(Transaction::class);
   }

    public static function calculateFee($goldWeight, float|int $totalPrice)
    {
        if ($goldWeight <= 1) {
            $fee = $totalPrice * 0.02;
        } elseif ($goldWeight > 1 && $goldWeight <= 10) {
            $fee = $totalPrice * 0.015;
        } else {
            $fee = $totalPrice * 0.01;
        }

        return max(50000, min(5000000, $fee));
    }

}
