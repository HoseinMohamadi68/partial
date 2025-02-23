<?php

namespace App\Http\Requests\Auth;

use App\Http\Entities\Enums\FieldNames;
use App\Http\Requests\BaseRequest;
use App\Models\User\User;
use Illuminate\Validation\Rule;

class AuthRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->has(FieldNames::OTP_CODE->value)) {
            return [
                FieldNames::MOBILE->value => ['required', 'string', 'max:11', 'min:9',
                    Rule::exists(User::TABLE, FieldNames::MOBILE->value)
                ],
                FieldNames::OTP_CODE->value => [
                    'required',
                    Rule::exists(User::TABLE, FieldNames::OTP_CODE->value)
                ],
            ];
        }

        return [
            FieldNames::MOBILE->value => ['required', 'string', 'max:11', 'min:9'],
        ];

    }
}
