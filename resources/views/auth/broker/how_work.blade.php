@extends('layouts.app')

@section('styles')

    <style type="text/css">
        #svideo{
            padding: 170px 0;
            position: relative;
            margin: 40px 0;
        }

        .svideo_bg {
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            background-color: #ddd;
            background-position: center;
            background-size: cover;
            border-radius: 0 4px 4px 0px;
            box-shadow: 4px 2px 10px 8px #efecec;
        }

        .video-play-btn {
            background: #7d7df978 none repeat scroll 0 0;
            border-radius: 50%;
            color: #fff;
            display: inline-block;
            font-size: 30px;
            height: 80px;
            line-height: 75px;
            margin-top: -40px;
            position: absolute;
            left: 48%;
            text-align: center;
            top: 50%;
            width: 80px;
            border: 4px solid #fff;
            transition: .5s;
        }

        .video-play-btn:hover {
            background: #7d7df9;
            border-color: #7d7df9;
            color: #fff;
            font-size: 35px;
        }
    </style>
@endsection


@section('content')


        <!-- header banner -->
        <div class="header-banner">
            <div class="careerfy-subheader careerfy-subheader-with-bg" style="background-image: url('https://careerfy.net/belovedjobs/wp-content/uploads/subheader-bgg.png');">
               <span class="careerfy-banner-transparent" style="background-color: rgba(30,49,66,0.81) !important;"></span>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="careerfy-page-title">
                           <h1>How It Works</h1>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
        </div>
        <!-- /. header banner --> 

        <!-- /. header sub menu  --> 
        @include('includes.inner_menu_broker')


        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-about-text-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 col-md-offset-2 careerfy-typo-wrap text-center">
                            <div class="careerfy-about-text">
                                <h2>Starting at only $50 per month, we'll manage your recruiting campaign for optimal results. </h2>
                                
                                <p>When you post on Realty Scout, you’re letting hundreds of Pre-Licensed Candidates and Licensed Agents in your area know you’re in business and you mean business.

                                With over 60,000 freshly minted Agents coming into the workforce each year and over 100,000 Agents changing Brokers and seeking new opportunity, you can’t afford not to be on Realty Scout.

                                Realty Scout is designed to help Brokers increase their exposure to Agents that are looking for their next opportunity. We understand that the more quality Agents you have on your team, the more your business will grow.

                                We will publish your post and deliver it to our 100+ job board partners, ensuring you receive maximum exposure. You will receive an unlimited amount of applications and they will be delivered both to your email and Realty Scout dashboard. Additionally, we continuously optimize your post on our network, making certain your ad gets more attention in the right place.</p>

                                <div id="svideo">
                                    <div class="svideo_bg" style="background: url({{url('images/video1.jpg')}}); background-position: center;background-size: cover;">
                                        <a class="mfp-iframe  video-play-btn" href="{{url('videos/video1.mp4')}}"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>


                                <p>Posting a job on Realty Scout starts at just $50 per month. You will be featured on our website and your job will be syndicated to our partners at Indeed, Zip Recruiter, Jobs2Careers, Beyond.com, and many other job boards. If you were to post on each individual site mentioned above, you would easily be spending over $600 per month! Post a job on Realty Scout, let us manage you ad spend for best results and let the applications come rolling in.</p>
                                <a href="{{route('register-broker')}}" class="careerfy-static-btn careerfy-bgcolor"><span>I'M READY TO POST A JOB</span></a>
                            </div>
                        </div>

                        {{-- <div class="col-md-6 careerfy-typo-wrap"><div class="careerfy-about-thumb"><img src="extra-images/about-us-thumb.png" alt=""></div></div> --}}

                    </div>
                </div>
            </div>
            <!-- Main Section -->


        </div>

@endsection



@section('scripts')

    <script src="{{asset('public-assets/plugin-script/video.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){

            $(".video-play-btn").magnificPopup({
                type: 'video'
            });
            
        });
    </script>

@endsection