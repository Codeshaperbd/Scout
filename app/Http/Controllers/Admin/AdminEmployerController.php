<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\BrokerInfo;
use App\UserLocation;
use App\Country;
use App\State;
use App\City;

class AdminEmployerController extends Controller
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
        $allemploye = BrokerInfo::orderBy('id','desc')->get();;
        return view('admin.manage-employe.index',compact('allemploye'));
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
            $brokerinfo = BrokerInfo::where('id',$id)
                                ->first();
            $userLocation = UserLocation::where('user_id',$brokerinfo->user_id)
                                ->first();


            $countries = Country::all();
            $states = State::where('country_id', $userLocation->country_id)->get();
            $cities = City::where('state_id', $userLocation->state_id)->get();


            return view('admin.manage-employe.edit',compact('brokerinfo','userLocation','countries','states','cities'));

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
        // validate input form
        $this->validate($request,[
            'name' => 'required',
            'profile_img' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
            'phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
        ]);


        //get user id

        //Resume Table Data
        $broker_info = BrokerInfo::where('id',$id)->first();
        $broker_info['user_id']  = $broker_info->user_id;
        $broker_info['name']  = $request->input('name');
        //upload profile image
        if($file = $request->file('profile_img')){
            unlink(public_path('profile_images/') . $resume->profile_img);
            $name = time() . Auth::user()->name .".". $file->getClientOriginalExtension();
            $file->move('profile_images',$name);
            $broker_info['profile_img'] = $name;
        }

        $broker_info['phone']  = $request->input('phone');
        $broker_info->save();

  

        //User location table data
        $user_location = UserLocation::where('user_id',$broker_info->user_id)->first();
        $user_location['user_id']  = $broker_info->user_id;
        $user_location['country_id']  = $request->input('country_id');
        $user_location['state_id']  = $request->input('state_id');
        $user_location['city_id']  = $request->input('city_id');
        $user_location['post_code']  = $request->input('post_code');
        $user_location['geo_tagging']  = $request->input('geo_tagging');
        $user_location['lat']  = $request->input('lat');
        $user_location['lng']  = $request->input('lng');
        $user_location->save();

        Session::flash('broker_updated','Company Profile Has Been Updated Successfully.');
        // update successfull then redirect 
        return redirect(route('manage-employe.index'));
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
        $broker_info = BrokerInfo::where('id',$id)->first();   //Resume Table Data

        if($broker_info->profile_img != ''){
            unlink(public_path('profile_images/') . $broker_info->profile_img);
        }

        BrokerInfo::findOrfail($id)->delete();
        UserLocation::where('user_id',$broker_info->user_id)->delete();

        Session::flash('deleteResume', 'Resume Has Been Deleted.');
        // update successfull then redirect 
        return redirect(route('console'));
    }
}
