<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\BrokerInfo;
use App\UserLocation;


class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('auth.broker.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id == 2) {
            //
            $countries = Country::pluck('name','id')->all();
            return view('auth.broker.create',compact('countries'));
        } else {
            return route('myresume.create');
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
            'user_id' => 'required|unique:broker_infos',
            'name' => 'required',
            'profile_img' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
            'phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            
        ]);

        //get user id
        $user_id = Auth::user()->id;

        //Resume Table Data
        $broker_info['user_id']  = $user_id;
        $broker_info['name']  = $request->input('name');
        //upload profile image
        if($file = $request->file('profile_img')){

            $name = time() .".". $file->getClientOriginalExtension();
            $file->move('profile_images',$name);
            $broker_info['profile_img'] = $name;
        }

        $broker_info['phone']  = $request->input('phone');
        BrokerInfo::create($broker_info);


        //User location table data
        $user_location['user_id']  = $user_id;
        $user_location['country_id']  = $request->input('country_id');
        $user_location['state_id']  = $request->input('state_id');
        $user_location['city_id']  = $request->input('city_id');
        $user_location['post_code']  = $request->input('post_code');
        $user_location['geo_tagging']  = $request->input('geo_tagging');
        $user_location['lat']  = $request->input('lat');
        $user_location['lng']  = $request->input('lng');
        UserLocation::create($user_location);


        Session::flash('broker_created','Company Profile Has Been Created Successfully.');
        return redirect(route('console'));

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
        $user_id = Auth::user()->id;

        //Resume Table Data
        $broker_info = BrokerInfo::where('user_id',$user_id)->first();
        $broker_info['user_id']  = $user_id;
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

        Session::flash('broker_updated','Company Profile Has Been Updated Successfully.');
        // update successfull then redirect 
        return redirect(route('console'));
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

        $broker_info = BrokerInfo::where('user_id',$user_id)->first();   //Resume Table Data

        if($broker_info->profile_img != ''){
            unlink(public_path('profile_images/') . $broker_info->profile_img);
        }

        BrokerInfo::findOrfail($id)->delete();
        UserLocation::where('user_id',$user_id)->delete();

        Session::flash('deleteResume', 'Resume Has Been Deleted.');
        // update successfull then redirect 
        return redirect(route('console'));
    }
}
