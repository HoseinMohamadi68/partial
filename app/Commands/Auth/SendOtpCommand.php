<?php

namespace App\Commands\Auth;

use App\Http\Entities\Enums\FieldNames;
use App\Models\User\User;

final class SendOtpCommand
{
    public function handle(mixed $data ): User
    {
        $otp =  random_int(100000, 999999);;

	   $time = now();
       $user = $data->user;
       $user->{FieldNames::OTP_CODE->value} = $otp;
       $user->{FieldNames::OTP_EXPIRE_AT->value} = $time->addMinutes(2);
       $user->save();

        //        Notification::route('sms', $payload->{})
//            ->notify(new OtpNotification($otp));

        return $user;
    }
}
