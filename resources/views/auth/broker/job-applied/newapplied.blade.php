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

    .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
        background-color: #13b5ea;
    }

    .nav-pills > li > a {
        border-radius: 0;
        margin-bottom: 10px;
        border:1px solid  #13b5ea;
            box-shadow: 3px 2px 2px #ddd;
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

                    <div class="careerfy-column-9 careerfy-typo-wrap">

                        <ul class="nav nav-pills">
                          <li class="active"><a data-toggle="pill" href="#menu">New Application</a></li>
                          <li><a data-toggle="pill" href="#menu1">Inteview</a></li>
                          <li><a data-toggle="pill" href="#menu2">Selected</a></li>
                          <li><a data-toggle="pill" href="#menu3">Rejected</a></li>
                        </ul>
                        
                        <div class="careerfy-employer-box-section">
                          <div class="tab-content">
                            <div id="menu" class="tab-pane fade in active">
                                <!-- Manage Jobs -->
                                <div class="careerfy-managejobs-list-wrap">
                                      <div class="careerfy-managejobs-list">
                                          <!-- Manage Jobs Header -->
                                          <div class="careerfy-table-layer careerfy-managejobs-thead">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">Job Title</div>
                                                  <div class="careerfy-table-cell" style="width: 10%">Photo</div>
                                                  <div class="careerfy-table-cell">Name</div>
                                                  <div class="careerfy-table-cell">Email</div>
                                                  <div class="careerfy-table-cell">Phone</div>
                                                  <div class="careerfy-table-cell"></div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->

                                        @if(count($jobApply) > 0)
                                          @foreach($jobApply as $job)
                                          @if(empty($job->is_qualify))
                                          <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">
                                                    @php
                                                      $jobPost = App\JobPost::where('id',$job->job_id)->first();
                                                    @endphp
                                                      <h6><a href="{{ route('jobpost.show',$jobPost->slug) }}">
                                                        {{ str_limit($job->JobPost->title,20) }}
                                                        </a>
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                      <h6>
                                                   @if (!empty($job->user->resume->profile_img))
                                                      <img src="{{url('/')}}/profile_images/{{$job->user->resume->profile_img}}" alt="" style="width: 50px;height: 50px;border-radius: 100%;"> 
                                                  @else 
                                                      <img src="http://placehold.it/65x65" alt="Company Logo" style="width: 50px;height: 50px;border-radius: 100%;">
                                                  @endif
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell" style="width: 10%">
                                                    {{$job->user->name}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->email}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->number}}
                                                  </div>

                                                  <div class="careerfy-table-cell">
                                                      <div class="careerfy-managejobs-links">
                                                          
                                                          <a href="{{route('job.candidate',['agent_id' => $job->user->id, 'job_title' => $job->JobPost->slug]) }}" class="careerfy-icon careerfy-view"></a>

                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->
                                          @endif
                                          @endforeach
                                        @endif
                                      </div>
                                </div>
                            </div>
                            <!-- /. end menu1 -->

                            <div id="menu1" class="tab-pane fade">
                                <!-- Manage Jobs -->
                                <div class="careerfy-managejobs-list-wrap">
                                      <div class="careerfy-managejobs-list">
                                          <!-- Manage Jobs Header -->
                                          <div class="careerfy-table-layer careerfy-managejobs-thead">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">Job Title</div>
                                                  <div class="careerfy-table-cell" style="width: 10%">Photo</div>
                                                  <div class="careerfy-table-cell">Name</div>
                                                  <div class="careerfy-table-cell">Email</div>
                                                  <div class="careerfy-table-cell">Phone</div>
                                                  <div class="careerfy-table-cell"></div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->

                                        @if(count($jobApply) > 0)
                                          @foreach($jobApply as $job)
                                          @if(!empty($job->is_qualify) && $job->is_qualify == 'interview')
                                          <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">
                                                    @php
                                                      $jobPost = App\JobPost::where('id',$job->job_id)->first();
                                                    @endphp
                                                      <h6><a href="{{ route('jobpost.show',$jobPost->slug) }}">
                                                        {{ str_limit($jobPost->title,20) }}
                                                        </a>
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                      <h6>
                                                   @if (!empty($job->user->resume->profile_img))
                                                      <img src="{{url('/')}}/profile_images/{{$job->user->resume->profile_img}}" alt="" style="width: 50px;height: 50px;border-radius: 100%;"> 
                                                  @else 
                                                      <img src="http://placehold.it/65x65" alt="Company Logo" style="width: 50px;height: 50px;border-radius: 100%;">
                                                  @endif
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell" style="width: 10%">
                                                    {{$job->user->name}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->email}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->number}}
                                                  </div>

                                                  <div class="careerfy-table-cell">
                                                      <div class="careerfy-managejobs-links">
                                                          
                                                          <a href="{{route('job.candidate',['agent_id' => $job->user->id, 'job_title' => $job->JobPost->slug]) }}" class="careerfy-icon careerfy-view"></a>
                                                          
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->
                                          @endif
                                          @endforeach
                                        @endif
                                      </div>
                                </div>
                            </div>
                            <!-- / end menu2 -->

                            <div id="menu2" class="tab-pane fade">
                                <!-- Manage Jobs -->
                                <div class="careerfy-managejobs-list-wrap">
                                      <div class="careerfy-managejobs-list">
                                          <!-- Manage Jobs Header -->
                                          <div class="careerfy-table-layer careerfy-managejobs-thead">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">Job Title</div>
                                                  <div class="careerfy-table-cell" style="width: 10%">Photo</div>
                                                  <div class="careerfy-table-cell">Name</div>
                                                  <div class="careerfy-table-cell">Email</div>
                                                  <div class="careerfy-table-cell">Phone</div>
                                                  <div class="careerfy-table-cell"></div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->

                                        @if(count($jobApply) > 0)
                                          @foreach($jobApply as $job)
                                          @if(!empty($job->is_qualify) && $job->is_qualify == 'select')
                                          <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">
                                                    @php
                                                      $jobPost = App\JobPost::where('id',$job->job_id)->first();
                                                    @endphp
                                                      <h6><a href="{{ route('jobpost.show',$jobPost->slug) }}">
                                                        {{ str_limit($jobPost->title,20) }}
                                                        </a>
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                      <h6>
                                                   @if (!empty($job->user->resume->profile_img))
                                                      <img src="{{url('/')}}/profile_images/{{$job->user->resume->profile_img}}" alt="" style="width: 50px;height: 50px;border-radius: 100%;"> 
                                                  @else 
                                                      <img src="http://placehold.it/65x65" alt="Company Logo" style="width: 50px;height: 50px;border-radius: 100%;">
                                                  @endif
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell" style="width: 10%">
                                                    {{$job->user->name}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->email}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->number}}
                                                  </div>

                                                  <div class="careerfy-table-cell">
                                                      <div class="careerfy-managejobs-links">
                                                          
                                                          <a href="{{route('job.candidate',['agent_id' => $job->user->id, 'job_title' => $job->JobPost->slug]) }}" class="careerfy-icon careerfy-view"></a>
                                                          <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->
                                          @endif
                                          @endforeach
                                        @endif
                                      </div>
                                </div>
                            </div>
                            <!-- / end menu3 -->

                            <div id="menu3" class="tab-pane fade">
                                <!-- Manage Jobs -->
                                <div class="careerfy-managejobs-list-wrap">
                                      <div class="careerfy-managejobs-list">
                                          <!-- Manage Jobs Header -->
                                          <div class="careerfy-table-layer careerfy-managejobs-thead">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">Job Title</div>
                                                  <div class="careerfy-table-cell" style="width: 10%">Photo</div>
                                                  <div class="careerfy-table-cell">Name</div>
                                                  <div class="careerfy-table-cell">Email</div>
                                                  <div class="careerfy-table-cell">Phone</div>
                                                  <div class="careerfy-table-cell"></div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->

                                        @if(count($jobApply) > 0)
                                          @foreach($jobApply as $job)
                                          @if(!empty($job->is_qualify) && $job->is_qualify == 'reject')
                                          <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell" style="width: 20%">
                                                    @php
                                                      $jobPost = App\JobPost::where('id',$job->job_id)->first();
                                                    @endphp
                                                      <h6><a href="{{ route('jobpost.show',$jobPost->slug) }}">
                                                        {{ str_limit($jobPost->title,20) }}
                                                        </a>
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                      <h6>
                                                   @if (!empty($job->user->resume->profile_img))
                                                      <img src="{{url('/')}}/profile_images/{{$job->user->resume->profile_img}}" alt="" style="width: 50px;height: 50px;border-radius: 100%;"> 
                                                  @else 
                                                      <img src="http://placehold.it/65x65" alt="Company Logo" style="width: 50px;height: 50px;border-radius: 100%;">
                                                  @endif
                                                      </h6>
                                                  </div>
                                                  <div class="careerfy-table-cell" style="width: 10%">
                                                    {{$job->user->name}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->email}}
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                    {{$job->user->number}}
                                                  </div>

                                                  <div class="careerfy-table-cell">
                                                      <div class="careerfy-managejobs-links">
                                                          

                                                          
                                                          <a href="{{route('job.candidate',['agent_id' => $job->user->id, 'job_title' => $job->JobPost->slug]) }}" class="careerfy-icon careerfy-view"></a>

                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->
                                          @endif
                                          @endforeach
                                        @endif
                                      </div>
                                </div>
                            </div>
                            <!-- end menu4 -->
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


