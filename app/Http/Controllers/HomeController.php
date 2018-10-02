<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Country;
use App\State;
use App\City;
use App\UserLocation;
use App\BrokerInfo;
use App\JobPost;
use App\Message;
use DB;
use Illuminate\Support\Facades\Session;
use App\PaymantDetails;
use App\JobApply;
use App\Blogs;
use App\Resume;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $features_jobs = JobPost::where('is_active',1)->orderBy('id','DESC')->take(10)->get();
      $paymentDetails = PaymantDetails::orderBy('id','DESC')->take(10)->get();
      $allBlog = Blogs::orderBy('id', 'desc')->take(3)->get();
      $states = State::orderBy('id', 'desc')->take(8)->get();
      $totalresume = Resume::all();
      $totaljob = JobPost::all();
      $totaluser = User::all();

       return view('home',compact('features_jobs','paymentDetails','allBlog','states','totalresume','totaljob','totaluser'));
    }

    public function dashboard()
    {
        if (Auth::user()->role_id == 1) {
            return view('auth.agent.profile');
        } else {
            $user_id = Auth::user()->id;
            $brokerinfo = BrokerInfo::where('user_id',$user_id)
                                ->first();
            $userLocation = UserLocation::where('user_id',$user_id)
                                ->first();
            $countries = Country::all();
            $states = State::where('country_id', $userLocation->country_id)->get();
            $cities = City::where('state_id', $userLocation->state_id)->get();
            return view('auth.broker.profile',compact('brokerinfo','userLocation','countries','states','cities'));
        }
        
    }

    public function profile_create() {
        if (Auth::user()->role_id == 1) {
            return redirect(route('myresume.create'));
        } else {
            return redirect(route('broker.create'));
        }

        // $resume_uid  = Resume::where('user_id',Auth::user()->id)->firstOrFail();

        // if (Auth::user()->role_id == 1) {
        //     if($resume_uid != "") {
        //         return redirect(route('myresume.index'));
        //     } else {
        //         return redirect(route('myresume.create'));
        //     }
        // } else {
        //     return "Broker Dashboard.";
        // }

    }


    public function showChangePasswordForm()
    {
        return view('passwordChange');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }


    public function update(Request $request, $slug)
    {
        $user_info = User::where('slug',$slug)->first();

        $user_info['name']  = $request->input('name');
        $user_info['lname']  = $request->input('lname');
        $user_info['email']  = $request->input('email');
        $user_info['number']  = $request->input('number');
        $user_info->save();

        Session::flash('update_user','Profile Has Been Updated Successfully.');
        return redirect('console');

    }



}
