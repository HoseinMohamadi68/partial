<?php

namespace App\Models\User;

use App\Http\Entities\Enums\FieldNames;
use App\Models\Order\Order;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TABLE =  'users';

    protected $table = 'users';

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        FieldNames::FIRST_NAME->value,
        FieldNames::LAST_NAME->value,
        FieldNames::MOBILE->value,
        FieldNames::PASSWORD->value,
        FieldNames::OTP_CODE->value,
        FieldNames::GOLD_BALANCE->value,
        FieldNames::OTP_EXPIRE_AT->value,
        'verify_code',
        'verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
