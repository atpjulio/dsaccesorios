<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CartPaymentRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Order;
use App\Product;
use App\SliderImage;
use App\Subscription;
use App\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function welcome()
    {
        $sliderImages = SliderImage::onlyVisibleImages();
        $categoriesToShow = Category::take(6)
            ->get()
            ->pluck('name', 'id');

        return view('welcome', compact('sliderImages', 'categoriesToShow'));
    }

    public function store($id = null)
    {
        $all = Product::existingProducts();
        $categoriesToShow = Category::take(10)
            ->get()
            ->pluck('name', 'id');

        $categoriesInfo = [];

        foreach ($categoriesToShow as $categoryId => $name) {
            $category = Product::getProductsByCategoryId($categoryId);
            $categoriesInfo[$categoryId] = $category ?: [];
        }

        return view('store', compact('id', 'all', 'categoriesToShow', 'categoriesInfo'));
    }

    public function more(Request $request, $id)
    {
        $cartQuantity = $request->get('quantity') ?: 0;

        $product = Product::find($id);

        return view('more', compact('product', 'cartQuantity'));
    }

    public function cart()
    {
        $shoppingCart = session('shoppingCart') ?: [];

        return view('cart', compact('shoppingCart'));
    }

    public function addToCart(Request $request)
    {
        $arrayShoppingCart = [
            $request->get('product_id') => $request->get('quantity')
        ];

        $shoppingCart = session('shoppingCart');

        if ($shoppingCart) {
            $shoppingCart = $this->addItemToShoppingCart($shoppingCart, $arrayShoppingCart);
        } else {
            $shoppingCart[] = $arrayShoppingCart;
        }
        
        session(['shoppingCart' => $shoppingCart]);

        if ($request->isMethod('GET')) {
            $request->session()->flash('message', 'Carrito actualizado');
        } else {
            $request->session()->flash('message', 'Artículo agregado al carrito');
        }

        if (!$request->get('amount')) {
            return redirect()->to('/store/'.$request->get('category'));
        }

        return redirect()->back();
    }

    public function substractFromCart(Request $request) 
    {
        $arrayShoppingCart = [
            $request->get('product_id') => $request->get('quantity')
        ];

        $shoppingCart = session('shoppingCart');

        $shoppingCart = $this->substractItemFromShoppingCart($shoppingCart, $arrayShoppingCart);

        session(['shoppingCart' => $shoppingCart]);

        $request->session()->flash('message', 'Carrito actualizado');

        return redirect()->back();   
    }

    public function emptyCart(Request $request)
    {
        session()->forget('shoppingCart');

        $request->session()->flash('message', 'Se ha vaciado el carrito de compras');

        return redirect()->back();
    }

    private function addItemToShoppingCart($shoppingCart, $arrayShoppingCart)
    {
        $flag = false;
        foreach ($shoppingCart as $key => $productArray) {
            $productIndex = array_keys($productArray)[0];
            if (array_key_exists($productIndex, $arrayShoppingCart)) {
                $productArray[$productIndex] += $arrayShoppingCart[$productIndex];
                $shoppingCart[$key] = $productArray;
                $flag = true;
                break;
            }
        }

        if (!$flag) {
            $shoppingCart[] = $arrayShoppingCart;   
        }

        return $shoppingCart;
    }

    private function substractItemFromShoppingCart($shoppingCart, $arrayShoppingCart)
    {
        foreach ($shoppingCart as $key => $productArray) {
            $productIndex = array_keys($productArray)[0];
            if (array_key_exists($productIndex, $arrayShoppingCart)) {
                $productArray[$productIndex] -= $arrayShoppingCart[$productIndex];

                if ($productArray[$productIndex] == 0) {
                    array_splice($shoppingCart, $key, 1);
                } else {
                    $shoppingCart[$key] = $productArray;
                }
                break;
            }
        }

        return $shoppingCart;
    }

    public function subscribe(StoreSubscriberRequest $request)
    {
        Subscription::storeRecord($request);

        $user['email'] = $request->get('email');
        $user['first_name'] = $user['last_name'] = '';

        $subject = 'Subscripción a '.env('APP_URL');
        $url = env('APP_URL').'/register';
        $content = 'Hola,<br><br>Gracias por suscribirte a nuestra página. A través de este canal te informaremos de manera oportuna acerca de ofertas, nuevas colecciones y descuentos<br><br>Trabajamos con mucho cariño y entusiasmo para brindar lo mejor a las princesas de la casa<br><br>Si deseas registrarte en nuestra página para que puedas hacer compras o recibir información adicional, haz clic en el siguiente enlace:<br><br>'.$url;

        Utilities::sendEmail($user, $subject, $content);

        $subject = 'Tienes un nuevo subscriptor!';
        $user['email'] = config('constants.companyInfo.email');
        $content = 'Hola,<br><br>Se acaba de suscribir una persona con el siguiente email:<br><br>'.$request->get('email').'<br><br>Ya le fue enviado el email de bienvenida de manera automática'.
            '<br><br>Van hasta el momento <strong>'.Subscription::count().
            ' subscriptores</strong><br><br>Seguimos creciendo!';

        Utilities::sendEmail($user, $subject, $content);        

        Session::flash('message', 'Gracias por suscribirte a '.config('constants.companyInfo.name'));
        return redirect()->back();
    }

    public function payCart(CartPaymentRequest $request)
    {
        $shoppingCart = session('shoppingCart') ?: [];
        if (!auth()->check() or count($shoppingCart) == 0) {
            Session::flash('message_danger', 'No se puede acceder a la información del pedido');
            return redirect()->route('cart');
        }

        foreach ($shoppingCart as $key => $productArray) {
            $product = Product::getProductById(key($productArray));
            if (!$product) {
                break;
            }
            if (reset($productArray) > $product->quantity) {
                $arrayShoppingCart = [
                    $product->id => reset($productArray) - $product->quantity 
                ];

                $currentCart = session('shoppingCart');
                $currentCart = $this->substractItemFromShoppingCart($currentCart, $arrayShoppingCart);
                session(['shoppingCart' => $currentCart]);

                Session::flash('message_warning', 'Oh! Solo disponemos de '.$product->quantity.
                ' unidad(es) para el producto: '.$product->name.'<br>Tu carrito ha sido actualizado');
                return redirect()->back()->withInput();
            }
        }

        if (auth()->check()) {
            return redirect()->route('pay.cart.confirm');
        }

        session(['payCart' => '1']);

        Session::flash('message', 'Por favor ingresa a tu cuenta para poder culminar el pedido');
        return redirect()->route('login');
    }

    public function payCartConfirm()
    {
        $shoppingCart = session('shoppingCart') ?: [];
        $show = true;

        if (!auth()->check() or count($shoppingCart) == 0) {
            Session::flash('message_danger', 'No se puede acceder a la confirmación del pedido');
            return redirect()->route('cart');
        }
        return view('cart_confirm', compact('shoppingCart', 'show'));
    }

    public function payCartProcess()
    {
        $shoppingCart = session('shoppingCart') ?: [];

        if (!auth()->check() or count($shoppingCart) == 0) {
            Session::flash('message_danger', 'No se pudo acceder a la información del pedido');
            return redirect()->route('cart');
        }

        Order::storeRecord($shoppingCart);
        session()->forget('shoppingCart');

        Session::flash('message', 'Pedido guardado en tu cuenta');
        return redirect()->route('my.orders');
    }    
}
