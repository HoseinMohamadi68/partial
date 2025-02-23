<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Entities\Enums\FieldNames;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
        FieldNames::ID->value => $this->{FieldNames::ID->value},
        FieldNames::PRICE->value => number_format($this->{ FieldNames::PRICE->value} / 10, 0, '', ',') . ' تومان',
        FieldNames::GOLD_WEIGHT->value => $this->{ FieldNames::PRICE->value},
        FieldNames::TOTAL_PRICE->value => number_format($this->{ FieldNames::TOTAL_PRICE->value} / 10, 0, '', ',') . ' تومان',
        FieldNames::FEE->value => number_format($this->{ FieldNames::FEE->value} / 10, 0, '', ',') . ' تومان',
        ];
    }
}
