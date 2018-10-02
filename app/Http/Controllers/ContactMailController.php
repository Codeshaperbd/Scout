<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Session;


class ContactMailController extends Controller
{
    //contact page
    public function index()
    {
       return view('contact');
    }


    //send

    public function send(Request $request) {
    	

    	$data = [

    		'email' => $request->sender_mail,
    		'subject' => $request->subject,
    		'number' => $request->number,
    		'message' => $request->message,

    	];

    	Mail::send('send',$data ,function($message) use ($data) {
		    
		    $message->from('shuvossd1@gmail.com','Reality Scout');
		    $message->to($data['email'])->subject($data['subject']);

		});

    	Session::flash('contact_success', 'Thank you for contact with us. We will contact with you soon.');
		return redirect()->back();

    }
}
