<?php

namespace App\Http\Controllers;

use App\Bulletin;
use App\Http\Requests\StoreBulletinRequest;
use App\Http\Requests\UpdateBulletinRequest;
use App\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulletins = Bulletin::all();

        return view('bulletins.index', compact('bulletins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bulletins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulletinRequest $request)
    {
        if (auth()->user()->hasRole('admin')) {

            if ($request->get('test')) {
                Utilities::sendBulletin(auth()->user(), $request->get('subject'), $request->get('content'), true);
                Session::flash('message', 'Boletín de prueba enviado exitosamente');
                return redirect()->back()->withInput();
            }

            $result = Bulletin::storeRecord($request);

            Session::flash('message', 'Boletín guardado exitosamente');
            if ($result->amount > 0) {
                Session::flash('message', 'Boletín guardado y enviado exitosamente');                
            }
        }
        return redirect()->route('bulletin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function show(Bulletin $bulletin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function edit(Bulletin $bulletin)
    {
        return view('bulletins.edit', compact('bulletin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBulletinRequest $request, Bulletin $bulletin)
    {
        if (auth()->user()->hasRole('admin')) {

            if ($request->get('test')) {
                Utilities::sendBulletin(auth()->user(), $request->get('subject'), $request->get('content'), true);
                Session::flash('message', 'Boletín de prueba enviado exitosamente');
                return redirect()->back()->withInput();
            }
            $result = Bulletin::updateRecord($request, $bulletin);

            Session::flash('message', 'Boletín actualizado exitosamente');
            if ($result->amount > 0) {
                Session::flash('message', 'Boletín actualizado y enviado exitosamente');                
            }
        }
        return redirect()->route('bulletin.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bulletin $bulletin)
    {
        if (auth()->user()->hasRole('admin')) {
            $bulletin->delete();

            Session::flash('message', 'Boletín eliminado exitosamente');
            return redirect()->route('bulletin.index');
        }
    }

    public function delete($id)
    {
        $bulletin = Bulletin::findOrFail($id);

        return view('bulletins.delete_modal', compact('bulletin'));
    }
}
