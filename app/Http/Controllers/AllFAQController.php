<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ; 


class AllFAQController extends Controller
{

    // prelicensee_blog
    public function agentfaq(){
        $faqs = FAQ::where('faq_for','agent')->take(15)->get();
        $recentfaqs = FAQ::orderBy('id', 'desc')->where('faq_for','agent')->take(5)->get();
        return view('agent-faq',compact('faqs','recentfaqs'));
    }


    // industry news
    public function brokerfaq(){
        $faqs = FAQ::where('faq_for','broker')->take(15)->get();
        $recentfaqs = FAQ::orderBy('id', 'desc')->where('faq_for','broker')->take(5)->get();
        return view('broker-faq',compact('faqs','recentfaqs'));
    }
}
