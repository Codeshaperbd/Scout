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
                       <h1>Industry news</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">Industry news</li>
              </ul>
           </div>
        </div>
    </div>

    <!-- /. header banner --> 
    
    <!-- Main Content -->
    <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-about-text-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-about-text">
                                <h2>About Our Company</h2>
                                <span class="careerfy-about-sub">Pellentesque accumsan nisl varius risus mollis varius sed eu neque Cras fringilla sagittis rhoncus.</span>
                                <p>In accumsan pulvinar maximus. Phasellus elementum rutrum dolor id mollis aece et lectus accumsan ipsum facilisis malesuada vel ut diam. Pellentesque vitae tempus sapien, vel aliquam nulla. In in fringilla massa, id consectetur lacus tibul.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a auctor urna, et porttitor lorem. Fusce at neque et orci rhoncus hendrerit. Praesent nec quam ac orci placerat semper.</p>
                                <a href="{{route('all_jobs')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a>
                            </div>
                        </div>
                        <div class="col-md-6 careerfy-typo-wrap"><div class="careerfy-about-thumb"><img src="public-assets/extra-images/about-us-thumb.png" alt=""></div></div>
                        <div class="col-md-12 careerfy-typo-wrap">
                            <div class="careerfy-modren-counter">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-paper careerfy-color"></i>
                                        <span class="word-counter">{{ $totalresume ? count($totalresume) : '0' }}</span>
                                        <small>Resume(s)</small>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-resume-document careerfy-color"></i>
                                        <span class="word-counter">{{ $totaljob ? count($totaljob) : '0' }}</span>
                                        <small>Job Posted</small>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-briefcase careerfy-color"></i>
                                        <span class="word-counter">{{ $totaluser ? count($totaluser) : '0' }}</span>
                                        <small>User's</small>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->




        </div>
    <!-- Main Content -->
@endsection

