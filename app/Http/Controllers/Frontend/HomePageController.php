<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index(){
        $posts=  Post::orderBy('id','DESC')->with('user:id,name')->latest()->paginate(3);
        //dd($posts);
        return view('Frontend.homePage',compact('posts'));
    }
}
