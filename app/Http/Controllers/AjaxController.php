<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AjaxController extends Controller
{
    public function setToCart(Request $request)
    {
        $arrayShoppingCart = [
            $request->get('product_id') => $request->get('quantity')
        ];

        $shoppingCart = session('shoppingCart');

        if ($shoppingCart) {
            $shoppingCart = $this->setItemToShoppingCart($shoppingCart, $arrayShoppingCart);
        } else {
            $shoppingCart[] = $arrayShoppingCart;
        }
        
        session(['shoppingCart' => $shoppingCart]);

        return view('partials.shopping_cart_table', compact('shoppingCart'));
    }

    private function setItemToShoppingCart($shoppingCart, $arrayShoppingCart)
    {
        foreach ($shoppingCart as $key => $productArray) {
            $productIndex = array_keys($productArray)[0];
            if (array_key_exists($productIndex, $arrayShoppingCart)) {
                $productArray[$productIndex] = $arrayShoppingCart[$productIndex];
                $shoppingCart[$key] = $productArray;
                break;
            }
        }

        return $shoppingCart;
    }

    public function getProducts($search)
    {
        $products = Product::searchRecords($search);
        return view('partials._products', compact('products'));
    }
}
