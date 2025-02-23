<?php

namespace App\Http\Resources\User;

use App\Http\Entities\Enums\FieldNames;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            FieldNames::ID->value => $this->{FieldNames::ID->value},
            FieldNames::FIRST_NAME->value => $this->{FieldNames::FIRST_NAME->value},
            FieldNames::LAST_NAME->value => $this->{FieldNames::LAST_NAME->value},
            FieldNames::MOBILE->value => $this->{FieldNames::MOBILE->value},
            FieldNames::GOLD_BALANCE->value => $this->{FieldNames::GOLD_BALANCE->value},
        ];
    }
}
