<?php

use App\Http\Entities\Enums\FieldNames;
use App\Models\Order\Order;
use App\Models\User\User;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId(FieldNames::ORDER_ID->value)->constrained(Order::TABLE);
            $table->foreignId(FieldNames::BUYER_ID->value)->constrained(User::TABLE);
            $table->foreignId(FieldNames::SELLER_ID->value)->constrained(User::TABLE);
            $table->decimal(FieldNames::PRICE->value, 15, 2); // قیمت هر گرم
            $table->decimal(FieldNames::GOLD_WEIGHT->value, 10, 3); // مقدار معامله‌شده
            $table->decimal(FieldNames::TOTAL_PRICE->value, 15, 2); // مبلغ کل معامله
            $table->decimal(FieldNames::FEE->value, 15, 2); // کارمزد معامله
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
