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
          @if(Session::has('job_update'))
            <div class="alert alert-danger alert-size">
              <strong>{{Session('job_update')}}</strong>
            </div>
          @endif

        {!! Form::model($brokerinfo, ['method'=>'PATCH','action'=>['Admin\AdminEmployerController@update',$brokerinfo->id],'files'=>true]) !!}
          @csrf

            <div class="block block-rounded block-bordered">
              <div class="block-header block-header-default">
                  <h3 class="block-title">Company Information</h3>

                  <div class="block-options">
                   
                  </div>
              </div>

              <div class="block-content block-content-full">
                  <div class="row careerfy-employer-profile-form">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name *</label>
                            <input required value="{{ $brokerinfo->name }}" type="text" name="name" class="form-control"> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Office Phone & extension *</label>
                          <input required value="{{ $brokerinfo->phone }}" type="text" name="phone" class="form-control">
                        </div>
                      </div>
                  </div>
              </div>
            </div>

            <div class="block block-rounded block-bordered">
              <div class="block-header block-header-default">
                  <h3 class="block-title">Address / Location</h3>

                  <div class="block-options">
                   
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
                            <input id="searchMap" type="text" name="geo_tagging" value="{{ $userLocation->geo_tagging }}" class="form-control">
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
                          <!-- show map canvas -->
                          <div id="map-canvas"></div> 
                          <span class="careerfy-short-message">For the precise location, you can drag and drop the pin.</span>
                      </div>
                  </div>

                  <button type="submit" class="btn btn-hero-md btn-square btn-outline-warning mr-1 mb-3 p-3" style="margin-top: 20px;">
                      <i class="fa fa-fw fa-pencil-alt"></i> Update
                  </button>
              </div>
            </div>

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

@endsection