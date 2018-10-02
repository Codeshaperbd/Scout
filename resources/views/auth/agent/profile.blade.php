@extends('layouts.app')

@section('styles')
    <style type="text/css">
        a.btn.btn-default.btn-custome {
            background: #4bb4fe;
            color: #fff;
            font-size: 16px;
            border: 0px;
            width: 100%;
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
                       <h1>MY RESUMES</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">MY RESUMES</li>
              </ul>
           </div>
        </div>
    </div>

    <!-- /. header banner --> 
    
    <!-- Main Content -->
    <div class="careerfy-main-content">
        
        <!-- Main Section -->
        <div class="careerfy-main-section careerfy-dashboard-fulltwo">
            <div class="container">
                @if(Session::has('update_user'))
                    <div class="alert alert-success alert-size">
                      <strong>{{Session('update_user')}}</strong>
                    </div>
                @endif
                
                @if(Session::has('deleteResume'))
                    <div class="alert alert-danger alert-size">
                      <strong>{{Session('deleteResume')}}</strong>
                    </div>
                @endif
                <div class="row">
                    <!-- agent aside -->
                    <aside class="careerfy-column-3">
                    @include('includes.agent-sidebar')
                    </aside>
                    <!-- agent aside end -->
                    <div class="careerfy-column-9">
                        <div class="careerfy-typo-wrap">

                            
                            <form class="careerfy-employer-dasboard" method="PATCH" action="{{ route('console_update',Auth::user()->slug) }}">
                                @csrf
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Basic Information</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>First Name *</label>
                                            <input required value="{{ Auth::user()->name }}" type="text" name="name"> 
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Last Nmae *</label>
                                            <input required value="{{ Auth::user()->lname }}" type="text" name="lname">
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Email*</label>
                                            <input required value="{{ Auth::user()->email }}" type="text" name="email">
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Phone *</label>
                                            <input required value="{{ Auth::user()->number }}" type="text" name="number">
                                        </li>
                                    </ul>
                                </div>
                                <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                            </form>
                            
                        </div>

                        @if(empty(Auth::user()->resume->profile_img))
                        <!-- complete your profile -->
                        <a href="{{ route('profile_create') }}" class="btn btn-default btn-custome">Complete your profile</a>
                        <!-- complete your profile end -->
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
        

@endsection
