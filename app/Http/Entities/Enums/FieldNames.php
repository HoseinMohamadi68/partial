<?php

namespace App\Http\Entities\Enums;

enum FieldNames: string
{
    case ID = 'id';
    case MOBILE = 'mobile';
    case PASSWORD = 'password';
    case FIRST_NAME = 'first_name';
    case LAST_NAME = 'last_name';
    case OTP_CODE = 'otp_code';
    case MOBILE_VERIFIED_AT = 'mobile_verified_at';
    case DATE_OF_BIRTH = 'date_of_birth';
    case OTP_EXPIRE_AT = 'otp_expire_at';
    case IS_ACTIVE = 'is_active';
    case USER_ID = 'user_id';
    case UNIT = 'unit';
    case IS_DEFAULT = 'is_default';
    case TITLE = 'title';
    case DATE_FORMAT = 'data_format';
    case NAME = 'name';
    case STATUS = 'status';
    case TYPE = 'type';
    case GOLD_WEIGHT = 'gold_weight';
    case PRICE_PER_GRAM = 'price_per_gram';
    case TOTAL_PRICE = 'total_price';
    case FEE = 'fee';
    case FULFILLED_WEIGHT = 'fulfilled_weight';
    case GOLD_BALANCE = 'gold_balance';
    case ORDER_ID = 'order_id';
    case PRICE = 'price';
    case BUYER_ID = 'buyer_id';
    case SELLER_ID = 'seller_id';
}
