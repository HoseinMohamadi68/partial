<?php

namespace Database\Factories;

use App\Http\Entities\Enums\FieldNames;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                FieldNames::FIRST_NAME->value => fake()->firstName,
                FieldNames::LAST_NAME->value => fake()->lastName,
                FieldNames::MOBILE->value => '09' . fake()->unique()->numberBetween(100000000, 999999999),
                FieldNames::MOBILE_VERIFIED_AT->value => now(),
                FieldNames::PASSWORD->value => Hash::make('password123'),
                FieldNames::GOLD_BALANCE->value => round(mt_rand(1000, 10000) / 1000, 3),
        ];
    }
}
