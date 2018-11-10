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

    public function activate($id)
    {
        $subscriber = Subscription::findOrFail($id);

        return view('subscriptions.activate_modal', compact('subscriber'));
    }

    public function activateProcess(Subscription $subscriber)
    {
        $subscriber->update([
            'status' => config('constants.status.active')
        ]);

        Session::flash('message', 'Subscriptor activado exitosamente');

        return redirect()->route('subscription.index');
    }

    public function deactivate($id)
    {
        $subscriber = Subscription::findOrFail($id);

        return view('subscriptions.deactivate_modal', compact('subscriber'));
    }

    public function deactivateProcess(Subscription $subscriber)
    {
        $subscriber->update([
            'status' => 0
        ]);

        Session::flash('message', 'Subscriptor desactivado exitosamente');

        return redirect()->route('subscription.index');
    }

    public function destroy($id)
    {
        $subscriber = Subscription::findOrFail($id);
        $subscriber->delete();

        Session::flash('message', 'Subscriptor borrado exitosamente');

        return redirect()->route('subscription.index');
    }

    public function unsubscribe($id)
    {
        $subscriber = Subscription::findOrFail($id);
        $subscriber->update([
            'status' => 0
        ]);

        Session::flash('message', 'Has finalizado tu suscripción en las noticias de nuestra página');

        return redirect()->to('/');
    }
}
