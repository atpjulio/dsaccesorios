<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Utilities extends Model
{
    static function currency($value)
    {
    	return '$ '.number_format($value, 2, ",", ".");
    }

    static function humanDate($date)
    {
    	return \Carbon\Carbon::parse($date)->format("d/m/Y");
    }

    static function humanProducts($json)
    {
        $array = json_decode($json, true);
        $result = '';

        foreach ($array as $productArray) {
            $product = Product::getProductById(key($productArray));
            if (!$product) {
                break;
            }
            $result .= substr($product->name, 0, 25).'..., ';
        }

        return str_replace_last("..., ", "", $result);
    }

    static function totalProducts($json)
    {
        return count(json_decode($json, true));
    }

    static function totalArticles($json)
    {
        $array = json_decode($json, true);
        $total = 0;

        foreach ($array as $productArray) {
            $product = Product::getProductById(key($productArray));
            if (!$product) {
                break;
            }
            $total += reset($productArray);
        }

        return $total;
    }

    static function sendEmail($user, $subject, $content)
    {
        $customerEmail = $user['email'];
        $customerName = $user['first_name'] . " " . $user['last_name'];
        
        if (!env("PRODUCTION")) {
            $subject = "Prueba -> " . $customerEmail . " -> " . time() . " " . $subject;
            $customerEmail = config('constants.emails.testing');
            $customerName = "Ambiente de Desarrollo";
        }
        
        $data['users'] = $user;
        $data['content'] = $content;
        try {
            Mail::send('emails.template', $data, function($message) use($customerEmail, $customerName, $subject)
            {
                $message->to($customerEmail, $customerName)->subject($subject);
                $message->from(config('constants.companyInfo.email'), config('constants.companyInfo.longName'));
            });
        } catch (Exception $e) {
            dd($e);
        }
    }

    static function sendBulletin($subscriber, $subject, $content, $test = false)
    {
        if (!$subscriber) {
            return;
        }

        $user['email'] = $subscriber->email;
        $user['first_name'] = '';
        $user['last_name'] = '';

        $customerEmail = $user['email'];
        $customerName = $user['first_name'] . " " . $user['last_name'];
        
        if ($test) {
            $subject = "[ PRUEBA ] " . $customerEmail . " -> " . $subject;
            $customerEmail = auth()->user()->email;
            $customerName = "Probando Boletín";            
        }

        if (!env("PRODUCTION")) {
            $subject = "Prueba -> " . $customerEmail . " -> " . time() . " " . $subject;
            $customerEmail = config('constants.emails.testing');
            $customerName = "Ambiente de Desarrollo";
        }

        $data['users'] = $user;
        $data['content'] = $content;
        $data['id'] = $subscriber->id;
        try {
            Mail::send('emails.bulletin', $data, function($message) use($customerEmail, $customerName, $subject)
            {
                $message->to($customerEmail, $customerName)->subject($subject);
                $message->from(config('constants.companyInfo.email'), config('constants.companyInfo.longName'));
            });
        } catch (Exception $e) {
            dd($e);
        }
    }

    static function sendConfirmationOrder($user, $subject, $content, $shoppingCart)
    {
        $customerEmail = $user['email'];
        $customerName = $user['first_name'] . " " . $user['last_name'];
        
        if (!env("PRODUCTION")) {
            $subject = "Prueba -> " . $customerEmail . " -> " . time() . " " . $subject;
            $customerEmail = config('constants.emails.testing');
            $customerName = "Ambiente de Desarrollo";
        }
        
        $data['users'] = $user;
        $data['content'] = $content;
        $data['shoppingCart'] = $shoppingCart;
        try {
            Mail::send('emails.order', $data, function($message) use($customerEmail, $customerName, $subject)
            {
                $message->to($customerEmail, $customerName)->subject($subject);
                $message->from(config('constants.companyInfo.email'), config('constants.companyInfo.longName'));
            });
        } catch (Exception $e) {
            dd($e);
        }
    }
}
