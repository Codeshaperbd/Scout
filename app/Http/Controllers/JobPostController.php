<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPost;
use App\BrokerInfo;
use App\State;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = JobPost::orderBy('id', 'desc')->get();
        return view('auth.broker.jobpost.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::pluck('name','name')->all();
        return view('auth.broker.jobpost.create',compact('states'));
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
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required', //only allow this type extension file.
            'industry' => 'required',
            'JobCategory' => 'required',
            'location' => 'required',
        ]);
        //get user id
        $user_id = Auth::user()->id;
        $broker_info = BrokerInfo::where('user_id',$user_id)->first();

        //Resume Table Data
        $JobPost['broker_info_id']  = $broker_info->id;
        $JobPost['title']  = $request->input('title');
        $JobPost['description']  = $request->input('description');
        $JobPost['industry']  = $request->input('industry');

        $JobCategories  = $request->input('JobCategory');
        $JobPost['JobCategory']  = serialize($JobCategories);

        $JobPost['location']  = $request->input('location');
        $JobPost['byemailapply']  = $request->input('byemailapply');
        $JobPost['byurlapply']  = $request->input('byurlapply');
        $JobPost['employment_type']  = $request->input('employment_type');
        $JobPost['education']  = $request->input('education');
        $JobPost['qualifications']  = $request->input('qualifications');
        $JobPost['experience']  = $request->input('experience');
        $JobPost['responsibilities']  = $request->input('responsibilities');
        $JobPost['skills']  = $request->input('skills');
        $JobPost['work_hour']  = $request->input('work_hour');
        $JobPost['estimated_salary']  = $request->input('estimated_salary');
        $JobPost['incentive']  = $request->input('incentive');
        $JobPost['base_salary']  = $request->input('base_salary');

        $jobposted = JobPost::create($JobPost);
        $job_id = $jobposted->id;


        return view('pricing',compact('job_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $job = JobPost::where('slug',$slug)->first();
        return view('auth.broker.jobpost.single',compact('job'));
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
        //$job = JobPost::where('slug',$slug)->first();
        $job = JobPost::where('id',$id)->delete();
        Session::flash('deleteJob', 'Post Has Been Deleted.');
        return redirect()->back();
    }
}
