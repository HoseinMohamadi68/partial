<?php

namespace App\Queries\Auth;

use App\Http\Entities\DataTransferObjects\LoginUser\LoginSendOtpDTO;
use App\Http\Entities\Enums\FieldNames;
use App\Models\User\User;

class FindUserByPhoneQuery
{
    public function handle(LoginSendOtpDTO $loginSendOtpDTO): ?User
    {
        return User::where(FieldNames::MOBILE->value, $loginSendOtpDTO->{FieldNames::MOBILE->value})->first();
    }
}
