<?php

namespace App\Http\Controllers\frontend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    public function index()
    {
        $allBanner = Banner::where('status',0)->latest()->get();
        return view('front.index',compact('allBanner'));

    }
}
