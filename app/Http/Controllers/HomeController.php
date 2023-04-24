<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $products=DB::table('products')->get();
        $title='';
        return view('posts.index',compact('title','products'));
    }

    public function about()
    {
        $title='A&GStore';
        return view('posts.about');
    }


}
