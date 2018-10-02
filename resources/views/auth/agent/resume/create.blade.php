@extends('layouts.app')


@section('styles')
    <style type="text/css">
        #map-canvas {
            width: 100%;
            height: 300px;
            border-radius: 13px;
            margin-top: 20px;
        }

        .checkbox p {
            display: inline-block;
            margin-left: 27px;
            line-height: 21px;
            color: #000;
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

                    <div class="col-md-10 col-md-offset-1 careerfy-typo-wrap">
                        <div class="careerfy-typo-wrap">
                  
                            {!! Form::open(['method'=>'POST','action'=>'ResumeController@store','files'=>true]) !!}
                            @csrf
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Basic Information</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>Your Name *</label>
                                            <input value="{{ Auth::user()->name }}" type="text" disabled="disabled">
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Phone *</label>
                                            <input value="{{ Auth::user()->number }}" type="text" disabled="disabled">
                                        </li>
                                        <li class="careerfy-column-12">
                                            <label>Email *</label>
                                            <input value="{{ Auth::user()->email }}" type="text" disabled="disabled">
                                        </li>
                                        
                                    </ul>
                                </div>

                                <!-- resume -->
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Create New Resume</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        
                                        <li class="careerfy-column-6">
                                            <label>Job Title *</label>
                                            <input type="text" name="job_title" value="{{ old('job_title') }}">

                                            @if ($errors->has('job_title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('job_title') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Photo</label>
                                            <div>
                                                <input type="file" name="profile_img">
                                            </div>
                                            @if ($errors->has('profile_img'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('profile_img') }}</strong>
                                                </span>
                                            @endif
                                            
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Select Industry *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="industry" required="required" value="{{ old('industry') }}">
                                                    <option selected="selected">Industry</option>           
                                                    <option value="1">Not Yet Licensed</option>
                                                    <option value="2">Salesperson</option>
                                                    <option value="3">Broker</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('industry'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('industry') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Date of Birth *</label>
                                            <div class="careerfy-three-column-row">
                                                <div class="careerfy-profile-select careerfy-three-column">
                                                    <select name="bth_day">
                                                        <option selected="selected" disabled>Birth Day</option>
                                                        @for($i=1; $i<=31; $i++)
                                                        <option value="{{$i}}" {{ old('bth_day') == $i ? 'selected' : '' }}>{{$i}}</option>
                                                        @endfor
                                                    </select>

                                                    @if ($errors->has('bth_day'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('bth_day') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="careerfy-profile-select careerfy-three-column">
                                                    {!! Form::selectMonth('birth_month','auto') !!}
                                                    
                                                    @if ($errors->has('birth_month'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('birth_month') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="careerfy-profile-select careerfy-three-column">
                                                    @php
                                                        $now = Carbon\Carbon::now();
                                                    @endphp
                                                    {{ Form::selectRange('birth_year', $now->year, 1930)}}


                                                    @if ($errors->has('birth_year'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('birth_year') }}</strong>
                                                        </span>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Gander *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="gander">
                                                    <option selected="selected" disabled>Select Gander</option>           
                                                    <option value="1" {{ old('gander') == 1 ? 'selected' : '' }}>Male</option>
                                                    <option value="2" {{ old('gander') == 2 ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('gander'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gander') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Position *</label>
                                            <div class="checkbox" value="{{ old('position') }}">
                                                <p>
                                                    {!! Form::checkbox('position[0]', '1') !!} Realtor
                                                </p>
                                                <p>
                                                    {!! Form::checkbox('position[1]', '2') !!} Real estate agent
                                                </p>
                                                <p>
                                                    {!! Form::checkbox('position[2]', '3') !!} Real estate broker
                                                </p>
                                            </div>
                                            @if ($errors->has('position'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('position') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-12">
                                            <label>Cover Letter *</label>
                                            {!! Form::textarea('cover_letter', null) !!}
                                            @if ($errors->has('cover_letter'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('cover_letter') }}</strong>
                                                </span>
                                            @endif
                                                
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Alert:</label>
                                            <div class="checkbox">
                                                <p>
                                                    <input type="checkbox" name="alert" value="1" {{ old('alert') == 1 ? 'selected' : '' }}> Let Brokers Find My Resume 
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end resume -->

                                <!-- resume -->
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Additional Information</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>Are You Actively Licensed? *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="licensed" value="{{ old('licensed') }}">
                                                    <option disabled selected="selected">Select</option>
                                                    <option value="1" {{ old('licensed') == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="2" {{ old('licensed') == 2 ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>

                                            @if ($errors->has('licensed'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('licensed') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>License Type *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="licensed_type" value="{{ old('licensed_type') }}">
                                                    <option disabled selected="selected">Select License Type</option>           
                                                    <option value="1" {{ old('licensed_type') == 1 ? 'selected' : '' }}>Not Yet Licensed</option>
                                                    <option value="2" {{ old('licensed_type') == 2 ? 'selected' : '' }}>Salesperson</option>
                                                    <option value="3" {{ old('licensed_type') == 3 ? 'selected' : '' }}>Broker</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('licensed_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('licensed_type') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Years Experience *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="expericnce" value="{{ old('expericnce') }}">
                                                    <option disabled selected="selected">Select Years Experience</option>           
                                                    <option value="0" {{ old('expericnce') == 1 ? 'selected' : '' }}>0</option>
                                                    <option value="1" {{ old('expericnce') == 2 ? 'selected' : '' }}>1+</option>
                                                    <option value="3" {{ old('expericnce') == 3 ? 'selected' : '' }}>3+</option>
                                                    <option value="4" {{ old('expericnce') == 4 ? 'selected' : '' }}>5+</option>
                                                    <option value="10" {{ old('expericnce') == 5 ? 'selected' : '' }}>10+</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('expericnce'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('expericnce') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Upload Resume</label>
                                            <div>
                                                <input type="file" name="resume" >
                                            </div>
                                            @if ($errors->has('resume'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('resume') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>LinkedIn Profile</label>
                                            <div>
                                                <input type="text" name="linkedin" value="{{ old('linkedin') }}">
                                            </div>
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Where did you hear about Realty Scout?</label>
                                            <div class="careerfy-profile-select">
                                                <select name="where_know" value="{{ old('where_know') }}">
                                                    <option disabled selected="selected">Select License Type</option>           
                                                    <option value="1" {{ old('expericnce') == 1 ? 'selected' : '' }}>Google search</option>
                                                    <option value="2" {{ old('expericnce') == 2 ? 'selected' : '' }}>Google Ad</option>
                                                    <option value="3" {{ old('expericnce') == 3 ? 'selected' : '' }}>Facebook</option>
                                                    <option value="4" {{ old('expericnce') == 4 ? 'selected' : '' }}>Twitter</option>
                                                    <option value="5" {{ old('expericnce') == 5 ? 'selected' : '' }}>Instagram</option>
                                                    <option value="6" {{ old('expericnce') == 6 ? 'selected' : '' }}>Linkedin</option>
                                                    <option value="7" {{ old('expericnce') == 7 ? 'selected' : '' }}>Colleague or friend</option>
                                                    <option value="8" {{ old('expericnce') == 8 ? 'selected' : '' }}>Other</option>

                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- resume -->

                                <!-- Address -->
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Address / Location</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>Country *</label>
                                            <div class="careerfy-profile-select">
                                                
                                                {!! Form::select('country_id', ['' => 'Select Country'] +$countries,'',array('class'=>' no-border','id'=>'country'));!!}
                                                
                                            </div>
                                            @if ($errors->has('country_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country_id') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Region *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="state_id" id="state" >
                                                  <option selected disabled>Select State</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('state_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('state_id') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>City / Town *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="city_id" id="city">
                                                    <option selected disabled="">Select City</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('city_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('city_id') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Postcode</label>
                                            <input placeholder="00000" type="text" name="post_code" value="{{ old('post_code') }}">
                                        </li>
                                        <li class="careerfy-column-12">
                                            <label>Full Address *</label>

                                            {!! Form::text('geo_tagging',null,['id'=>'searchMap']) !!}

                                            {!! Form::hidden('lat','23.810332',['class'=>'form-control rounded','id'=>'lat']) !!}

                                            {!! Form::hidden('lng','90.412518',['class'=>'form-control rounded','id'=>'lng']) !!}

                                            @if ($errors->has('geo_tagging'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('geo_tagging') }}</strong>
                                                </span>
                                            @endif
                                        </li>

                                        <li class="careerfy-column-12">
                                            <!-- show map canvas -->
                                            <div id="map-canvas"></div> 
                                            <span class="careerfy-short-message">For the precise location, you can drag and drop the pin.</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Address End -->


                                <!-- eXPERIENCE -->
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Experience</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>Position </label>
                                            <input type="text" name="title"  value="{{ old('title') }}">
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Company </label>
                                            <input type="text" name="co_name" value="{{ old('co_name') }}">
                                        </li>

                                        <li class="careerfy-column-12">
                                            <label>Is Current </label>
                                            <div class="checkbox checkboxfont">  
                                                <input type="radio" name="is_current" value="1" class="is_current" > Yes
                                                <input type="radio" name="is_current" value="2" class="is_current" > No
                                            </div>
                                        </li>
                                        <div id="job_date">
                                            <li class="careerfy-column-6">
                                                <label>From </label>
                                                <input type="date" name="start_date" value="{{ old('start_date') }}">
                                            </li>
                                            
                                            <li class="careerfy-column-6">
                                                <label>To </label>
                                                <input type="date" name="end_date" value="{{ old('end_date') }}">
                                            </li>
                                        </div>
                                        <li class="careerfy-column-12">
                                            <label>Description </label>
                                            <textarea name="experience_description" value="{{ old('experience_description') }}"></textarea>
                                                
                                        </li>
                                    </ul>
                                </div>
                                <!-- eXPERIENCE end-->


                                <!-- Educational Information -->
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Education Information</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>Country of college / University *</label>
                                            <input type="text" name="country_of_college" value="{{ old('country_of_college') }}">


                                            @if ($errors->has('country_of_college'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country_of_college') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>College / University Name *</label>
                                            <input type="text" name="institute_name" value="{{ old('institute_name') }}">
                                            
                                            @if ($errors->has('institute_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('institute_name') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Degree Name *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="degree">
                                                    <option selected disabled="">Select</option>
                                                    <option value="1">Not specified</option>
                                                    <option value="2">Associate's degree(2 Year's)</option>
                                                    <option value="3">Bachelor's degree(4 Year's)</option>
                                                    <option value="4">Master's degree(1-3 Year's)</option>
                                                    <option value="5">Doctoral degree(5-7 Year's)</option>
                                                    <option value="6">Profesional degree(5-7 Year's)</option>
                                                </select>
                                            </div>
                                            
                                            @if ($errors->has('degree'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('degree') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Major *</label>
                                            <input type="text" placeholder="Department Or Subject name" name="major" value="{{ old('major') }}">

                                            @if ($errors->has('major'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('major') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Year of graduation *</label>
                                            <input type="text" placeholder="Enter year" name="graduation_date" value="{{ old('graduation_date') }}">
                                           
                                            @if ($errors->has('graduation_date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('graduation_date') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>CGPA </label>
                                            <div>
                                                <input type="text" placeholder="5 Out of 5" name="cgpa">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Educational Information -->
                                <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                                
                            {!! Form::close() !!}
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


    <script type="text/javascript">
        // Google map
        jQuery(document).ready(function(){
            var map = new google.maps.Map(document.getElementById('map-canvas'),{
                center:{
                  lat:23.8067299,
                  lng:90.364903
                },
                zoom:15
            });

            var marker = new google.maps.Marker({
              position: {
                  lat:23.8067299,
                  lng:90.364903
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


        //form hide
          $("#job_date").css("display","none");
          $(".is_current").click(function(){
              if ($('input[name=is_current]:checked').val() == "2") {
                  $("#job_date").slideDown("fast"); //Slide Down Effect
                  $.cookie('showTop', 'expanded'); //Add cookie 'ShowTop'
              }

              if ($('input[name=is_current]:checked').val() == "1"){
                  $("#job_date").slideUp("fast");  
                  $.cookie('showTop', 'collapsed'); //Add cookie 'ShowTop'
              }
           });
    </script>
@endsection