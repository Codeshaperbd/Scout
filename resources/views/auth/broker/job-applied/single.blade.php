@extends('layouts.app')


@section('styles')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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

    .candidate-status ul{
        margin:0;
        padding: 0;
        list-style: none;
    }
    .candidate-status ul li{
        display: inline-block;
        background: gray;
        border-radius: 5px;
    }
    .candidate-status ul li a{
        padding: 10px 20px;
        color: #fff;
        display: block;
    }
    .candidate-status ul li.one{
        background: green;
    }
    .candidate-status ul li.two{
        background: #13b5ea;
    }
    .candidate-status ul li.three{
        background: red;
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


                @if(Session::has('is_qualify'))
                    <div class="alert alert-danger alert-size">
                      <strong>{{Session('is_qualify')}}</strong>
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
                            <form class="careerfy-candidate-dasboard">
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title">
                                        <h2>{{ $candidate->name }}'s Resume</h2>

                                    </div>
                                    <div class="careerfy-candidate-section">
                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> 
                                                <h2>
                                                  <i class="careerfy-icon careerfy-mortarboard"></i> Personal Info
                                                </h2> 
                                            </div>

                                            <div class="careerfy-resume-education">
                                                <ul class="careerfy-row">
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Name</small>
                                                            <h2><a>{{ $candidate->name }} {{ $candidate->lname }}</a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Phone</small>
                                                            <h2><a>{{ $candidate->number }}</a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Email</small>
                                                            <h2><a>{{ $candidate->email }}</a></h2>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Personal Info -->

                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> <h2>
                                                <i class="careerfy-icon careerfy-mortarboard"></i> Resume 
                                                
                                                   <!--  <div class="careerfy-resume-education-btn careerfy-resume-addbtn">
                                                        <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                        <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                    </div> -->
                                            </h2> </div>

                                            <div class="careerfy-resume-education">
                                                <ul class="careerfy-row">
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Job Title</small>
                                                            <h2><a>{{ $resume->job_title }}</a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Date of Birth</small>
                                                            <h2><a>{{ $resume->bth_day }}-{{ $resume->birth_month }}-{{ $resume->birth_year }}</a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Gander</small>
                                                            <h2><a>
                                                                @if($resume->gander == '1')
                                                                    Male
                                                                @else
                                                                    Female
                                                                @endif
                                                            </a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Position</small>
                                                            @php  $positons = unserialize($resume->position); @endphp
                                                            
                                                            @foreach($positons as $pos)
                                                            <h2><a>
                                                                @if($pos == '1')
                                                                    Realtor
                                                                @endif
                                                                @if($pos == '2')
                                                                    Real estate agent
                                                                @endif
                                                                @if($pos == '3')
                                                                    Real estate broker
                                                                @endif
                                                            </a></h2>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                      
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- resume Info -->


                                        <div class="careerfy-candidate-resume-wrap">
                                          <div class="careerfy-candidate-title"> <h2><i class="careerfy-icon careerfy-resume-1"></i> Cover Letter</h2> </div>
                                          <div class="careerfy-candidate-dashboard-editor">
                                              <p>{{ $resume->cover_letter }}</p>
                                          </div>
                                        </div>
                                        <!-- cover letter Info -->
                                        
                                        @if($expericnce->title != null)
                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> <h2>
                                                <i class="careerfy-icon careerfy-social-media"></i> Experience 
                                            </h2> </div>

                                            <div class="careerfy-resume-education">
                                                <ul class="careerfy-row">
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>
                                                               Cpmpany Name
                                                            </small>
                                                            <h2><a>{{ $expericnce->co_name }}</a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            
                                                            <small>
                                                               Title
                                                            </small>
                                                            <h2><a>{{ $expericnce->title }}</a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            
                                                            <small>
                                                               Duration
                                                            </small>
                                                            <h2>
                                                              <a>
                                                              
                                                               @if($expericnce->is_current == 1)
                                                                Running
                                                               @else
                                                                 {{ $expericnce->start_date }} - {{ $expericnce->end_date }}
                                                               @endif

                                                              </a>
                                                            </h2>



                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div> 
                                        @endif   
                                        
                                        <!-- experience Info -->                                   
                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> <h2>
                                                <i class="careerfy-icon careerfy-mortarboard"></i> Education 
                                                <!-- <a href="javascript:void(0)" class="careerfy-resume-addbtn"><span class="fa fa-plus"></span> Add education</a> -->
                                            </h2> </div>

                                            <div class="careerfy-resume-education">
                                                <ul class="careerfy-row">
                                                    @foreach($educations as $education)
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>{{$education->graduation_date}}</small>
                                                            <h2><a>{{$education->major}}</a></h2>
                                                            <span>{{$education->institute_name}}</span>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Education Info -->

                                        @if($agent_info->resume != null)
                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> <h2>
                                                <i class="careerfy-icon careerfy-mortarboard"></i> Download CV 
                                                
                                            </h2> </div>

                                            <div class="careerfy-resume-education">
                                                <ul class="careerfy-row">
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>CV</small>
                                                            <h2 class="file"><a download="download" href="{{url('/')}}/resumes/{{$agent_info->resume}}" download><i class="fa fa-file"></i></a></h2>
                                                            <a download="download" href="{{url('/')}}/resumes/{{$agent_info->resume}}" class="fa fa-download cvdownload"></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- cv Info -->


                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> <h2>
                                                <i class="careerfy-icon careerfy-mortarboard"></i> Additional Information 
                                                
                                                    <!-- <div class="careerfy-resume-education-btn careerfy-resume-addbtn">
                                                        <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                        <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                    </div> -->
                                            </h2> </div>

                                            <div class="careerfy-resume-education">
                                                <ul class="careerfy-row">
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Active License?</small>
                                                            <h2><a>
                                                                @if($agent_info->licensed == '1')
                                                                    License Active
                                                                @else
                                                                    License Not Active
                                                                @endif
                                                            </a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>License Type</small>
                                                            <h2><a>
                                                                @if($agent_info->licensed_type == '1')
                                                                    Not Yet Licensed
                                                                @elseif($agent_info->licensed_type == '2')
                                                                    Salesperson
                                                                @else
                                                                    Broker
                                                                @endif
                                                                </a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Years Of Experience</small>
                                                            <h2>
                                                              <a>
                                                                @if($agent_info->expericnce == 0)
                                                                    @if($resume->gander == '1')
                                                                        He 
                                                                    @else 
                                                                        She
                                                                    @endif
                                                                    Has no experience.
                                                                @elseif($agent_info->expericnce == 1)
                                                                    {{$agent_info->expericnce}} Year.
                                                                @else
                                                                    {{$agent_info->expericnce}} Years.
                                                                @endif
                                                            </a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>LinkedIn Profile</small>
                                                            <h2><a>
                                                                {{$agent_info->linkedin}}
                                                            </a></h2>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- addtional Info -->

                                    </div>
                                </div>
                                
                            </form>


                            <!-- candidate status -->
                            <div class="candidate-status">
                                <ul>
                                    <li class="one">
                                        <a href="{{route('applications',['status' => 'interview', 'user_id' => $agent_info->user_id, 'job_title'=> $jobPost->slug]) }}">Call For Interview</a>
                                    </li>
                                    <li class="two">
                                        <a href="{{route('applications',['status' => 'select', 'user_id' => $agent_info->user_id, 'job_title'=> $jobPost->slug]) }}">Select</a>
                                    </li>
                                    <li class="three">
                                        <a href="{{route('applications',['status' => 'reject', 'user_id' => $agent_info->user_id, 'job_title'=> $jobPost->slug]) }}">Reject</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- candidate status end -->
                          
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

  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 
@endsection