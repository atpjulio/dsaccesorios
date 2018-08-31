<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function whoAreWe()
    {
        return view('who-are-we');
    }

    public function contactUs()
    {
        return view('contactus');
    }

    public function store($id = null)
    {
        return view('store', compact('id'));
    }

    public function more($id)
    {
        return view('more');
    }

    public function cart()
    {
        return view('cart');
    }

    public function termsAndConditions()
    {
        return view('terms_and_conditions');
    }
}
