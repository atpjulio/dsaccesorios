<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'], []);
    }

    public function index()
    {
    	$subscribers = Subscription::all();

    	return view('subscriptions.index', compact('subscribers'));
    }

    public function create()
    {
    	// return view('subscriptions.create');
    }

    public function delete($id)
    {
        $subscriber = Subscription::findOrFail($id);

        return view('subscriptions.delete_modal', compact('subscriber'));
    }

    public function destroy($id)
    {
        $subscriber = Subscription::findOrFail($id);
        $subscriber->delete();

        Session::flash('message', 'Subscriptor borrado exitosamente');

        return redirect()->route('subscriptions.index');
    }

}
