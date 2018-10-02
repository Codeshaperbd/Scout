<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\JobPost;
use App\JobApply;
use App\PaymantDetails;
use App\Blogs;
use App\State;
use App\Resume;
use App\User;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    //welcome page
    public function welcome()
    {
      
      $features_jobs = JobPost::where('is_active',1)->orderBy('id','DESC')->take(10)->get();
      $paymentDetails = PaymantDetails::orderBy('id','DESC')->take(10)->get();
      $allBlog = Blogs::orderBy('id', 'desc')->take(3)->get();
      $states = State::orderBy('id', 'desc')->take(8)->get();
      $totalresume = Resume::all();
      $totaljob = JobPost::all();
      $totaluser = User::all();
      return view('welcome',compact('features_jobs','paymentDetails','allBlog','states','totalresume','totaljob','totaluser'));
    }



    //contact page
    public function jobs()
    {
       $jobs = JobPost::where('is_active',1)->orderBy('id','DESC')->paginate(2);
       return view('all_jobs',compact('jobs'));
    }


    //contact page
    public function job_details($slug)
    {
       $job = JobPost::where('slug',$slug)->first();
       $job_by_co = JobPost::where('broker_info_id',$job->broker_info_id)->get();
       if(Auth::user()){
        $isApplied = JobApply::where('user_id', Auth::user()->id)->where('job_id', $job->id)->first();
       } else {
         $isApplied = null;
       }

       return view('job_details',compact('job','job_by_co','isApplied'));
    }



    //
    public function services() 
    {
        return view('services');
    }


    // 
    public function how_works_agent() {
        return view('auth.agent.how_work');
    }


    // 
    public function how_works_broker() {
        return view('auth.broker.how_work');
    }


    // 
    public function register_agent() {
        return view('auth.agent.register-agent');
    }


    // 
    public function register_broker() {
        return view('auth.broker.register-broker');
    }


    //
    public function job_state($state){
        $job_state = JobPost::where('location',$state)->paginate(1);
        return view('job_location',compact('job_state','state'));
    }

    //
    public function all_location(){
        $states = State::paginate(28);
        return view('job_location_state',compact('states'));
    }

    // about
    public function about() {
      $totalresume = Resume::all();
      $totaljob = JobPost::all();
      $totaluser = User::all();
      return view('about',compact('totalresume','totaljob','totaluser'));
    }

  
}
