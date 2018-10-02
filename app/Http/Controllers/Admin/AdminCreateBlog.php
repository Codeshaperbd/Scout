<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Blogs;

use App\Category;

class AdminCreateBlog extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blogs::orderBy('id','desc')->get();
        return view('admin.manage-blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        $categories = Category::pluck('name','id')->all();
        return view('admin.manage-blog.create',compact('categories'));

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
        //
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
        ]);

        //get user id
        $user_id = Auth::user()->id;

        //Resume Table Data
        $input['user_id']  = $user_id;

        $input['category_id']  = $request->input('category_id');
        
        //upload profile image
        if($file = $request->file('photo')){

            $name = time() .".". $file->getClientOriginalExtension();
            $file->move('blog-images',$name);
            $input['photo'] = $name;
            
        }

        $input['title']  = $request->input('title');
        $input['body']  = $request->input('body');
        $input['status']  = $request->input('status');

        Blogs::create($input);

        Session::flash('create_post','Post Has Been Created.');
        return redirect(route('blog.index'));
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
        $blog = Blogs::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
        return view('admin.manage-blog.edit', compact('blog','categories'));
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
        $input = $request->all();

        if($file = $request->file('photo')){
            $blogImg = Blogs::findOrFail($id);
            unlink(public_path('blog-images/') . $blogImg->photo);

            $name = time() .".". $file->getClientOriginalExtension();
            $file->move('blog-images',$name);
            $input['photo'] = $name;

        }

        if(isset($request->status)){
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }

        Auth::user()->blog()->whereId($id)->first()->update($input);
        Session::flash('update_post','Post Has Been updated.');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $blog = Blogs::findOrfail($id);

        if(!empty($blog->photo)){

            unlink(public_path('blog-images/') . $blog->photo);

        }

        $blog->delete();

        Session::flash('deletepost', 'Post Has Been Deleted.');
        // update successfull then redirect 
        return redirect()->back();
    }
}
