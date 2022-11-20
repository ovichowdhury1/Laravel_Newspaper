<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\backhend\catagories;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        $categories = Category::with('newspapers')->get();
        return view('front.index',compact('categories'));

    }
}
