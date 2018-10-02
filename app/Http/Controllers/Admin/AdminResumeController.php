<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Resume;
use App\AgentInfo;
use App\UserLocation;
use App\ExperienceDetails;
use App\EducationDetails;
use App\Country;
use App\State;
use App\City;


class AdminResumeController extends Controller
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
        $resumes = Resume::orderBy('id','desc')->get();
        return view('admin.manage-resumes.index',compact('resumes'));
    }
    /**
     * Display a listing of the resource.
     */
    public function alerts()
    {
        //
        $alerts = Resume::where('alert',1)->orderBy('id','desc')->get();
        return view('admin.manage-resumes.alerts',compact('alerts'));
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
        $resume = Resume::where('id',$id)
                                ->first();
        $agentInfo = AgentInfo::where('user_id',$resume->user_id)
                                ->first();
        $userLocation = UserLocation::where('user_id',$resume->user_id)
                                ->first();
        $experienceDetails = ExperienceDetails::where('user_id',$resume->user_id)
                                ->first();
        $educationDetails = EducationDetails::where('user_id',$resume->user_id)
                                ->first();


        $countries = Country::all();
        $states = State::where('country_id', $userLocation->country_id)->get();
        $cities = City::where('state_id', $userLocation->state_id)->get();
            
        return view('admin.manage-resumes.edit',compact('resume','agentInfo','userLocation','experienceDetails','educationDetails','countries','states','cities'));

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
        $this->validate($request,[
            'job_title' => 'required',
            'profile_img' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
            'industry' => 'required',
            'bth_day' => 'required',
            'birth_month' => 'required',
            'birth_year' => 'required',
            'gander' => 'required',
            'position' => 'required',
            'cover_letter' => 'required',
            'licensed' => 'required',
            'licensed_type' => 'required',
            'expericnce' => 'required',
            'resume' => 'mimes:pdf,docx,doc,rtf,txt', //only allow this type extension file.
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'geo_tagging' => 'required',
            'country_of_college' => 'required',
            'institute_name' => 'required',
            'degree' => 'required',
            'major' => 'required',
            'graduation_date' => 'required'
        ]);


        //Resume
        $resume = Resume::where('id',$id)->first();   


        $resume['user_id']  = $resume->user_id;
        $resume['job_title']  = $request->input('job_title');
            //upload profile image
        if($file = $request->file('profile_img')){
            unlink(public_path('profile_images/') . $resume->profile_img);
            $name = time() . Auth::user()->name .".". $file->getClientOriginalExtension();
            $file->move('profile_images',$name);
            $resume['profile_img'] = $name;
        }
        $resume['industry']  = $request->input('industry');
        $resume['bth_day']  = $request->input('bth_day');
        $resume['birth_month']  = $request->input('birth_month');
        $resume['birth_year']  = $request->input('birth_year');
        $resume['gander']  = $request->input('gander');
            //potition serialize array
        $resume_position  = $request->input('position');
        $resume['position']  = serialize($resume_position);
 
        $resume['cover_letter']  = $request->input('cover_letter');
        $resume['alert']  = $request->input('alert');
            // update resume
        $resume->save();


        //Agent Info Table Data update
        $agent_info = AgentInfo::where('user_id',$resume->user_id)->first();  //Agent Info
        $agent_info['licensed']  = $request->input('licensed');
        $agent_info['licensed_type']  = $request->input('licensed_type');
        $agent_info['expericnce']  = $request->input('expericnce');
        
            //upload resume
        if($resume_file = $request->file('resume')){
            unlink(public_path('resumes/') . $agent_info->resume);
            $resume_name = time() . Auth::user()->name .".". $resume_file->getClientOriginalExtension();
            $resume_file->move('resumes',$resume_name);
            $agent_info['resume'] = $resume_name;
        }

        $agent_info['linkedin']  = $request->input('linkedin');
        $agent_info['where_know']  = $request->input('where_know');
            //AgentInfo::create($agent_info);
        $agent_info->save();


        //User location table data
        $user_location = UserLocation::where('user_id',$resume->user_id)->first();
        $user_location['user_id']  = $resume->user_id;
        $user_location['country_id']  = $request->input('country_id');
        $user_location['state_id']  = $request->input('state_id');
        $user_location['city_id']  = $request->input('city_id');
        $user_location['post_code']  = $request->input('post_code');
        $user_location['geo_tagging']  = $request->input('geo_tagging');
        $user_location['lat']  = $request->input('lat');
        $user_location['lng']  = $request->input('lng');
        $user_location->save();



        //Experience table data
        $expericnce = ExperienceDetails::where('user_id',$resume->user_id)->first();
        $expericnce['user_id']  = $resume->user_id;
        $expericnce['title']  = $request->input('title');
        $expericnce['is_current']  = $request->input('is_current');
        $expericnce['start_date']  = $request->input('start_date');
        $expericnce['end_date']  = $request->input('end_date');
        $expericnce['description']  = $request->input('experience_description');
        $expericnce->save();

        //Education table data
        $education = EducationDetails::where('user_id',$resume->user_id)->first();
        $education['user_id']  = $resume->user_id;
        $education['country_of_college']  = $request->input('country_of_college');
        $education['institute_name']  = $request->input('institute_name');
        $education['degree']  = $request->input('degree');
        $education['major']  = $request->input('major');
        $education['graduation_date']  = $request->input('graduation_date');
        $education['cgpa']  = $request->input('cgpa');
        $education->save();



        Session::flash('resume_updated','Resume Has Been Updated Successfully.');

        // update successfull then redirect 
        return redirect(route('manage-resumes.index'));
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
}
