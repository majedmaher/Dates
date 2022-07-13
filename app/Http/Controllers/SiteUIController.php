<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SiteUIController extends Controller
{

    public function index()
    {
        return view('index')->with('sliders', Slider::orderBy('created_at', 'desc')->take(3)->get())
            ->with('blogs', Blog::orderBy('created_at', 'desc')->take(3)->get())
            ->with('products', Product::orderBy('created_at', 'desc')->take(5)->get());
    }


    public function subscribeStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'email'
        ]);

        Subscribe::create([
            'email' =>   $request->email,
        ]);

        return redirect()->back();
    }
}
