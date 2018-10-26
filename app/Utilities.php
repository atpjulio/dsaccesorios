<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
