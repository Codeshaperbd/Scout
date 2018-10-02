@extends('layouts.app-admin')
@section('styles')
    <style type="text/css">
        #map-canvas {
            width: 100%;
            height: 350px;
            border-radius: 13px;
            margin-top: 20px;
        }argin-left: 10px;
        }
    </style>

@endsection

@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Edit Job</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Job</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    
                    {!! Form::model($resume, ['method'=>'PATCH','action'=>['Admin\AdminResumeController@update',$resume->id],'files'=>true]) !!}

                      @csrf
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Basic Information</h3>
                                <div class="block-options">
                                  df
                                </div>
                            </div>

                            <div class="block-content block-content-full">
                              <div class="row careerfy-employer-profile-form">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agent Name *</label>
                                        <input value="{{ $resume->user->name }}" type="text" disabled="disabled" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Phone *</label>
                                      <input value="{{ $resume->user->number }}" type="text" disabled="disabled" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Email *</label>
                                      <input value="{{ $resume->user->email }}" type="text" disabled="disabled"  class="form-control">
                                    </div>
                                  </div>
                                  
                              </div>
                            </div>
                        </div>

                        <!-- resume -->
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Edit Resume</h3>
                                <div class="block-options">
                                  df
                                </div>
                            </div>
                          <div class="block-content block-content-full">
                            <div class="careerfy-employer-box-section">
                                <div class="row careerfy-employer-profile-form">
                                    
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Job Title *</label>

                                          {!! Form::text('job_title',null,['class' => 'form-control']) !!} 

                                          @if ($errors->has('job_title'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('job_title') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Photo</label>
                                          <div>
                                              <input type="file" name="profile_img" class="form-control">
                                          </div>
                                          @if ($errors->has('profile_img'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('profile_img') }}</strong>
                                              </span>
                                          @endif
                                          
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Select Industry *</label>
                                          <div class="careerfy-profile-select">
                                              <select name="industry" required="required" value="{{ old('industry') }}" class="form-control">
                                                  <option selected="selected">Industry</option>           
                                                  <option value="1" {{ $resume->industry == 1 ? 'selected' : '' }}>Not Yet Licensed</option>
                                                  <option value="2" {{ $resume->industry == 2 ? 'selected' : '' }}>Salesperson</option>
                                                  <option value="3" {{ $resume->industry == 3 ? 'selected' : '' }}>Broker</option>
                                              </select>
                                          </div>
                                          @if ($errors->has('industry'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('industry') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Date of Birth *</label>
                                          <div class="row">
                                              <div class="col">
                                                  <select name="bth_day" class="form-control">
                                                      <option selected="selected" disabled>Birth Day</option>
                                                      <option value="1" {{ $resume->bth_day == 1 ? 'selected' : '' }}>dd</option>
                                                      <option value="2" {{ $resume->bth_day == 2 ? 'selected' : '' }}>dd</option>
                                                  </select>

                                                  @if ($errors->has('bth_day'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('bth_day') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                              <div class="col">
                                                  {!! Form::selectMonth('birth_month',null,['class' => 'form-control']) !!}
                                                  
                                                  @if ($errors->has('birth_month'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('birth_month') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                              <div class="col">
                                                  @php
                                                      $now = Carbon\Carbon::now();
                                                  @endphp
                                                  {{ Form::selectRange('birth_year', $now->year, 1930,null,['class' => 'form-control'])}}


                                                  @if ($errors->has('birth_year'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('birth_year') }}</strong>
                                                      </span>
                                                  @endif
                                                  
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Gander *</label>
                                          <div class="careerfy-profile-select">
                                              <select name="gander" class="form-control">
                                                  <option selected="selected" disabled>Select Gander</option>           
                                                  <option value="1" {{ $resume->gander == 1 ? 'selected' : '' }}>Male</option>
                                                  <option value="2" {{ $resume->gander == 2 ? 'selected' : '' }}>Female</option>
                                              </select>
                                          </div>
                                          @if ($errors->has('gander'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('gander') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Position *</label>

                                          <div class="checkbox" value="{{ old('position') }}">
                                              <p>
                                                  @php 
                                                      $position = unserialize($resume->position) 

                                                  @endphp
                                                  <input type="checkbox" value="1" name="position[]" @if(!empty($position[0])) {{ $position[0] == 1 ? 'checked' : ''  }} @else {{''}} @endif> Realtor
                                                  
                                              </p>
                                              <p>
                                                  <input type="checkbox" value="2" name="position[]" @if(!empty($position[1])) {{ $position[1] == 2 ? 'checked' : ''  }} @else {{''}} @endif>Real estate agent
                                              </p>
                                              <p>
                                                  <input type="checkbox" value="3" name="position[]" @if(!empty($position[2])) {{ $position[2] == 3 ? 'checked' : ''  }} @endif> Real estate broker
                                              </p>
                                          </div>
                                          @if ($errors->has('position'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('position') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Cover Letter *</label>
                                        {!! Form::textarea('cover_letter', null,['id'=>'js-ckeditor','class'=>'js-simplemde ']) !!}
                                        @if ($errors->has('cover_letter'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cover_letter') }}</strong>
                                            </span>
                                        @endif
                                            
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Alert:</label>
                                          <div class="checkbox">
                                              <p>
                                                  <input type="checkbox" name="alert" value="1" {{ $resume->alert == 1 ? 'checked' : '' }}> Let Brokers Find My Resume 
                                              </p>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- end resume -->

                        <!-- resume -->
                        <div class="block block-rounded block-bordered">
                          <div class="block-header block-header-default">
                              <h3 class="block-title">Additional Information</h3>
                              <div class="block-options">
                                df
                              </div>
                          </div>
                          <div class="block-content block-content-full">
                              <div class="row careerfy-employer-profile-form">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Are You Actively Licensed? *</label>
                                        <div class="careerfy-profile-select">
                                            <select name="licensed" value="{{ old('licensed') }}" class="form-control">
                                                <option disabled selected="selected">Select</option>
                                                <option value="1" {{ $agentInfo->licensed == 1 ? 'selected' : '' }}>Yes</option>
                                                <option value="2" {{ $agentInfo->licensed == 2 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>

                                        @if ($errors->has('licensed'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('licensed') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>License Type *</label>
                                        <div class="careerfy-profile-select">
                                            <select name="licensed_type" value="{{ old('licensed_type') }}" class="form-control">
                                                <option disabled selected="selected">Select License Type</option>           
                                                <option value="1" {{ $agentInfo->licensed_type == 1 ? 'selected' : '' }}>Not Yet Licensed</option>
                                                <option value="2" {{ $agentInfo->licensed_type == 2 ? 'selected' : '' }}>Salesperson</option>
                                                <option value="3" {{ $agentInfo->licensed_type == 3 ? 'selected' : '' }}>Broker</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('licensed_type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('licensed_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Years Experience *</label>
                                        <div class="careerfy-profile-select">
                                            <select name="expericnce" class="form-control">
                                                <option disabled >Select Years Experience</option>           
                                                <option value="0" {{ $agentInfo->expericnce == 0 ? 'selected' : '' }}>0</option>
                                                <option value="1" {{ $agentInfo->expericnce == 1 ? 'selected' : '' }}>1+</option>
                                                <option value="3" {{ $agentInfo->expericnce == 3 ? 'selected' : '' }}>3+</option>
                                                <option value="5" {{ $agentInfo->expericnce == 5 ? 'selected' : '' }}>5+</option>
                                                <option value="10" {{ $agentInfo->expericnce == 10 ? 'selected' : '' }}>10+</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('expericnce'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('expericnce') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload Resume</label>
                                        <div>
                                            <input type="file" name="resume" class="form-control">
                                        </div>
                                        @if ($errors->has('resume'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('resume') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>LinkedIn Profile</label>
                                        <div>
                                            <input type="text" name="linkedin" value="{{ $agentInfo->linkedin }}" class="form-control">

                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Where did you hear about Realty Scout?</label>
                                        <div class="careerfy-profile-select" class="form-control">
                                            <select name="where_know" value="{{ old('where_know') }}" class="form-control">
                                                <option disabled selected="selected">Select License Type</option>           
                                                <option value="1" {{ $agentInfo->where_know == 1 ? 'selected' : '' }}>Not Yet Licensed</option>
                                                <option value="2" {{ $agentInfo->where_know == 2 ? 'selected' : '' }}>Salesperson</option>
                                                <option value="3" {{ $agentInfo->where_know == 3 ? 'selected' : '' }}>Broker</option>
                                            </select>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <!-- resume -->

                        <!-- Address -->
                        <div class="block block-rounded block-bordered">
                          <div class="block-header block-header-default">
                              <h3 class="block-title">Address / Location</h3>
                              <div class="block-options">
                                df
                              </div>
                          </div>
                          <div class="block-content block-content-full">
                              <div class="row careerfy-employer-profile-form">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country *</label>
                                        <div class="careerfy-profile-select">
                                            

                                            <select name="country_id" id="country" class="form-control">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{ $country->id == $userLocation->country_id ? 'selected' : '' }}>{{$country->name}}</option>
                                            @endforeach
                                            </select>
                                            
                                        </div>
                                        @if ($errors->has('country_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Region *</label>
                                        <div class="careerfy-profile-select">
                                            <select name="state_id" id="state" class="form-control">
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}" {{ $state->id == $userLocation->state_id ? 'selected' : '' }}>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('state_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('state_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City / Town *</label>
                                        <div class="careerfy-profile-select">

                                            <select name="city_id" id="city" class="form-control">
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}" {{ $city->id == $userLocation->city_id ? 'selected' : '' }}>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('city_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input type="text" name="post_code" value="{{ $userLocation->post_code }}" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Full Address *</label>
                                        <input class="form-control" id="searchMap" type="text" name="geo_tagging" value="{{ $userLocation->geo_tagging }}">
                                        <input id="lat" type="hidden" name="lat" value="{{ $userLocation->lat }}">
                                        <input id="lng" type="hidden" name="lng" value="{{ $userLocation->lng }}">

                                        @if ($errors->has('geo_tagging'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('geo_tagging') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- show map canvas -->
                                        <div id="map-canvas"></div> 
                                        <span class="careerfy-short-message">For the precise location, you can drag and drop the pin.</span>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <!-- Address End -->


                        <!-- eXPERIENCE -->
                        <div class="block block-rounded block-bordered">
                          <div class="block-header block-header-default">
                              <h3 class="block-title">Address / Location</h3>
                              <div class="block-options">
                                df
                              </div>
                          </div>
                          <div class="block-content block-content-full">
                            <div class="row careerfy-employer-profile-form">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Position </label>
                                      <input type="text" name="title"  value="{{ $experienceDetails->title }}" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Company </label>
                                      <input type="text" name="co_name" value="{{ $experienceDetails->co_name }}" class="form-control">
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Is Current </label>
                                      <div class="checkbox checkboxfont">  
                                          <input type="radio" name="is_current" value="1" class="is_current" {{ $experienceDetails->is_current == '1' ? 'checked' : '' }}> Yes
                                          <input type="radio" name="is_current" value="2" class="is_current" {{ $experienceDetails->is_current == '2' ? 'checked' : '' }}> No
                                      </div>
                                  </div>
                                </div>
                                @if($experienceDetails->is_current == 2)

                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>From </label>
                                          <input class="form-control" type="date" name="start_date" value="{{ $experienceDetails->start_date }}">
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <div class="form-group">
                                            <label>To </label>
                                            <input class="form-control" type="date" name="end_date" value="{{ $experienceDetails->end_date }}">
                                        </div>
                                    </div>

                                @endif
                                <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Description </label>
                                      <textarea name="experience_description" id="js-ckeditor" class="js-simplemde">{{ $experienceDetails->description }}</textarea>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- eXPERIENCE end-->


                        <!-- Educational Information -->
                        <div class="block block-rounded block-bordered">
                          <div class="block-header block-header-default">
                              <h3 class="block-title">Address / Location</h3>
                              <div class="block-options">
                                df
                              </div>
                          </div>
                          <div class="block-content block-content-full">
                            <div class="row careerfy-employer-profile-form">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Country of college / University *</label>
                                      <div class="careerfy-profile-select">
                                          <select class="country form-control" name="country_of_college">
                                              <option selected disabled>Select</option>
                                              <option value="1" {{ $educationDetails->country_of_college == '1' ? 'selected' : '' }}>BANGLADESH</option>
                                              <option value="2" {{ $educationDetails->country_of_college == '2' ? 'selected' : '' }}>India</option>
                                          </select>
                                      </div>

                                      @if ($errors->has('country_of_college'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('country_of_college') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>College / University Name *</label>
                                      <div class="careerfy-profile-select">
                                          <select name="institute_name" class="form-control">
                                              <option selected disabled>Select</option>
                                              <option value="1" {{ $educationDetails->institute_name == '1' ? 'selected' : '' }}>CPI</option>
                                              <option value="2" {{ $educationDetails->institute_name == '2' ? 'selected' : '' }}>BUBT</option>
                                          </select>
                                      </div>
                                      
                                      @if ($errors->has('institute_name'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('institute_name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Degree Name *</label>
                                      <div class="careerfy-profile-select">
                                          <select name="degree" class="form-control">
                                              <option selected disabled>Select</option>
                                              <option value="1" {{ $educationDetails->degree == '1' ? 'selected' : '' }}>Diploma</option>
                                              <option value="2" {{ $educationDetails->degree == '2' ? 'selected' : '' }}>BSC</option>
                                          </select>
                                      </div>
                                      
                                      @if ($errors->has('degree'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('degree') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Major *</label>
                                      <div class="careerfy-profile-select">
                                          <select name="major" class="form-control">

                                              <option selected disabled>Select</option>
                                              <option value="cse" {{ $educationDetails->major == 'cse' ? 'selected' : '' }}>CSE</option>
                                              <option value="eee" {{ $educationDetails->major == 'eee' ? 'selected' : '' }}>EEE</option>
                                          </select>
                                      </div>
                                      @if ($errors->has('major'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('major') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Year of graduation *</label>
                                      <div class="careerfy-profile-select">
                                          <select name="graduation_date" class="form-control">
                                              <option selected disabled>Select</option>
                                              <option value="2018" {{ $educationDetails->graduation_date == 2018 ? 'selected' : '' }}>2018</option>
                                              <option value="2017" {{ $educationDetails->graduation_date == 2017 ? 'selected' : '' }}>2017</option>
                                          </select>
                                      </div>
                                      @if ($errors->has('graduation_date'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('graduation_date') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>CGPA </label>
                                      <div>
                                          <input type="text" value="{{ $educationDetails->cgpa }}" name="cgpa" class="form-control">
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- Educational Information -->
                        <button type="submit" class="btn btn-hero-md btn-square btn-outline-warning mr-1 mb-3 p-3" style="margin-top: 20px;">
                            <i class="fa fa-fw fa-pencil-alt"></i> Update
                        </button>
                    {!! Form::close() !!}

                </div>
                <!-- END Page Content -->



@endsection


@section('scripts')

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA78tV7rTO62MUBscyt08AnZoRs_sQSxok&libraries=places"></script>
    <script type="text/javascript">
        // Google map
        jQuery(document).ready(function(){
          var lat = parseFloat(document.getElementById('lat').value);
          var lng = parseFloat(document.getElementById('lng').value);
          var map = new google.maps.Map(document.getElementById('map-canvas'),{
              center:{
                lat:lat,
                lng:lng
              },
              zoom:15
          });

          var marker = new google.maps.Marker({
            position: {
                lat:lat,
                lng:lng
            },
            map: map,
            draggable: true
          });

          var searchBox = new google.maps.places.SearchBox(document.getElementById('searchMap'));

          google.maps.event.addListener(searchBox, 'places_changed', function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i,place;

            for (i=0; place=places[i];i++){
              bounds.extend(place.geometry.location);
              marker.setPosition(place.geometry.location); //set marker position neww....
            }
            map.fitBounds(bounds);
            map.setZoom(15);
          });

          google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);

          });
        });


        //Automatic country select
        $('#country').change(function(){
        var countryID = $(this).val();    
        if(countryID){
            $.ajax({
               type:"GET",
               url:"{{url('get-state-list')}}?country_id="+countryID,
               success:function(res){               
                if(res){
                    $("#state").empty();
                    $("#state").append('<option>Select State</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#state").empty();
                }
               }
            });
        }else{
            $("#state").empty();
            $("#city").empty();
        }      
       });
        $('#state').on('change',function(){
        var stateID = $(this).val();    
        if(stateID){
            $.ajax({
               type:"GET",
               url:"{{url('get-city-list')}}?state_id="+stateID,
               success:function(res){               
                if(res){
                    $("#city").empty();
                    $("#city").append('<option>Select City</option>');
                    $.each(res,function(key,value){
                        $("#city").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#city").empty();
                }
               }
            });
        }else{
            $("#city").empty();
        }
            
       });
    </script>
<script type="text/javascript">
    CKEDITOR.replace( 'experience_description' );
    CKEDITOR.add            
 </script>

@endsection