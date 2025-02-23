<?php

namespace App\Http\Requests\Order;

use App\Http\Entities\Enums\FieldNames;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            FieldNames::TYPE->value => 'required|in:buy,sell',
            FieldNames::GOLD_WEIGHT->value => 'required|numeric|min:0.001',
            FieldNames::PRICE_PER_GRAM->value => 'required|integer',
        ];
    }
}
