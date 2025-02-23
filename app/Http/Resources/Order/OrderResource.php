<?php

namespace App\Http\Resources\Order;

use App\Http\Entities\Enums\FieldNames;
use App\Http\Resources\Transaction\TransactionResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request): array
    {
        return [
            FieldNames::ID->value => $this->{FieldNames::ID->value},
            FieldNames::TYPE->value => $this->{ FieldNames::TYPE->value}->name,
            FieldNames::GOLD_WEIGHT->value => $this->{ FieldNames::GOLD_WEIGHT->value},
            FieldNames::PRICE_PER_GRAM->value => number_format($this->{ FieldNames::PRICE_PER_GRAM->value} / 10, 0, '', ',') . ' تومان',
            FieldNames::FEE->value => number_format($this->{ FieldNames::FEE->value} / 10, 0, '', ',') . ' تومان',
            FieldNames::FULFILLED_WEIGHT->value => $this->{ FieldNames::FULFILLED_WEIGHT->value},
            FieldNames::TOTAL_PRICE->value => number_format($this->{ FieldNames::TOTAL_PRICE->value} / 10, 0, '', ',') . ' تومان',
            FieldNames::STATUS->value => $this->{ FieldNames::STATUS->value}->name,
            'transaction' => $this->whenLoaded('transactions', function(){
               return TransactionResource::collection($this->transactions);
            }),
            'user' => $this->whenLoaded('user', function(){
                return  new UserResource($this->user);
            })
        ];
    }
}

