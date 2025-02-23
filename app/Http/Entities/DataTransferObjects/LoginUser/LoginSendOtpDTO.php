<?php

namespace App\Http\Entities\DataTransferObjects\LoginUser;

use App\Http\Entities\Enums\FieldNames;

class LoginSendOtpDTO
{
    public function __construct(
        public string $mobile,
        public ?string $otpCode = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
           $data[FieldNames::MOBILE->value],
	        $data[FieldNames::OTP_CODE->value] ?? null,
        );
    }


    public function toArray(): array
    {
	    $data = [
		    FieldNames::MOBILE->value => $this->mobile,
	    ];
	    
	    if ($this->otpCode !== null) {
		    $data[FieldNames::OTP_CODE->value] = $this->otpCode;
	    }
	    
	    return $data;
    }
}
