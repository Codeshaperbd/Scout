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
        @include('includes.inner_menu')


        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-about-text-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 col-md-offset-2 careerfy-typo-wrap text-center">
                            <div class="careerfy-about-text">
                                <h2>Create a free profile. Talk to some Brokers. Make your next move.</h2>
                                
                                <p>Realty Scout is the premier job board and education site for Real Estate Brokers and Agents. With Realty Scout, you can search for new opportunities, enhance your real estate knowledge, and engage with other professionals.</p>


                                <div id="svideo">
                                    <div class="svideo_bg" style="background: url({{url('images/video1.jpg')}}); background-position: center;background-size: cover;">
                                        <a class="mfp-iframe  video-play-btn" href="{{url('videos/video1.mp4')}}"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>


                                <p>We give you the ability to browse and research brokers that are hiring in your area without making phone calls or doing extensive research.

                                You can learn how to become licensed in your respective state and even enhance your real estate knowledge through our education center.

                                Whether you are looking for your next broker, figuring out how to get licensed, or expanding on your real estate knowledge you have come to the right place.</p>
                                <a href="{{route('register-agent')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Create My free Profile</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
        </div>
        <!-- Main Content -->

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