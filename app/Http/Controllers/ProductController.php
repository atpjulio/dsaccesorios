<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'both'], ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::searchRecords();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if (auth()->user()->hasRole('admin')) {
            Product::storeRecord($request); 

            $request->session()->flash('message', 'Producto guardado exitosamente');
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            Session::flash('message_warning', 'Ups! No se pudo mostrar el producto. Inténtalo nuevamente');
            return redirect()->back();
        } 

        return view('products.show_modal', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->pluck('name', 'id');
        $product = Product::find($id);
        if (!$product) {
            Session::flash('message_warning', 'Ups! No se pudo mostrar el producto. Inténtalo nuevamente');
            return redirect()->back();
        } 

        return view('products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        if (auth()->user()->hasRole('admin')) {
            Product::updateRecord($request, $id); 

            $request->session()->flash('message', 'Producto actualizado exitosamente');
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->hasRole('admin')) {
            $product = Product::find($id);

            if (!$product) {
                Session::flash('message_warning', 'Ups! Parece que el producto ya ha sido eliminado');
            } else {
                Product::deleteRecord($product);
                Session::flash('message', 'Producto eliminado exitosamente');
            }

            return redirect()->route('products.index');
        }
    }

    public function solds()
    {
        $products = Product::solds();

        return view('products.solds', compact('products'));
    }

    public function likes()
    {
        $products = Product::likes();

        return view('products.likes', compact('products'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        return view('products.delete_modal', compact('product'));
    }
}
