<?php

namespace App\Services;



use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SmsService
{
    public static function generateAndStoreSmsCode()
    {
        $smsCode = '1111';

        Log::info('Сохраненный код в сессии: ' . $smsCode);

        Session::put('sms_code', $smsCode);
    }

    public static function getSmsCode()
    {
        $smsCode = Session::get('sms_code');

        return $smsCode;
    }
}
