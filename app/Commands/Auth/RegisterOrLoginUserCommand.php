<?php

namespace App\Commands\Auth;

use App\Http\Entities\DataTransferObjects\LoginUser\LoginSendOtpDTO;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;

class RegisterOrLoginUserCommand
{

    public function handle(LoginSendOtpDTO $user): User
    {
        return DB::transaction(function () use ($user) {
            return User::create($user->toArray());
        }, 2);
    }
}
