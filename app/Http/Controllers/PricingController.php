<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PaymantDetails;
use App\JobPost;
use Illuminate\Support\Facades\Session;


class PricingController extends Controller
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



    //pricing page
    public function pricing()
    {
       return view('pricing');
    }

    //pricing page
    public function store(Request $request)
    {


        // Insert Item into PaymentDetails
		$token = $request->stripeToken;
		$job_id = (int) $request->input('job_id');

		// Update Job Post Table
		JobPost::where('id', $job_id)
          ->update(['is_active' => 1]);

        // Insert Item into PaymentDetails
		PaymantDetails::create([
			'job_id' => $job_id
		])->newSubscription($request->input('packeg_name'), $request->input('pricing_plan'))->create($token);

		//

        Session::flash('job_created','Job Posted Successfully.');
		return redirect(route('jobpost.index'));
    }
}
