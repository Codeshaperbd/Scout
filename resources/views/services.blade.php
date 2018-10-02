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
            background:url(images/video1.jpg);
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
                       <h1>Full Service Recruting</h1>
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

    <!-- Main Content -->
    <div class="careerfy-main-content">
        
        <!-- Main Section -->
        <div class="careerfy-main-section careerfy-about-text-full">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-md-offset-2 careerfy-typo-wrap text-center">
                        <div class="careerfy-about-text">
                            <h2>Because you can't do 11 things at once... </h2>
                            
                            <h4>Please note that there is currently a 6 month + waiting list for full service recruiting.</h4>
                            <p>f you are looking to recruit more agents but don’t have the time to post a job on our website or vet potential candidates, partnering with Realty Scout is your ideal alternative. We handle it all, from marketing your brokerage to interviewing the candidates and making sure that they meet your specific needs.</p>


                            <div id="svideo">
                                <div class="svideo_bg">
                                    <a class="mfp-iframe  video-play-btn" href="{{url('videos/broker_service.mp4')}}"><i class="fa fa-play"></i></a>
                                </div>
                            </div>


                            <p>Our terms are simple, you pay nothing until we show results. We are aggressively priced; with Licensed Agents start at $1000 and a satisfaction guarantee.

                            Realty Scout make the connection while you claim the residual benefits of quality Real Estate Agents.To learn more about our services please call Laurent Minguez directly at (866) 323-6166 Ext. 102</p>
                            
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
    <script src="assets/plugin-script/fancybox.pack.js"></script>
    <script src="assets/plugin-script/isotope.min.js"></script>
    <script src="assets/plugin-script/video.js"></script>
    <script type="text/javascript">
            jQuery(document).ready(function($){

        $(".video-play-btn").magnificPopup({
            type: 'video'
        });
        
    });
    </script>
@endsection
