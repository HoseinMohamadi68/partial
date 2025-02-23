<?php

namespace App\Http\Entities\DataTransferObjects\Order;

use App\Http\Entities\Enums\FieldNames;
use App\Http\Entities\Enums\StatusType;
use App\Http\Entities\Enums\TypeEnum;
use Illuminate\Contracts\Support\Arrayable;

class OrderDTO implements Arrayable
{
    public int $user_id;
    public string $type;
    public float $gold_weight;
    public int $price_per_gram;

    public function __construct(array $data)
    {
        $this->user_id = auth()->id();
        $this->type = TypeEnum::getTypeOrder($data[FieldNames::TYPE->value]);
        $this->gold_weight = $data[FieldNames::GOLD_WEIGHT->value];
        $this->price_per_gram = $data[FieldNames::PRICE_PER_GRAM->value];
    }


    public static function fromArray(array $data): self
    {
        return new self([
            FieldNames::TYPE->value => $data[FieldNames::TYPE->value],
            FieldNames::GOLD_WEIGHT->value => $data[FieldNames::GOLD_WEIGHT->value] ?? 0,
            FieldNames::PRICE_PER_GRAM->value => $data[FieldNames::PRICE_PER_GRAM->value] ?? 0,
        ]);
    }



    public function toArray(): array
    {
        return [
            FieldNames::USER_ID->value => $this->user_id,
            FieldNames::TYPE->value => $this->type,
            FieldNames::GOLD_WEIGHT->value => $this->gold_weight,
            FieldNames::PRICE_PER_GRAM->value => $this->price_per_gram,
            FieldNames::TOTAL_PRICE->value => $this->gold_weight * $this->price_per_gram,
        ];
    }
}
