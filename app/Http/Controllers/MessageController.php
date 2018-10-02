<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;
use Carbon\Carbon;

class MessageController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allMessage = Message::where('sender_id', '==', Auth::user()->id)->orderBy('id','desc')->get();
        return view('message.index',compact('allMessage'));
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
        $this->validate($request,[
            'message' => 'required',
        ]);
        //
        $input['sender_id'] = Auth::user()->id;
        $input['receiver_id'] = $request->input('receiver_id');
        $input['message'] = $request->input('message');

        Message::create($input);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $read_at = Message::where('sender_id',$id)->where('receiver_id',Auth::user()->id)->update(['read_at' => Carbon::now()]);

        $allMessage = Message::where('sender_id', '!=', Auth::user()->id)->orderBy('id','desc')->get();
        return view('message.show', compact('allMessage','id'));
    }


    public function messages($id)
    {
        

        
        //
        $messages = Message::where([['sender_id', '=', $id], ['receiver_id', '=', Auth::user()->id]])
                    ->orWhere([['sender_id', '=', Auth::user()->id], ['receiver_id', '=', $id],])
                    ->get();
        return view('message.messages', compact('messages'))->render();

    }


    public function unreadMessages()
    {
        
        //
        $read_at = App\Message::where('read_at',null)->where('sender_id',$message->sender_id)->where('receiver_id',Auth::user()->id)->get();
        return count($read_at);

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
        //
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
