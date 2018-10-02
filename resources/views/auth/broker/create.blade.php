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
                       <h1>Broker Dir</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">Complete Profile</li>
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
                  
                            {!! Form::open(['method'=>'POST','action'=>'BrokerController@store','files'=>true]) !!}
                            @csrf


                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert" style="text-align: center;display: block;font-size: 30px;margin-bottom: 35px;">
                                        <strong>You have already registered.</strong>
                                    </span>
                                @endif

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
                                    <div class="careerfy-profile-title"><h2>Company Profile</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        
                                        <li class="careerfy-column-6">
                                            <label>Company Name *</label>
                                            <input type="text" name="name" value="{{ old('name') }}">

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Company Logo</label>
                                            <div>
                                                <input type="file" name="profile_img">
                                            </div>
                                            @if ($errors->has('profile_img'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('profile_img') }}</strong>
                                                </span>
                                            @endif
                                            
                                        </li>
                                        <li class="careerfy-column-12">
                                            <label>Office Phone & extension *</label>
                                            <input type="text" name="phone" value="{{ old('phone') }}">

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </li>
                                        
                                    </ul>
                                </div>
                                <!-- end resume -->

                                <!-- address -->
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
                                <!-- ass End -->

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