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

    .modal-dialog {
        margin: 0 auto;
    }

    button.close {
        background: transparent !important;
    }

    .modal-body {
        overflow: hidden;
    }
    .modal-body ul li {
        width: 100%;
        display: block;
        text-align: left;
        padding: 0;
        font-size: 24px;
        color: #000;
    }

    .modal-body ul li span {
        width: 30%;
        float: left;
        text-align: right;
        padding-right: 12px;
    }

    textarea.modal-textarea {
        width: 70%;
        padding: 11px;
        height: 100px;
        border: 3px solid #13b5ea;
        /* background: #13b5ea; */
        border-radius: 10px;
    }

    .show-error.text-center {
        font-size: 32px;
        color: red;
        padding-bottom: 30px;
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
                    <div class="careerfy-column-12 careerfy-typo-wrap">
                        <div class="row">

                            <div class="show-error text-center" >
                                 @if(Session::has('cancle'))
                                    <div class="alert alert-danger alert-size">
                                      <strong>{{Session('cancle')}}</strong>
                                    </div>
                                  @endif
                            </div>
                            <div class="show-error text-center" style="color: green">
                                 @if(Session::has('applied'))
                                    <div class="alert alert-success alert-size">
                                      <strong>{{Session('applied')}}</strong>
                                    </div>
                                  @endif
                            </div>
                            <!-- Job Detail List -->
                            <div class="careerfy-column-12">
                                <div class="careerfy-typo-wrap">
                                    <figure class="careerfy-jobdetail-list">
                                        <span class="careerfy-jobdetail-listthumb">
                                         @if (!empty($job->BrokerInfo->profile_img))
                                            <img src="{{url('/')}}/profile_images/{{$job->BrokerInfo->profile_img}}" alt="" > 
                                        @else 
                                            <img src="http://placehold.it/65x65" alt="Company Logo">
                                        @endif
                                        </span>
                                        <figcaption>
                                            <h2>{{ $job->title }}</h2>
                                            <span>
                                                <small class="careerfy-jobdetail-type">
                                                @if($job->work_hour == 1)
                                                    Independent
                                                @elseif($job->work_hour == 2)
                                                    Part-Time
                                                @else 
                                                    Full-Time
                                                @endif
                                                </small> {{ $job->BrokerInfo->name }} <small class="careerfy-jobdetail-postinfo">Posted {{ $job->created_at->diffForHumans() }}</small></span>
                                            <ul class="careerfy-jobdetail-options">
                                                <li><i class="fa fa-map-marker"></i> {{$job->location}} <!-- <a href="#" class="careerfy-jobdetail-view">View om Map</a> --></li>
                                                <li><i class="careerfy-icon careerfy-calendar"></i> Post Date: {{ $job->created_at->diffForHumans() }}</li>
                                                <!-- <li><i class="careerfy-icon careerfy-calendar"></i> Apply Before: Aug 15, 2018</li> -->
                                                @php
                                                    $totalApplied = \App\JobApply::where('job_id',$job->id)->get();
                                                @endphp
                                                <li><i class="careerfy-icon careerfy-summary"></i> Applications {{count($totalApplied)}}</li>
                                                <li><a href="#"><i class="careerfy-icon careerfy-view"></i> Views 3806</a></li>
                                            </ul>
                                            
                                            <a href="#" class="careerfy-jobdetail-btn"><i class="careerfy-icon careerfy-envelope"></i> @if(!empty($job->byemailapply)) 
                                                {{$job->byemailapply}}
                                            @endif
                                            @if(!empty($job->byurlapply)) 
                                                {{$job->byurlapply}}
                                            @endif
                                            </a>
                                            <ul class="careerfy-jobdetail-media">
                                                <li><span>Share:</span></li>
                                                <li><a href="#" data-original-title="facebook" class="careerfy-icon careerfy-facebook-logo-in-circular-button-outlined-social-symbol"></a></li>
                                                <li><a href="#" data-original-title="twitter" class="careerfy-icon careerfy-twitter-circular-button"></a></li>
                                                <li><a href="#" data-original-title="linkedin" class="careerfy-icon careerfy-linkedin"></a></li>
                                            </ul>
                                                @auth
                                                @if(Auth::user()->id != $job->BrokerInfo->user->id)

                                                <a href="{{ route('inbox.show',$job->BrokerInfo->user->id) }}" class="btn btn-success">Inbox Me.</a>

                                                @endif
                                                @endauth
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Job Detail List -->

                            <!-- Job Detail Content -->
                            <div class="careerfy-column-8">
                                <div class="careerfy-typo-wrap">
                                    <div class="careerfy-jobdetail-content">
                                        <div class="careerfy-content-title"><h2>Job Detail</h2></div>
                                        <div class="careerfy-jobdetail-services">
                                            <ul class="careerfy-row">
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-salary"></i>
                                                    <div class="careerfy-services-text">Offerd Salary: <small>@if(!empty($job->estimated_salary))$ {{ $job->estimated_salary }}@else Negotiable @endif </small></div>
                                                </li>
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-social-media"></i>
                                                    <div class="careerfy-services-text">Employment type: <small>{{ $job->employment_type }}</small></div>
                                                </li>
                                                <li class="careerfy-column-4">
                                                    @php 
                                                        
                                                        $position = unserialize($job->JobCategory);
                                                    @endphp
                                                    <i class="careerfy-icon careerfy-social-media"></i>
                                                    <div class="careerfy-services-text">Career Level: <small> @foreach($position as $pos) 
                                                                   @if($pos == '1')
                                                                    Realtor <br>
                                                                   @elseif($pos == '2')
                                                                    Real Estate Agent  <br>
                                                                   @else 
                                                                    Real Estate Broker
                                                                   @endif
                                                                  @endforeach</small></div>
                                                </li>
                                                
                                                @if(!empty($job->experience))
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-briefcase"></i>
                                                    <div class="careerfy-services-text">Experience: <small>{{$job->experience}} </small></div>
                                                </li>
                                                @endif
                                                @if(!empty($job->work_hour))
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-briefcase"></i>
                                                    <div class="careerfy-services-text">Work hours: <small>
                                                            @if($job->work_hour == '1')
                                                                Diploma
                                                            @elseif($job->work_hour == '3')
                                                                Part time
                                                            @else 
                                                                Fulltime time
                                                            @endif </small></div>
                                                </li>
                                                @endif
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-network"></i>
                                                    <div class="careerfy-services-text">Industry <small>Real Estate</small></div>
                                                </li>
                                                @if(!empty($job->education))
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-mortarboard"></i>
                                                    <div class="careerfy-services-text">Education: 
                                                        <small>
                                                            @if($job->education == '2')
                                                                Diploma
                                                            @elseif($pos == '3')
                                                                Associate Degree
                                                            @elseif($pos == '4')
                                                                Bechelor's Degree
                                                            @else 
                                                                None
                                                            @endif
                                                            </small></div>
                                                </li>
                                                @endif
                                                @if(!empty($job->qualifications))
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-mortarboard"></i>
                                                    <div class="careerfy-services-text">Qualification <small>
                                                            @if($job->education == '2')
                                                                No Licence Required
                                                            @elseif($pos == '3')
                                                                Licence Required
                                                            @else 
                                                                None
                                                            @endif</small></div>
                                                </li>
                                                @endif
                                                @if(!empty($job->byemailapply) || !empty($job->byurlapply))
                                                <li class="careerfy-column-4">
                                                    <i class="careerfy-icon careerfy-mortarboard"></i>
                                                    <div class="careerfy-services-text">Apply Process:<small>
                                                       {{$job->byemailapply}}
                                                       {{$job->byurlapply}}</small></div>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="careerfy-content-title"><h2>Job Description</h2></div>
                                        <div class="careerfy-description">
                                            <p>{{ $job->description }}</p>
                                        </div>
                                        @if(!empty($job->responsibilities))
                                        <div class="careerfy-content-title"><h2>Responsibilities</h2></div>
                                        <div class="careerfy-description">
                                            <p>{{ $job->responsibilities }}</p>
                                        </div>
                                        @endif
                                        <div class="careerfy-content-title"><h2>Required skills</h2></div>
                                        <div class="careerfy-jobdetail-tags">
                                            {{ $job->skills }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <aside class="careerfy-column-4">
                                <div class="careerfy-typo-wrap">
                                    <div class="widget widget_apply_job">
                                        <div class="widget_apply_job_wrap">

                                            
                                            @auth
                                            <form method="post" action="{{route('job.apply',['status' => 'apply', 'job_id' => $job->id]) }}">
                                                @csrf
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Verify your information & add cover letter.</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                       <ul>
                                                           <li><span>Name:</span> {{ Auth::user()->name }} {{ Auth::user()->lname }}</li>
                                                           <li><span>Email:</span> {{ Auth::user()->email }}</li>
                                                           <li><span>Phone:</span> {{ Auth::user()->number }}</li>
                                                           <li>
                                                                <span>Cover Letter:</span> 
                                                                <textarea name="cover_letter" class="modal-textarea" placeholder="Add Cover Letter For Batter Impression"></textarea>
                                                           </li>
                                                       </ul>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Apply</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </form>
                                            <!-- Button trigger modal -->
                                            @if(Auth::user()->role_id == 1)
                                                @if(empty($isApplied))
                                                    <a href="#" type="button" class="careerfy-applyjob-btn" data-toggle="modal" data-target="#myModal">
                                                  Apply For This Job
                                                </a>
                                                @else
                                                    <a style="background: red" href="{{route('job.apply',['status' => 'cancle', 'job_id' => $job->id]) }}" class="careerfy-applyjob-btn">Cancle Application</a>
                                                @endif

                                                <!-- <span>Application ends in 4d 5h 3m</span> -->
                                                <div class="careerfy-applywith-title"><small>OR apply with</small></div>
                                            @endif
                                            @endauth

                                            @guest
                                            <a href="{{route('login') }}" class="careerfy-applyjob-btn">Apply For this Job</a>
                                            @endguest
                                            

                                            
                                            <p>Know someone who would be perfect for  this role this role? Be a pal, let them know.</p>
                                            <ul>
                                                <li><a href="#"><i class="careerfy-icon careerfy-facebook-logo-1"></i> Facebook</a></li>
                                                <li><a href="#"><i class="careerfy-icon careerfy-linkedin-logo"></i> LinkedIn</a></li>
                                            </ul>
                                        </div>
                                        <a href="mailto:codeshaperbd@gmail.com"  class="careerfy-sendmessage-btn"><i class="careerfy-icon careerfy-envelope"></i> Send an email</a>
                                    </div>
                                    <div class="widget widget_add">
                                        <img src="extra-images/jobdetail-add.jpg" alt="">
                                    </div>
                                    @if(count($job_by_co) > 0)
                                    <div class="widget widget_view_jobs">
                                        <div class="careerfy-widget-title"><h2>More Jobs from {{ $job->BrokerInfo->name }}</h2></div>
                                        <ul>

                                            @foreach($job_by_co as $co_job)
                                            <li>
                                                <h6><a href="#">{{$co_job->title}}</a></h6>
                                                <span>
                                                    @if(!empty($co_job->estimated_salary))$ {{ $co_job->estimated_salary }}@else Negotiable @endif </span>
                                                <small>{{$co_job->location}}</small>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </aside>
                            <!-- Job Detail Content -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
@endsection

