@extends('layouts.app')


@section('styles')
  <style type="text/css">
    .active-btn {
        border: 1px solid #13b5ea;
        padding: 5px 10px;
        text-align: center;
        background: #13b5ea;
        color: #fff;
        background: #dd;
    }
    .active-btn.disable {
        border: 1px solid red;
        background: red;
        color: #fff;
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
                       <h1>View Posted Job</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">View Posted Job</li>
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
                                <div class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section">
                                        <!-- Profile Title -->
                                        <div class="careerfy-profile-title">
                                            <h2>{{count($jobApply)}} Candidate Apply For This Job.</h2>
                                            <form class="careerfy-employer-search">
                                                <input value="Search orders" onblur="if(this.value == '') { this.value ='Search orders'; }" onfocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                                <input type="submit" value="">
                                                <i class="careerfy-icon careerfy-search"></i>
                                            </form>
                                        </div>
                                        <!-- Resumes -->
                                        <div class="careerfy-employer-resumes">
                                            <ul class="careerfy-row">
                                              @if(!empty($jobApply))
                                              @foreach($jobApply as $job)
                                                <li class="careerfy-column-6">
                                                    <div class="careerfy-employer-resumes-wrap">
                                                        <figure>
                                                          @if (!empty($job->user->resume->profile_img))
                                                              <a href="#" class="careerfy-resumes-thumb"><img src="{{url('/')}}/profile_images/{{$job->user->resume->profile_img}}" alt="" style="width: 50px;height: 50px;border-radius: 100%;"> </a>
                                                          @else 
                                                              <a href="#" class="careerfy-resumes-thumb"><img src="http://placehold.it/65x65" alt="Company Logo" style="width: 50px;height: 50px;border-radius: 100%;"></a>
                                                          @endif
                                                            
                                                            <figcaption>
                                                                <h2><a>{{$job->user->name}}</a> 
                                                                  @if(!empty($job->user->AgentInfo))<a download="download" href="{{url('/')}}/resumes/{{$job->user->AgentInfo->resume}}" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a>@endif</h2>
                                                                  @if(!empty($job->user->resume->position))
                                                                  @php  
                                                                    $positons = unserialize($job->user->resume->position); 
                                                                  @endphp
                                                                  <span class="careerfy-resumes-subtitle">
                                                                    @foreach($positons as $pos)
                                                                    <a>
                                                                        @if($pos == '1')
                                                                            Realtor,
                                                                        @endif
                                                                        @if($pos == '2')
                                                                            Real estate agent,
                                                                        @endif
                                                                        @if($pos == '3')
                                                                            Real estate broker
                                                                        @endif
                                                                    </a>
                                                                    @endforeach
                                                                  </span>

                                                                  @else  
                                                                    <span class="careerfy-resumes-subtitle">
                                                                      No Position
                                                                    </span>
                                                                  @endif
                                                                <ul>
                                                                    <li>
                                                                        <span>Location:</span>
                                                                        {{$job->user->UserLocation->geo_tagging}}
                                                                    </li>
                                                                    <li>
                                                                        <span>Email:</span>
                                                                        <small>{{$job->user->email}}</small>
                                                                    </li>
                                                                </ul>
                                                            </figcaption>
                                                        </figure>
                                                        <ul class="careerfy-resumes-options" style="margin-left: 0">
                                                            <li style="width: 50%"><a href="{{ route('inbox.show',$job->user->id) }}"><i class="careerfy-icon careerfy-mail"></i> Message</a></li>
                                                            <li style="width: 50%"><a href="{{route('job.candidate',['agent_id' => $job->user->id, 'job_title' => $getjob->slug]) }}"><i class="careerfy-icon careerfy-user-1"></i> View Profile</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                              @endforeach
                                              @endif
                                            </ul>
                                        </div>
                                        <!-- Pagination -->
                                        <div class="careerfy-pagination-blog">
                                            <ul class="page-numbers">
                                                <li><a class="prev page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                                <li><span class="page-numbers current">01</span></li>
                                                <li><a class="page-numbers" href="#">02</a></li>
                                                <li><a class="page-numbers" href="#">03</a></li>
                                                <li><a class="page-numbers" href="#">04</a></li>
                                                <li><a class="next page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
@endsection

