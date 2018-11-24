<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payu extends Model
{
    protected function sendPayment($data)
    {
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
