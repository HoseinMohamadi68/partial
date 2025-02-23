<?php

use App\Http\Entities\Enums\FieldNames;
use App\Http\Entities\Enums\StatusType;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(FieldNames::FIRST_NAME->value,50)->nullable();
            $table->string(FieldNames::LAST_NAME->value,50)->nullable();
            $table->string(FieldNames::MOBILE->value,15)->nullable()->unique();
            $table->timestamp(FieldNames::MOBILE_VERIFIED_AT->value)->nullable();
            $table->string(FieldNames::OTP_CODE->value,6)->nullable();
            $table->string(FieldNames::PASSWORD->value)->nullable();
            $table->decimal(FieldNames::GOLD_BALANCE->value, 10, 3)->default(0);
            $table->timestamp(FieldNames::OTP_EXPIRE_AT->value )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(User::TABLE);
    }
}
