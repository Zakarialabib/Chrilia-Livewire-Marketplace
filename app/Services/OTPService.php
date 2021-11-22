<?php

namespace App\Services;

use Aloha\Twilio\Twilio;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Brotzka\DotenvEditor\DotenvEditor;

class OTPService
{
    public function __constuct()
    {
        //
    }


    //
    public function sendOTP($phone, $message, $gateway = null)
    {

        $enabledSmsGateway = Config::get('settings.enableSMS');
        if ($gateway != null) {
            $enabledSmsGateway = $gateway;
        }
        $env = new DotenvEditor();
        //
        if ($enabledSmsGateway == "twilio") {
            $accountId = $env->getValue("TWILIO_SID");
            $token = $env->getValue("TWILIO_TOKEN");
            $fromNumber = $env->getValue("TWILIO_FROM");
            //
            $twilio = new Twilio($accountId, $token, $fromNumber);
            $twilio->message($phone, $message);
        } 
    }
}