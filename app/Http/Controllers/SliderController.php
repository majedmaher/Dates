<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $sliders = Slider::orderBy('created_at', 'DESC')->get();
            return view('slider.index')->with('sliders', $sliders);
        } else {
            return redirect()->back();
        }
    }


    public function create()
    {
        if (Auth::user()->is_admin == 1) {
            return view('slider.create');
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 1) {

            $this->validate($request, [
                'photo' =>  'required|image',
            ]);
            $photo = $request->photo;
            $newPhoto = time() . $photo->getClientOriginalName();
            $photo->move('uploads/sliders', $newPhoto);

            $slider = Slider::create([
                'user_id' =>  Auth::id(),
                'photo' =>  'uploads/sliders/' . $newPhoto,
            ]);
        }
        // dd($blog);
        return redirect()->back();
    }
    public function show($id)
    {
        if (Auth::user()->is_admin == 1) {
            $slider = Slider::find($id);

            return view('slider.show')->with('slider', $slider);
        } else {
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->is_admin == 1) {
            $slider = Slider::find($id);
            return view('slider.edit')->with('slider', $slider);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request,  $id)
    {
        if (Auth::user()->is_admin == 1) {

            $slider = Slider::find($id);

            $this->validate($request, [
                'photo' =>  'required|image',
            ]);

            //   dd($request->all());

            if ($request->has('photo')) {
                $photo = $request->photo;
                $newPhoto = time() . $photo->getClientOriginalName();
                $photo->move('uploads/sliders', $newPhoto);
                $slider->photo = 'uploads/sliders/' . $newPhoto;
            }

            $slider->save();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        if (Auth::user()->is_admin == 1) {
            $slider = Slider::find($id);
            $slider->destroy($id);
        }

        return redirect()->back();
    }
}
