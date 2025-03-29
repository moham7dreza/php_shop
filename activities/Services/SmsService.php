<?php

namespace Activities\Services;

use SoapClient;
use SoapFault;

class SmsService
{

    private $username = '902932939329';
    private $password = 'sjkmkldwmlkwdml';
    private $from = '5000000000329';


    public function sendSmsOtp($phoneNumber, $otp)
    {

        try {
            $client = new SoapClient('https://api.payamak-panel.com/post/send.asmx?wsdl', ['encoding' => 'UTF-8']);
            $paramaters = [
                'username' => $this->username,
                'password' => $this->password,
                'to' => $phoneNumber,
                'from' => $this->from,
                'text' => ' کد تایید شما : ' . $otp,
                'isflash' => false
            ];

            $result = $client->SendSimpleSms2($paramaters);
        } catch (SoapFault $fault) {
            echo 'خطا در ارسال پیامک ' . $fault->faultstring;
        }
    }
}
