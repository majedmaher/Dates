<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubscribeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $subscribes = Subscribe::orderBy('created_at', 'DESC')->get();
            return view('subscribe.index')->with('subscribes', $subscribes);
        } else {
            return redirect()->back();
        }
    }

    public function subscribesTrashed()
    {
        if (Auth::user()->is_admin == 1) {
            $subscribes = Subscribe::onlyTrashed()->get();
            return view('subscribe.trashed')->with('subscribes', $subscribes);
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->is_admin == 1) {
            $subscribe = Subscribe::find($id);

            $subscribe->delete($id);
        }
        return redirect()->back();
    }


    public function hdelete($id)
    {
        if (Auth::user()->is_admin == 1) {
            $subscribe = Subscribe::withTrashed()->where('id',  $id)->first();
            $subscribe->forceDelete();
        }
        return redirect()->back();
    }

    public function restore($id)
    {
        if (Auth::user()->is_admin == 1) {
            $subscribe = Subscribe::withTrashed()->where('id',  $id)->first();
            $subscribe->restore();
        }
        return redirect()->back();
    }
}
