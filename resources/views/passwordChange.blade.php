@extends('layouts.app')

@section('styles')

    <style type="text/css">
        .cvdownload {
            display: block !important;
            color: red !important;
            font-size: 25px !important;
            margin-top: 19px !important;
        }

        .complete-profile{
            text-align: center;
        }
        .complete-profile a{
            color: #ea1313;
            font-weight: bold;
        }

        h2.file a {
            font-size: 80px;
            color: #ddd;
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
                <div class="row">

                    <!-- agent aside -->
                    <aside class="careerfy-column-3">
                    @include('includes.agent-sidebar')
                    </aside>
                    <!-- agent aside end -->

				    <div class="careerfy-column-9">
				        <div class="careerfy-typo-wrap">

				        	@if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif

				            <form class="careerfy-employer-dasboard" method="post" action="{{ route('changePassword') }}">
				            	{{ csrf_field() }}

				                <div class="careerfy-employer-box-section">
				                    <div class="careerfy-profile-title">
				                        <h2>Change Password</h2>
				                    </div>

				                    <ul class="careerfy-row careerfy-employer-profile-form">
				                        <li class="careerfy-column-12">
				                            <label>Old Password *</label>
				                            <input id="current-password" type="password" name="current-password" required>

	                                        @if ($errors->has('current-password'))
	                                            <span class="help-block">
	                                                <strong>{{ $errors->first('current-password') }}</strong>
	                                            </span>
	                                        @endif
				                        </li>
				                        <li class="careerfy-column-6">
				                            <label>New Password *</label>
				                            <input id="new-password" type="password" name="new-password" required>

	                                        @if ($errors->has('new-password'))
	                                            <span class="help-block">
	                                                <strong>{{ $errors->first('new-password') }}</strong>
	                                            </span>
	                                        @endif
				                        </li>
				                        <li class="careerfy-column-6">
				                            <label>Confirm New Password  *</label>
				                            <input id="new-password-confirm" type="password" name="new-password_confirmation" required>
				                        </li>
				                    </ul>

				                </div>
				                <input type="submit" class="careerfy-employer-profile-submit" value="Update Password">
				            </form>
				        </div>
				    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
        

@endsection
