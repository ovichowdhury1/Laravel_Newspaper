<?php

namespace App\Http\Controllers\backhend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\backhend\BannerController;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at','DESC')->get();
        return view('backend.Banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner_name'=> 'required|max:30',
            'banner_img' => 'required|max:5024|mimes:png,jpg,svg,webp,jpeg'
        ]);

        $extension =$request->banner_img->getClientOriginalExtension();
        $new_banner_img = 'Banner-'.time().'.'.$extension;

        $path = public_path('/storage/img/');

        if(!File::exists($path)){
            mkdir($path);
        }
        $request->banner_img->move($path,$new_banner_img);
       //db store
       $banner = new Banner();
       $banner->banner_name = $request->banner_name;
       $banner->banner_img= $new_banner_img;
       $banner->save();
       return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oldBannerData = Banner::find($id,['id','banner_name','banner_img']);
        return view('backend.Banner.edit',compact('oldBannerData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'banner_name'=> 'required|max:30',
            'banner_img' => 'mimes:png,jpg,svg,webp,jpeg'
        ]);

        if($request->banner_img){

            $extension =$request->banner_img->getClientOriginalExtension();
            $new_banner_img = 'Banner-'.time().'.'.$extension;

            $savePath = public_path().'/storage/img/';

            if(!File::exists($savePath)){
                mkdir($savePath);
            }
            $request->banner_img->move($savePath,$new_banner_img);

            //unlike old image
            $banner = Banner::find($id);
            $oldaPath = public_path().'/storage/img/'.$banner->banner_img;
            if(File::exists($oldaPath)){
                unlink($oldaPath);
            }
            $banner->banner_name = $request->banner_name;
            $banner->banner_img = $new_banner_img;
            $banner->save();
            return back();


        }
        else{
            $banner = Banner::find($id);
            $banner->banner_name= $request->banner_name;
            $banner->save();
            return back();

         }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $banner = Banner::find($id);
     $path = public_path('storage/img/'.$banner->banner_img);
     if(File::exists($path)){
        unlink($path);
     }
    $banner->delete();
    return back();
   }
}
