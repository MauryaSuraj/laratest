<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
    public function store(Request $request){
        if ($request->hasFile('image')){
            if ($request->file('image')->isValid()){
//                $path = $request->image->path();
//                $extension = $request->image->extension();
                $path = $request->image->store('public/images');
//               echo $path;
                $url = Storage::url($path);
            }
        }
        return view('home',compact('url'));
    }
}
