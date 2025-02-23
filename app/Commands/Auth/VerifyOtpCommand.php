<?php

namespace App\Commands\Auth;

use App\Http\Entities\DataTransferObjects\LoginUser\LoginSendOtpDTO;
use App\Http\Entities\Enums\FieldNames;
use App\Models\User\User;
use Symfony\Component\HttpFoundation\Response;

final class VerifyOtpCommand
{
	public function handle(LoginSendOtpDTO $loginSendOtpDTO): mixed
	{
		try {
			$userFind = User::where( FieldNames::MOBILE->value, $loginSendOtpDTO->{FieldNames::MOBILE->value})->first();

			if ($userFind && $userFind->{FieldNames::OTP_CODE->value} == $loginSendOtpDTO->otpCode) {
				$currentTime = now();

				if ($currentTime <= $userFind->{FieldNames::OTP_EXPIRE_AT->value}) {
					if ($userFind->{FieldNames::OTP_CODE->value} == $loginSendOtpDTO->otpCode) {
                        if($userFind->{FieldNames::MOBILE_VERIFIED_AT->value} == null ){
                            $userFind->{FieldNames::MOBILE_VERIFIED_AT->value} = now();
                            $userFind->save();
                        }
                        $userFind->{FieldNames::OTP_CODE->value} = null;
                        $userFind->{FieldNames::OTP_EXPIRE_AT->value} = null;
                        $userFind->save();

						$data = [
                           "token" => $userFind->createToken('auth_token')->accessToken,
                            "user" => $userFind
                        ];

                        return $data;
					} else {
						throw new \Exception('کد وارد شده اشتباه است');
					}
				} else {
					throw new \Exception('زمان استفاده از این کد به اتمام رسیده است.');
				}
			}
		}catch (\Exception $exception){
			return [
				'error' => true,
				'message' => $exception->getMessage(),
				'status' => Response::HTTP_BAD_REQUEST,
			];
		}
	}
}
