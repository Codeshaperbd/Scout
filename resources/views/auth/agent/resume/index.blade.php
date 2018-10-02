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


        button.btn-addon{
            margin-top: -169px;
            padding: 9px 50px;
            font-size: 16px;
            margin-left: 195px;
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


                @if(Session::has('resume_created'))
                    <div class="alert alert-success alert-size">
                      <strong>{{Session('resume_created')}}</strong>
                    </div>
                @endif
                @if(Session::has('resume_updated'))
                    <div class="alert alert-success alert-size">
                      <strong>{{Session('resume_updated')}}</strong>
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
                                        <h2>My Resume</h2>

                                        <div style="float: right;">
                                            <h2>Total view <strong>10</strong></h2>
                                        </div>
                                    </div>
                                    <div class="careerfy-candidate-section">
                                        <div class="careerfy-candidate-resume-wrap">
                                            <div class="careerfy-candidate-title"> <h2><i class="careerfy-icon careerfy-resume-1"></i> Cover Letter</h2> </div>
                                            <div class="careerfy-candidate-dashboard-editor">
                                                <p>{{ $resume->cover_letter }}</p>
                                            </div>
                                        </div>
                                        
   

                                        @if(!empty($expericnces))
                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> <h2>
                                                <i class="careerfy-icon careerfy-social-media"></i> Experience 
                                            </h2> </div>


                                            @foreach($expericnces as $expericnce)
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
                                                                 {{ Carbon\Carbon::parse($expericnce->start_date)->format('jS M Y') }}-
                                                                 {{ Carbon\Carbon::parse($expericnce->end_date)->format('jS M Y') }}
                                                               @endif

                                                              </a>
                                                            </h2>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div> 
                                        @endif 


                                        @if(!empty($educations))
                                        <div class="careerfy-candidate-resume-wrap">    
                                            <div class="careerfy-candidate-title"> <h2>
                                                <i class="careerfy-icon careerfy-mortarboard"></i> Education 
                                                <!-- <a href="javascript:void(0)" class="careerfy-resume-addbtn"><span class="fa fa-plus"></span> Add education</a> -->
                                            </h2> </div>

                                            <div class="careerfy-add-popup">
                                                <ul class="careerfy-row careerfy-employer-profile-form">
                                                    <li class="careerfy-column-12">
                                                        <label>Title *</label>
                                                        <input value="Masters in Fine Arts" onblur="if(this.value == '') { this.value ='Masters in Fine Arts'; }" onfocus="if(this.value =='Masters in Fine Arts') { this.value = ''; }" type="text">
                                                    </li>
                                                    <li class="careerfy-column-6">
                                                        <label>From Date *</label>
                                                        <div class="careerfy-profile-select">
                                                            <select>
                                                                <option>10-05-2012</option>
                                                                <option>10-05-2012</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-6">
                                                        <label>To Date *</label>
                                                        <div class="careerfy-profile-select">
                                                            <select>
                                                                <option>10-05-2014</option>
                                                                <option>10-05-2014</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <label>Institute *</label>
                                                        <input value="Walters University" onblur="if(this.value == '') { this.value ='Walters University'; }" onfocus="if(this.value =='Walters University') { this.value = ''; }" type="text">
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <label>Description *</label>
                                                        <img src="extra-images/candidate-add-popup-textarea.png" alt="">
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <input type="submit" value="Add education">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="careerfy-resume-education">
                                                <ul class="careerfy-row">
                                                    @foreach($educations as $education)
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>{{$education->graduation_date}}</small>
                                                            <h2><a>{{$education->major}}</a></h2>
                                                            <span>{{$education->institute_name}}</span>
                                                        </div>
                                                        <!-- <div class="careerfy-resume-education-btn">
                                                            <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                            <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                        </div> -->
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif


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
                                                            <h2 class="file"><a href="{{url('/')}}/resumes/{{$agent_info->resume}}" download><i class="fa fa-file"></i></a></h2>
                                                            <a download="download" href="{{url('/')}}/resumes/{{$agent_info->resume}}" class="fa fa-download cvdownload"></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif

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
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Broker Alert</small>
                                                            
                                                            <h2><a>
                                                                @if($resume->alert == '1')
                                                                    @if($resume->gander == '1')
                                                                        He 
                                                                    @else 
                                                                        She
                                                                    @endif
                                                                    Wants To Broker Attantion
                                                                @endif
                                                            </a></h2>
                                                            
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

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
                                                            <h2><a>
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
                                                            <h2><a target="__blank" href="{{$agent_info->linkedin}}">
                                                                {{$agent_info->linkedin}}
                                                            </a></h2>
                                                        </div>
                                                    </li>
                                                    <li class="careerfy-column-12">
                                                        <div class="careerfy-resume-education-wrap">
                                                            <small>Where did you hear about Realty Scout?</small>
                                                            <h2><a>
                                                                @if($agent_info->where_know == 1)
                                                                    Google search
                                                                @elseif($agent_info->where_know == 2)
                                                                    Google Ad
                                                                @elseif($agent_info->where_know == 3)
                                                                    Facebook
                                                                @elseif($agent_info->where_know == 4)
                                                                    Twitter
                                                                @elseif($agent_info->where_know == 5)
                                                                    Instagram
                                                                @elseif($agent_info->where_know == 6)
                                                                    Linkedin
                                                                @elseif($agent_info->where_know == 7)
                                                                    Colleague or friend
                                                                @else($agent_info->where_know == 8)
                                                                    Other
                                                                @endif
                                                            </a></h2>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <a href="{{route('myresume.edit', Auth::user()->slug)}}" class="careerfy-employer-profile-submit" ><i class="fa fa-edit"></i> Update Resume</a>
                                <!-- delete form -->
                                
                            </form>
                            <!-- delete button -->
                            <form id="delete-form-{{ $resume->id }}" method="post" action="{{ route('myresume.destroy',$resume->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $resume->id }}').submit();
                                }
                                else{
                                  event.preventDefault();
                                }" >
                                <button class="btn m-b-xs btn-sm btn-danger btn-addon">
                                  <i class="fa fa-trash-o"></i> Delete
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
        

@endsection
