@extends('layouts.app')

@section('styles')
    <style type="text/css">
        a.btn.btn-default.btn-custome {
            background: #4bb4fe;
            color: #fff;
            font-size: 16px;
            border: 0px;
            width: 100%;
        }

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

        .careerfy-employer-profile-submit.delete{
          background: red;
          margin-left: 10px;
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
                       <h1>MY Profile</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">MY Profile</li>
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


                @if(Session::has('update_user'))
                    <div class="alert alert-success alert-size">
                      <strong>{{Session('update_user')}}</strong>
                    </div>
                @endif
                
                @if(Session::has('broker_created'))
                    <div class="alert alert-success alert-size">
                      <strong>{{Session('broker_created')}}</strong>
                    </div>
                @endif

                @if(Session::has('broker_updated'))
                    <div class="alert alert-success alert-size">
                      <strong>{{Session('broker_updated')}}</strong>
                    </div>
                @endif

                @if(Session::has('deleteResume'))
                    <div class="alert alert-danger alert-size">
                      <strong>{{Session('deleteResume')}}</strong>
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


                            
                            <form class="careerfy-employer-dasboard" method="PATCH" action="{{ route('console_update',Auth::user()->slug) }}">
                                @csrf
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Basic Information</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>First Name *</label>
                                            <input required value="{{ Auth::user()->name }}" type="text" name="name"> 
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Last Nmae *</label>
                                            <input required value="{{ Auth::user()->lname }}" type="text" name="lname">
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Email*</label>
                                            <input required value="{{ Auth::user()->email }}" type="text" name="email">
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Phone *</label>
                                            <input required value="{{ Auth::user()->number }}" type="text" name="number">
                                        </li>
                                    </ul>
                                </div>
                                <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                            </form>

 
                            
                            @if(!empty($brokerinfo))

                              {!! Form::model($brokerinfo, ['method'=>'PATCH','action'=>['BrokerController@update',$brokerinfo->id],'files'=>true]) !!}
                              @csrf
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Company Information</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>Company Name *</label>
                                            <input required value="{{ Auth::user()->BrokerInfo->name }}" type="text" name="name"> 
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Phone *</label>
                                            <input required value="{{ Auth::user()->BrokerInfo->phone }}" type="text" name="phone">
                                        </li>
                                    </ul>
                                </div>

                                <!-- Address -->
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Address / Location</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                        <li class="careerfy-column-6">
                                            <label>Country *</label>
                                            <div class="careerfy-profile-select">
                                                

                                                <select name="country_id" id="country">
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
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Region *</label>
                                            <div class="careerfy-profile-select">
                                                <select name="state_id" id="state">
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
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>City / Town *</label>
                                            <div class="careerfy-profile-select">

                                                <select name="city_id" id="city">
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
                                        </li>
                                        <li class="careerfy-column-6">
                                            <label>Postcode</label>
                                            <input type="text" name="post_code" value="{{ $userLocation->post_code }}">
                                        </li>
                                        <li class="careerfy-column-12">
                                            <label>Full Address *</label>
                                            <input id="searchMap" type="text" name="geo_tagging" value="{{ $userLocation->geo_tagging }}">
                                            <input id="lat" type="hidden" name="lat" value="{{ $userLocation->lat }}">
                                            <input id="lng" type="hidden" name="lng" value="{{ $userLocation->lng }}">

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

                                <input type="submit" class="careerfy-employer-profile-submit" value="Update Company Details">
                               
                              {!! Form::close() !!}

                              <!-- delete button -->
                              <form id="delete-form-{{ $brokerinfo->id }}" method="post" action="{{ route('broker.destroy',$brokerinfo->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $brokerinfo->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" >
                                  <button class="careerfy-employer-profile-submit delete">
                                     Delete Company Details
                                  </button>
                              </a>


                          @else
                          <!-- complete your profile -->
                          <a href="{{ route('profile_create') }}" class="btn btn-default btn-custome">Complete your profile</a>
                          <!-- complete your profile end -->
                          <p>Note: Complete Your Company Profile Otherwise You Can Not Post Job.</p>
                          @endif
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

@endsection