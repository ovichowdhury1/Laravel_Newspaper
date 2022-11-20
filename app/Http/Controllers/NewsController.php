<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newspaper= news::with('categories')->get();

        // dd($newspaper);
        // die;
        return view('backend.news.index',compact('newspaper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.news.create',compact('categories'));
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
            'banner_img' => 'required|max:5024|mimes:png,jpg,svg,webp,jpeg',
            'tags' => 'required',
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


        $news = new News();
        $news->title= $request->title;
        $news->news_img = $request->news_img;
        $news->details = $request->details;
        $news->save();
        $news->categories()->attach($request->Category_name);



        $input = $request->all();
        $tags = explode("", "", $input['tags']); // pecahkan string ke array tags
        $post = news::create($input); // data post ke db
        $post->tag($tags);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
