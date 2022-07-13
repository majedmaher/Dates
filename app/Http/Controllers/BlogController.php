<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $blogs = Blog::orderBy('created_at', 'DESC')->get();
            return view('blog.index')->with('blogs', $blogs);
        }
        return redirect()->back();
    }

    public function blogsTrashed()
    {
        // $blogs = Blog::onlyTrashed()->where('user_id', Auth::id())->get();
        if (Auth::user()->is_admin == 1) {
            $blogs = Blog::onlyTrashed()->get();
        } else {
            return redirect()->back();
        }
        return view('blog.trashed')->with('blogs', $blogs);
    }
    public function create()
    {
        if (Auth::user()->is_admin == 1) {
            return view('blog.create');
        } else {
            return redirect()->back();
        }
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
            $photo->move('uploads/blogs', $newPhoto);

            $blog = Blog::create([
                'user_id' =>  Auth::id(),
                'title' =>  $request->title,
                'description' =>   $request->description,
                'photo' =>  'uploads/blogs/' . $newPhoto,
            ]);
        }
        // dd($blog);
        return redirect()->back();
    }
    public function show($id)
    {
        if (Auth::user()->is_admin == 1) {
            $blog = Blog::find($id);
            return view('blog.show')->with('blog', $blog);
        } else {
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        if (Auth::user()->is_admin == 1) {
            $blog = Blog::find($id);
        } else {
            return redirect()->back();
        }
        return view('blog.edit')->with('blog', $blog);
    }

    public function update(Request $request,  $id)
    {
        if (Auth::user()->is_admin == 1) {
            $blog = Blog::find($id);
        } else {
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
            $photo->move('uploads/blogs', $newPhoto);
            $blog->photo = 'uploads/blogs/' . $newPhoto;
        }

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //dd($id);
        if (Auth::user()->is_admin == 1) {
            $blog = Blog::find($id);
        } else {
            return redirect()->back();
        }
        // $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        // if ($blog === null) {
        //     return redirect()->back();
        // }

        $blog->delete($id);
        return redirect()->back();
    }


    public function hdelete($id)
    {
        if (Auth::user()->is_admin == 1) {
            $blog = Blog::withTrashed()->where('id',  $id)->first();
        } else {
            return redirect()->back();
        }
        $blog->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        if (Auth::user()->is_admin == 1) {
            $blog = Blog::withTrashed()->where('id',  $id)->first();
        } else {
            return redirect()->back();
        }
        $blog->restore();
        return redirect()->back();
    }
}
