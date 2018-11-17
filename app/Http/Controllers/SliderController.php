<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderImages = SliderImage::all();

        return view('slider.index', compact('sliderImages'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('slider.create');       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request) 
    {
        $file = $request->file('image');
        $fileName = time().'_'.$file->getClientOriginalName();

        $file->move(public_path().config('constants.sliderImages'), $fileName);

        SliderImage::storeRecord($fileName, $request->get('text'));

        Session::flash("message", "Imagen subida exitosamente");
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sliderImage = SliderImage::findOrFail($id);

        return view('slider.show_modal', compact('sliderImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->get('text')) {
            SliderImage::updateText($id, $request->get('text'));
            Session::flash("message", "Texto de la imagen actualizado exitosamente");
        } else {
            $newStatus = $request->get('status') == config('constants.status.active') ? config('constants.status.inactive') : config('constants.status.active');
            SliderImage::updateStatus($id, $newStatus);
            Session::flash("message", "Se modificó la visibilidad de la imagen exitosamente");
        }
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) 
    {
        $path = $request->get('name');
        unlink(public_path().$path);

        $sliderImage = SliderImage::findOrFail($id);
        $sliderImage->delete();

        Session::flash("message", "Imagen borrada del sistema");
        return redirect()->route('slider.index');
    }
}
