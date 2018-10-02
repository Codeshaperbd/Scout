<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Resume;
use App\AgentInfo;
use App\UserLocation;
use App\ExperienceDetails;
use App\EducationDetails;
use DB;



class ResumeController extends Controller
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
        $user_id    = Auth::user()->id;
        $resume     = Resume::where('user_id',$user_id)->firstOrFail();
        $expericnces = ExperienceDetails::where('user_id',$user_id)->get();
        $educations  = EducationDetails::where('user_id',$user_id)->get();
        $agent_info = AgentInfo::where('user_id',$user_id)->firstOrFail();
        $address    = UserLocation::where('user_id',$user_id)->firstOrFail();

        return view('auth.agent.resume.index',compact('resume','expericnces','educations','agent_info','address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id == 1) {
            //
            $countries = Country::pluck('name','id')->all();
            return view('auth.agent.resume.create',compact('countries'));
        } else {
            return route('broker.create');
        }
        
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

        //get user id
        $user_id = Auth::user()->id;

        //Resume Table Data
        $resume = Resume::where('user_id',$user_id)->first();
        if(empty($resume)):
            $resume['user_id']  = $user_id;
            $resume['job_title']  = $request->input('job_title');
            //upload profile image
            if($file = $request->file('profile_img')){

                $name = time() . Auth::user()->name .".". $file->getClientOriginalExtension();
                $file->move('profile_images',$name);
                $resume['profile_img'] = $name;
            }

            $resume['industry']  = $request->input('industry');
            $resume['bth_day']  = $request->input('bth_day');
            $resume['birth_month']  = $request->input('birth_month');
            $resume['birth_year']  = $request->input('birth_year');
            $resume['gander']  = $request->input('gander');
            
            $resume_position  = $request->input('position');
            $resume['position']  = serialize($resume_position);

            $resume['cover_letter']  = $request->input('cover_letter');
            $resume['alert']  = $request->input('alert');
            $save = Resume::create($resume);
        endif;

        //Agent Info Table Data 
        $agentInfo = AgentInfo::where('user_id',$user_id)->first();
        if(empty($agentInfo)):
            $agent_info['user_id']  = $user_id;
            $agent_info['licensed']  = $request->input('licensed');
            $agent_info['licensed_type']  = $request->input('licensed_type');
            $agent_info['expericnce']  = $request->input('expericnce');
            
            //upload resume
            if($resume_file = $request->file('resume')){
                $resume_name = time() . Auth::user()->name .".". $resume_file->getClientOriginalExtension();
                $resume_file->move('resumes',$resume_name);
                $agent_info['resume'] = $resume_name;
            }

            $agent_info['linkedin']  = $request->input('linkedin');
            $agent_info['where_know']  = $request->input('where_know');
            AgentInfo::create($agent_info);
        endif;

        //User location table data
        $location = UserLocation::where('user_id',$user_id)->first();
        if(empty($location)):
            $user_location['user_id']  = $user_id;
            $user_location['country_id']  = $request->input('country_id');
            $user_location['state_id']  = $request->input('state_id');
            $user_location['city_id']  = $request->input('city_id');
            $user_location['post_code']  = $request->input('post_code');
            $user_location['geo_tagging']  = $request->input('geo_tagging');
            $user_location['lat']  = $request->input('lat');
            $user_location['lng']  = $request->input('lng');
            UserLocation::create($user_location);
        endif;

        //Experience table data
        $expericnce = ExperienceDetails::where('user_id',$user_id)->first();
        if(empty($expericnce)):
            $expericnce['user_id']  = $user_id;
            $expericnce['title']  = $request->input('title');
            $expericnce['co_name']  = $request->input('co_name');
            $expericnce['is_current']  = $request->input('is_current');
            $expericnce['start_date']  = $request->input('start_date');
            $expericnce['end_date']  = $request->input('end_date');
            $expericnce['description']  = $request->input('experience_description');
            ExperienceDetails::create($expericnce);
        endif;

        //Education table data
        $education = EducationDetails::where('user_id',$user_id)->first();
        if(empty($education)):
            $education['user_id']  = $user_id;
            $education['country_of_college']  = $request->input('country_of_college');
            $education['institute_name']  = $request->input('institute_name');
            $education['degree']  = $request->input('degree');
            $education['major']  = $request->input('major');
            $education['graduation_date']  = $request->input('graduation_date');
            $education['cgpa']  = $request->input('cgpa');
            EducationDetails::create($education);
        endif;


        Session::flash('resume_created','Resume Has Been Created Successfully.');

        return redirect(route('myresume.index'));


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
    public function edit($slug)
    {
        //
        $user_id = Auth::user()->id;
        $resume = Resume::where('user_id',$user_id)
                                ->first();
        $agentInfo = AgentInfo::where('user_id',$user_id)
                                ->first();
        $userLocation = UserLocation::where('user_id',$user_id)
                                ->first();
        $experienceDetails = ExperienceDetails::where('user_id',$user_id)
                                ->first();
        $educationDetails = EducationDetails::where('user_id',$user_id)
                                ->first();


        $countries = Country::all();
        $states = State::where('country_id', $userLocation->country_id)->get();
        $cities = City::where('state_id', $userLocation->state_id)->get();

        return view('auth.agent.resume.edit',compact('resume','agentInfo','userLocation','experienceDetails','educationDetails','countries','states','cities'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {//
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
            // 'country_of_college' => 'required',
            // 'institute_name' => 'required',
            // 'degree' => 'required',
            // 'major' => 'required',
            // 'graduation_date' => 'required'
        ]);


        //
        $user_id = Auth::user()->id;
        //Resume
        $resume = Resume::where('user_id',$user_id)->first();   //Resume Table Data
        $resume['user_id']  = $user_id;
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
        $agent_info = AgentInfo::where('user_id',$user_id)->first();  //Agent Info
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
        $user_location = UserLocation::where('user_id',$user_id)->first();
        $user_location['user_id']  = $user_id;
        $user_location['country_id']  = $request->input('country_id');
        $user_location['state_id']  = $request->input('state_id');
        $user_location['city_id']  = $request->input('city_id');
        $user_location['post_code']  = $request->input('post_code');
        $user_location['geo_tagging']  = $request->input('geo_tagging');
        $user_location['lat']  = $request->input('lat');
        $user_location['lng']  = $request->input('lng');
        $user_location->save();



        //Experience table data
        $expericnce = ExperienceDetails::where('user_id',$user_id)->first();
        $expericnce['user_id']  = $user_id;
        $expericnce['title']  = $request->input('title');
        $expericnce['co_name']  = $request->input('co_name');
        $expericnce['is_current']  = $request->input('is_current');
        $expericnce['start_date']  = $request->input('start_date');
        $expericnce['end_date']  = $request->input('end_date');
        $expericnce['description']  = $request->input('experience_description');
        $expericnce->save();

        //Education table data
        $education = EducationDetails::where('user_id',$user_id)->first();
        $education['user_id']  = $user_id;
        $education['country_of_college']  = $request->input('country_of_college');
        $education['institute_name']  = $request->input('institute_name');
        $education['degree']  = $request->input('degree');
        $education['major']  = $request->input('major');
        $education['graduation_date']  = $request->input('graduation_date');
        $education['cgpa']  = $request->input('cgpa');
        $education->save();



        Session::flash('resume_updated','Resume Has Been Updated Successfully.');

        // update successfull then redirect 
        return redirect(route('myresume.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        //

        $resume = Resume::where('user_id',$user_id)->first();   //Resume Table Data
        $agent_info = AgentInfo::where('user_id',$user_id)->first();  //Agent Info

        if($resume->profile_img != ''){
            unlink(public_path('profile_images/') . $resume->profile_img);
        }
        if($agent_info->resume != ''){
            unlink(public_path('resumes/') . $agent_info->resume);
        }

        Resume::findOrfail($id)->delete();
        UserLocation::where('user_id',$user_id)->delete();
        AgentInfo::where('user_id',$user_id)->delete();
        ExperienceDetails::where('user_id',$user_id)->delete();
        EducationDetails::where('user_id',$user_id)->delete();

        Session::flash('deleteResume', 'Resume Has Been Deleted.');

        // update successfull then redirect 
        return redirect(route('console'));
    }






}
