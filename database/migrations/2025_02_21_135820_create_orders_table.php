<?php

use App\Http\Entities\Enums\FieldNames;
use App\Http\Entities\Enums\StatusType;
use App\Models\Order\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create(Order::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(FieldNames::USER_ID->value)->constrained();
            $table->tinyInteger(FieldNames::TYPE->value);
            $table->decimal(FieldNames::GOLD_WEIGHT->value, 8, 2);
            $table->decimal(FieldNames::PRICE_PER_GRAM->value, 15, 2);// قیمت کل
            $table->decimal(FieldNames::TOTAL_PRICE->value, 15, 2);// مقدار پردازش‌شده
            $table->decimal(FieldNames::FEE->value, 15, 2);// کارمزد
            $table->decimal(FieldNames::FULFILLED_WEIGHT->value, 8, 2)->default(0);
            $table->tinyInteger(FieldNames::STATUS->value)->default(StatusType::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
