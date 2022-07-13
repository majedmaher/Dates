<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $products = Product::orderBy('created_at', 'DESC')->get();
            return view('product.index')->with('products', $products);
        }
        return redirect()->back();
    }

    public function productsTrashed()
    {
        // $products = Product::onlyTrashed()->where('user_id', Auth::id())->get();
        if (Auth::user()->is_admin == 1) {
            $products = Product::onlyTrashed()->get();
            return view('product.trashed')->with('products', $products);
        }
        return redirect()->back();
    }
    public function create()
    {
        if (Auth::user()->is_admin == 1) {
            return view('product.create');
        }
        return redirect()->back();
    }
    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 1) {
            $this->validate($request, [
                'title' =>  'required',
                'description' =>  'required',
                'photo' =>  'required|image',
            ]);
            $photo = $request->photo;
            $newPhoto = time() . $photo->getClientOriginalName();
            $photo->move('uploads/products', $newPhoto);

            $Product = Product::create([
                'user_id' =>  Auth::id(),
                'title' =>  $request->title,
                'description' =>   $request->description,
                'photo' =>  'uploads/products/' . $newPhoto,
            ]);
        }
        // dd($Product);
        return redirect()->back();
    }


    public function edit($id)
    {
        if (Auth::user()->is_admin == 1) {
            $product = Product::find($id);
        }
        if ($product === null) {
            return redirect()->back();
        }
        return view('prod$product.edit')->with('prod$product', $product);
    }

    public function update(Request $request,  $id)
    {
        if (Auth::user()->is_admin == 1) {
            $product = Product::find($id);
        }
        if ($product === null) {
            return redirect()->back();
        }
        $this->validate($request, [
            'title' =>  'required',
            'description' =>  'required'
        ]);

        //   dd($request->all());

        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time() . $photo->getClientOriginalName();
            $photo->move('uploads/prod$products', $newPhoto);
            $product->photo = 'uploads/prod$products/' . $newPhoto;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //dd($id);
        if (Auth::user()->is_admin == 1) {
            $product = Product::find($id);
        }
        if ($product === null) {
            return redirect()->back();
        }

        $product->delete($id);
        return redirect()->back();
    }


    public function hdelete($id)
    {
        if (Auth::user()->is_admin == 1) {
            $product = Product::withTrashed()->where('id',  $id)->first();
        }
        if ($product === null) {
            return redirect()->back();
        }
        $product->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        if (Auth::user()->is_admin == 1) {
            $product = Product::withTrashed()->where('id',  $id)->first();
        }
        if ($product === null) {
            return redirect()->back();
        }
        $product->restore();
        return redirect()->back();
    }
}
