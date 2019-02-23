<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payu extends Model
{
    protected function sendPayment($data = null)
    {
        $apiUrl = "https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/";

        try {
            $client = new \GuzzleHttp\Client();
            $res = $client->post(
                $apiUrl,
                [
                    'form_params' => [
                        "merchantId"    => "508029",
                        "ApiKey"        => "4Vj8eK4rloUd272L48hsrarnUA",
                        "accountId"     => "512321",
                        "description"   => "Test PAYU" ,
                        "referenceCode" => "TestPayU",
                        "amount"        => "20000"  ,
                        "tax"           => "3193" ,
                        "taxReturnBase" => "16806",
                        "currency"      => "COP",
                        "signature"     => "7ee7cf808ce6a39b17481c54f2c57acc",
                        "test"          => "1",
                        "buyerEmail"    => "test@test.com",
                        "responseUrl"   => "http://www.test.com/response",
                        "confirmationUrl" => "http://www.test.com/confirmation",
                    ]
                ]
            );

            dd($res->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            dd("error", $e);
        }
        
    	/*
		DATA EXAMPLE:
		merchantId: 508029
		ApiKey: 4Vj8eK4rloUd272L48hsrarnUA
		referenceCode: TestPayU
		accountId: 512321
		description: Test PAYU
		amount: 3
		tax: 0
		taxReturnBase: 0
		currency: USD
		signature: ba9ffa71559580175585e45ce70b6c37
		test: 1
		buyerEmail: test@test.com
    	*/

		/*
        if (auth()->user()) {
            try {
                $apiUrl = config('constants.payu.sandbox');
                if (env('PRODUCTION')) {
                	$apiUrl = config('constants.payu.production');
                }

                $client = new \GuzzleHttp\Client();

                $res = $client->request('POST', $apiUrl, [
                    'form_params' => $data,
                ]);
            } catch (ServerException $exception) {
                return null;
            } catch (ClientException $exception) {
                return null;
            }

            return json_decode($res->getBody()->getContents());
        } else {
            return null;
        }
        */
    }
}
