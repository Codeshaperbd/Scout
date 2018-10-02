<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\JobPost;
use App\BrokerInfo;

class AdminJobPostingController extends Controller
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
        $jobposts = JobPost::withTrashed()->orderBy('id','desc')->get();
        return view('admin.manage-jobs.index',compact('jobposts'));
    }


    public function companyJob($id)
    {
        //
        $jobposts = JobPost::withTrashed()->where('broker_info_id',$id)->orderBy('id','desc')->get();
        return view('admin.manage-jobs.companyJob',compact('jobposts'));
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
        $jobpost = JobPost::findOrFail($id);
        return view('admin.manage-jobs.edit',compact('jobpost'));
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
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required', //only allow this type extension file.
            'industry' => 'required',
            'JobCategory' => 'required',
            'location' => 'required',
        ]);
        //get user id
        $JobPost  = JobPost::where('id',$id)->first();

        //Resume Table Data
        $JobPost['broker_info_id']  = $JobPost->broker_info_id;
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


        $JobPost->save();
        Session::flash('job_update','Job Details Updated Successfully.');
        // update successfull then redirect 
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

        $job = JobPost::withTrashed()->findOrFail($id);
        $job->forceDelete();
        Session::flash('deleteJob', 'Post Has Been Deleted.');
        return redirect(route('manage-jobs.index'));
    }



    public function jobStatus($id,$status) {
        if($status == 'active') {
            JobPost::findOrFail($id)->update(['is_active'=>1]);
            Session::flash('is_active','Job Activated Successfully.');
        }
        if($status == 'inactive') {
            JobPost::findOrFail($id)->update(['is_active'=>0]);
            Session::flash('is_active','Job Deactivated Successfully.');
        }
        return redirect()->back();
    }
}
