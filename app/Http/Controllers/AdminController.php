<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $title='Admin';
        return view('admin.product.index',compact('title'));
    }
}
