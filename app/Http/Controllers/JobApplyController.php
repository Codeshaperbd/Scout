<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BrokerInfo;
use App\JobApply;
use App\JobPost;
use App\User;
use App\Resume;
use App\ExperienceDetails;
use App\EducationDetails;
use App\AgentInfo;
use App\UserLocation;

class JobApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //apply controller 
    public function apply(Request $request, $status ,$jobId)
    {
        $broker = JobPost::where('id',$jobId)->first();
    	// 
    	if(!empty($status == 'apply')){
    		//create an application
    		$apply = JobApply::create([
                'user_id' => Auth::user()->id,
    			'broker_info_id' => $broker->broker_info_id,
    			'job_id' => $jobId,
    			'status' => 'applied',
    			'cover_letter' => $request->input('cover_letter'),
    		]);

    		Session::flash('applied', 'Congratulation! You have successfully applied for this job.');

    	} elseif(!empty($status == 'cancle')){
    		//cancle application
    		$apply = JobApply::where('user_id', Auth::user()->id)->where('job_id', $jobId)->delete();

    		Session::flash('cancle', 'Application cancled.');

    	}

    	return redirect()->back();
    }


    // show all apps
    public function allApplications($slug){
        $getjob = JobPost::where('slug',$slug)->first();
        $jobApply = JobApply::where('job_id',$getjob->id)->get();
        if(!empty($jobApply)){
            return view('auth.broker.job-applied.index',compact('getjob','jobApply'));
        } else {
            return redirect()->back();
        }
    }

    // show all apps
    public function candidate($agent_id,$job_title){

        //
        $candidate = User::where('id',$agent_id)->first();
        $user_id = $candidate->id;
        $resume     = Resume::where('user_id',$user_id)->firstOrFail();
        $expericnce = ExperienceDetails::where('user_id',$user_id)->first();
        $educations  = EducationDetails::where('user_id',$user_id)->get();
        $agent_info = AgentInfo::where('user_id',$user_id)->firstOrFail();
        $address    = UserLocation::where('user_id',$user_id)->firstOrFail();

        $jobPost = JobPost::where('slug',$job_title)->first();

        return view('auth.broker.job-applied.single',compact('candidate','resume','expericnce','educations','agent_info','address','jobPost'));

    }


    // job applications status
    public function applications(Request $request, $status,$user_id ,$job_title) {
        

        $jobPost = JobPost::where('slug',$job_title)->first();

        $JobApply = JobApply::where('user_id',$user_id)->where('job_id',$jobPost->id)->update(['is_qualify' => $status]);

        if($status == 'interview') {
            Session::flash('is_qualify','Selected For Interview.');
        }
        if($status == 'select') {
            Session::flash('is_qualify','Selected For This Job.');
        }
        if($status == 'reject') {
            Session::flash('is_qualify','Rejected From This Application.');
        }

        return redirect()->back();
    }


    // All application 
    public function allApplied() {
        
        $broker_info = BrokerInfo::where('user_id',Auth::user()->id)->first();
        if(!empty($broker_info)) {
            $jobApply = JobApply::where('broker_info_id',$broker_info->id)->get();
            return view('auth.broker.job-applied.newapplied',compact('jobApply'));
        } else {
            return view('auth.broker.job-applied.newapplied',compact('broker_info'));
        }

    }

    //Agent job applied view
    public function agentApplied() {
        $jobApplies = JobApply::where('user_id',Auth::user()->id)->get();

        return view('auth.agent.applied',compact('jobApplies'));
    }
}
