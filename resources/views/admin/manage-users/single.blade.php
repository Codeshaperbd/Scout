@extends('layouts.app-admin')


@section('styles')
  <style type="text/css">
    a.img-link {
      width: 100px;
      height: 100px;
    }    
    a.img-link img{
      width: 100%;
      height: 100%;
    }
  </style>
@endsection


@section('content')


<main id="main-container" style="padding-top: 0px">

                <!-- Hero -->
                <div class="bg-image" style="background-image: url({{url( 'admin-assets/media/photos/photo17@2x.jpg')}});">
                    <div class="bg-black-25">
                        <div class="content content-full">
                            <div class="py-5 text-center">
                               
                              @if(!empty($user->resume->profile_img))
                                <a class="img-link"><img class="img-avatar img-avatar96 img-avatar-thumb" src="{{url('/')}}/profile_images/{{$user->resume->profile_img}}" alt="" style="width: 100%;height: 100%;"> 
                                </a>
                              @elseif (!empty($user->BrokerInfo->profile_img))
                                <a class="img-link"><img class="img-avatar img-avatar96 img-avatar-thumb" src="{{url('/')}}/profile_images/{{$user->BrokerInfo->profile_img}}" alt="" style="width: 100%;height: 100%;"> </a>
                              @else 
                                <a class="img-link"><img class="img-avatar img-avatar96 img-avatar-thumb" src="http://placehold.it/100x100" alt="" style="width: 100%;height: 100%;"> </a>
                              @endif

                                <h1 class="font-w700 my-2 text-white">{{$user->name}}</h1>
                                <h2 class="h4 font-w700 text-white-75">
                                    <a class="text-primary-lighter" href="mailto:{{$user->email}}">{{$user->email}}</a>
                                </h2>
                                @if($user->role_id == 1)
                                  @if(!empty($user->resume))
                                    <a href="{{route('manage-resumes.edit',$user->resume->id)}}">
                                      <button type="button" class="btn btn-hero-primary">
                                          <i class="fa fa-fw fa-user-plus mr-1"></i> Edit Resume
                                      </button>
                                    </a>
                                  @else 
                                    <button type="button" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-user-plus mr-1"></i> Add Resume
                                    </button>
                                  @endif
                                @endif


                                @if($user->role_id == 2)
                                  @if(!empty($user->BrokerInfo))
                                    <a href="{{route('manage-employe.edit',$user->BrokerInfo->id)}}">
                                      <button type="button" class="btn btn-hero-primary">
                                          <i class="fa fa-fw fa-user-plus mr-1"></i> Edit Company
                                      </button>
                                    </a>
                                  @else 
                                    <button type="button" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-user-plus mr-1"></i> Add Company
                                    </button>
                                  @endif
                                @endif

                                <a href="{{route('manage-users.edit',$user->id)}}">
                                  <button type="button" class="btn btn-hero-dark">
                                      <i class="si si-note mr-1"></i> Settings
                                  </button>
                                </a>
                                <div class="row" style="display: flex;justify-content: center;margin-top: 20px;">
                                  <a href="{{route('manage-users.edit',$user->id)}}">
                                    <button type="button" class="btn btn-hero-dark">
                                         I am {{ $user->role_id == 1? 'Agent' : 'Broke' }}
                                    </button>
                                  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- For agent -->
                @if($user->role_id == 1)
                  @if($user->resume)
                  <div class="content content-full content-boxed">
                      <!-- Cover Letter -->
                      <h2 class="content-heading">
                          <i class="si si-users mr-1"></i> Cover Letter
                      </h2>
                      <div class="row">
                          <div class="col-md-12 col-xl-12">
                              <div class="block block-rounded" style="padding: 10px">
                                {{$user->resume->cover_letter}}
                              </div>
                          </div>
                      </div>
                      <!-- END Cover Letter -->

                      <!-- Experience -->
                      @if($user->ExperienceDetails)
                      <h2 class="content-heading">
                          <i class="si si-users mr-1"></i> Experience
                      </h2>
                      <div class="row">
                          <div class="col-md-12 col-xl-12">
                              <div class="block block-rounded" style="padding: 10px">
                                <p><b>Title:</b> {{$user->ExperienceDetails->title}}</p>
                                <p><b>Cpmpany Name:</b> {{$user->ExperienceDetails->co_name}}</p>
                                <p><b>Duraton:</b> 
                                  @if($user->ExperienceDetails->is_current == 1)
                                    Running
                                   @else
                                     {{ Carbon\Carbon::parse($user->ExperienceDetails->start_date)->format('jS M Y') }}-
                                     {{ Carbon\Carbon::parse($user->ExperienceDetails->end_date)->format('jS M Y') }}
                                  @endif
                                </p>
                              </div>
                          </div>
                      </div>
                      @endif
                      <!-- END Latest Friends -->

                      <!-- Experience -->
                      @if($user->EducationDetails)
                      <h2 class="content-heading">
                          <i class="si si-users mr-1"></i> Education
                      </h2>
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="block block-rounded" style="padding: 10px">
                                  <p><b>Graduation Date:</b> {{$user->EducationDetails->graduation_date}}</p>
                                  <p><b>Major:</b> {{$user->EducationDetails->major}}</p>
                                  <p><b>Institute:</b> {{$user->EducationDetails->institute_name}}</p>
                                  
                                </div>
                            </div>
                        </div>
                      @endif
                      <!-- END Latest Friends -->

                      <!-- CV Download -->
                      @if($user->AgentInfo)
                        <h2 class="content-heading">
                            <i class="si si-users mr-1"></i> Download CV 
                        </h2>
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="block block-rounded" style="padding: 10px">
                                  <small>CV</small><br><br>
                                  <h2 class="file"><a href="{{url('/')}}/resumes/{{$user->AgentInfo->resume}}" download><i class="fa fa-file"></i></a></h2>
                                  <a download="download" href="{{url('/')}}/resumes/{{$user->AgentInfo->resume}}" class="fa fa-download cvdownload"></a>
                                  
                                </div>
                            </div>
                        </div>
                      @endif


                      @if($user->resume)
                        <!-- resume area -->
                        <h2 class="content-heading">
                            <i class="si si-users mr-1"></i> Resume
                        </h2>
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="block block-rounded" style="padding: 10px">
                                  <p><b>Title:</b> {{$user->resume->job_title}}</p>
                                  <p><b>Date of Birth:</b> {{ $user->resume->bth_day }}-{{ $user->resume->birth_month }}-{{ $user->resume->birth_year }}</p>
                                  <p>
                                    <b>Gander:</b> 
                                    @if($user->resume->gander == '1')
                                        Male
                                    @else
                                        Female
                                    @endif
                                  </p>

                                  <p>
                                    <b>Position:</b> 
                                      @php  $positons = unserialize($user->resume->position); @endphp
                                                              
                                      @foreach($positons as $pos)
                                      <a>
                                          @if($pos == '1')
                                              Realtor
                                          @endif
                                          @if($pos == '2')
                                              Real estate agent
                                          @endif
                                          @if($pos == '3')
                                              Real estate broker
                                          @endif
                                      </a>
                                      @endforeach
                                  </p>
                                  <p>
                                    <b>Broker Alert:</b> 
                                    @if($user->resume->alert == '1')
                                      @if($user->resume->gander == '1')
                                          He 
                                      @else 
                                          She
                                      @endif
                                      Wants To Broker Attantion
                                    @endif
                                  </p>
                                  
                                </div>
                            </div>
                        </div>
                      @endif
                      <!-- END Latest Friends -->


                      <!-- Cover Letter -->
                      <h2 class="content-heading">
                          <i class="si si-users mr-1"></i> Additional Information
                      </h2>
                      <div class="row">
                          <div class="col-md-12 col-xl-12">
                              <div class="block block-rounded" style="padding: 10px">
                                <p>
                                  <b>Active License?:</b> 
                                  <a>
                                      @if($user->AgentInfo->licensed == '1')
                                          License Active
                                      @else
                                          License Not Active
                                      @endif
                                  </a>
                                </p>
                                <p>
                                  <b>License Type:</b> 
                                  <a>
                                      @if($user->AgentInfo->licensed_type == '1')
                                          Not Yet Licensed
                                      @elseif($user->AgentInfo->licensed_type == '2')
                                          Salesperson
                                      @else
                                          Broker
                                      @endif
                                  </a>
                                </p>
                                <p>
                                  <b>Years Of Experience:</b> 
                                  <a>
                                    @if($user->AgentInfo->expericnce == 0)
                                        @if($user->resume->gander == '1')
                                            He 
                                        @else 
                                            She
                                        @endif
                                        Has no experience.
                                    @elseif($user->AgentInfo->expericnce == 1)
                                        {{$user->AgentInfo->expericnce}} Year.
                                    @else
                                        {{$user->AgentInfo->expericnce}} Years.
                                    @endif                     
                                  </a>
                                </p>
                              </div>
                          </div>
                      </div>
                      <!-- END Cover Letter -->
                  </div>
                  @else
                  <h2 style="color: red;font-size: 30px;text-align: center;margin-top: 30px;">This Person Has No Resume.</h2>
                  @endif
                @endif
                <!-- END For Agent -->




                <!-- For Broker -->
                @if($user->role_id == 2)
                  @if($user->BrokerInfo)
                  <div class="content content-full content-boxed">

                      <!-- Cover Letter -->
                      <h2 class="content-heading">
                          <i class="si si-users mr-1"></i> Company Info
                      </h2>
                      <div class="row">

                        <div class="content content-full content-boxed">
                          <div class="block block-rounded" style="padding: 15px;">
                            
                          <p><b>Company Name:</b>{{ $user->BrokerInfo->name }}</p>
                          <p><b>Company Phone:</b>{{ $user->BrokerInfo->phone }}</p>
                          </div>
                        </div>
                      </div>
                      <!-- END Cover Letter -->

                      <!-- Cover Letter -->
                      @if($user->UserLocation)
                      <h2 class="content-heading">
                          <i class="si si-users mr-1"></i> Location
                      </h2>
                      <div class="row">

                        <div class="content content-full content-boxed">
                          <div class="block block-rounded" style="padding: 15px;">
                          @php
                            $countryName  = App\Country::where('id',$user->UserLocation->country_id)->first();
                            $stateName  = App\State::where('id',$user->UserLocation->state_id)->first();
                            $cityName  = App\City::where('id',$user->UserLocation->city_id)->first();
                          @endphp  
                          <p><b>Country:</b>{{ $countryName->name }}</p>
                          <p><b>State:</b>{{ $stateName->name }}</p>
                          <p><b>City:</b>{{ $cityName->name }}</p>
                          <p><b>Geo Location:</b>{{ $user->UserLocation->geo_tagging }}</p>
                          </div>
                        </div>
                      </div>
                      @endif
                      <!-- END Cover Letter -->

                  </div>
                  @else
                  <h2 style="color: red;font-size: 30px;text-align: center;margin-top: 30px;">Company Details Not Avaliable.</h2>
                  @endif
                @endif
                <!-- END For Broker -->

            </main>



@endsection
