<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('payCart')) {
            session()->forget('payCart');

            return redirect()->route('cart');
        }

        return view('home');
    }

    public function myProfile()
    {
        return view('profile');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        User::updateProfile($request);

        Session::flash('message', 'Perfil actualizado');
        return redirect()->route('home');
    }
}
