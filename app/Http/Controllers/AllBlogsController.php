<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;

class AllBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    // prelicensee_blog
    public function prelicensee_blog(){
        $allBlog = Blogs::orderBy('id', 'desc')->take(5)->get();
        $blogs = Blogs::where('category_id','1')->orderBy('id','desc')->paginate(10);
        return view('prelicensee_blog',compact('blogs','allBlog'));
    }


    // industry news
    public function industry_news(){
        $allBlog = Blogs::orderBy('id', 'desc')->take(5)->get();
        $blogs = Blogs::where('category_id','2')->orderBy('id','desc')->paginate(10);
        return view('industry_news',compact('blogs','allBlog'));
    }


    //
    public function blogSingle($slug){
        $blog = Blogs::where('slug',$slug)->first();
        $allBlog = Blogs::orderBy('id', 'desc')->take(5)->get();
        return view('blog-details',compact('blog','allBlog'));
    }

}
