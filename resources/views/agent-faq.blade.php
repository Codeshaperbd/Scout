@extends('layouts.app')


@section('content')

    <!-- header banner -->
    <div class="header-banner">
        <div class="careerfy-subheader careerfy-subheader-with-bg" style="background-image: url('https://careerfy.net/belovedjobs/wp-content/uploads/subheader-bgg.png');">
           <span class="careerfy-banner-transparent" style="background-color: rgba(30,49,66,0.81) !important;"></span>
           <div class="container">
              <div class="row">
                 <div class="col-md-12">
                    <div class="careerfy-page-title">
                       <h1>Agent FAQ</h1>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>

    <!-- /. header banner --> 
    
    <!-- /. header sub menu  --> 
    @include('includes.inner_menu')


    <!-- Main Content -->
    <div class="careerfy-main-content">
        
        <!-- Main Section -->
        <div class="careerfy-main-section careerfy-dashboard-fulltwo">
            <div class="container">
				<div class="row">

                    <div class="col-md-3 careerfy-typo-wrap">
                        <div class="widget careerfy-search-form-widget">
                            <form>
                                <label>Find Your Question:</label>
                                <input value="Keyword" onblur="if(this.value == '') { this.value ='Keyword'; }" onfocus="if(this.value =='Keyword') { this.value = ''; }" type="text">
                                <input type="submit" value="">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                        <div class="widget widget-text-info">
                            <h2 class="careerfy-slash-title">Don’t find your Question?</h2>
                            <p>You are not able to find the answer to your question? No Problem!</p>
                            <a href="{{route('contact')}}" class="careerfy-text-btn careerfy-bgcolor">contact us</a>
                        </div>
                        <div class="widget widget_faq">
                            <h2 class="careerfy-slash-title">Recent Questions</h2>
                            @if(!empty($recentfaqs))
                            <ul>
                            	@foreach($recentfaqs as $faq)
                                <li><a href="#">{{$faq->question}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="careerfy-section-title"><h2>FREQUENTLY ASKED QUESTIONS</h2></div>
                        <div class="panel-group careerfy-accordion" id="accordion">
                        	@if(!empty($faqs))
                        	@php
                        		$i = 0;
                        	@endphp
                        	@foreach($faqs as $faq)
                        	@php
                        		$i++;
                        	@endphp
	                            <div class="panel panel-default">
	                                <div class="panel-heading">
	                                    <h4 class="panel-title">
	                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $i }}" aria-expanded="{{ $i == 1 ? 'true' : 'false' }}" aria-controls="collapse{{ $i }}">
	                                        <i class="careerfy-icon careerfy-arrows"></i> {{$faq->question}}
	                                      </a>
	                                    </h4>
	                                </div>
	                                <div id="collapse{{ $i }}" class="panel-collapse collapse {{ $i == 1 ? 'in' : '' }}">
	                                    <div class="panel-body">
	                                        {{strip_tags($faq->answer)}}
	                                    </div>
	                                </div>
	                            </div>
                            @endforeach
                            @endif

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
@endsection

