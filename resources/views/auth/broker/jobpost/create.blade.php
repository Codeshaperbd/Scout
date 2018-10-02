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
                       <h1>Post New Job</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">Post New Job</li>
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
                    <div class="careerfy-column-9">
                        <div class="careerfy-typo-wrap">
                          <div class="careerfy-contact-form post_new_job">

                              <div class="careerfy-profile-title"><h2>Post a Job</h2></div>
                              {!! Form::open(['method'=>'POST','action'=>'JobPostController@store','files'=>true]) !!}
                              @csrf


                                  <div class="form-group">
                                    <label for="title">Job Title <span>*</span></label>

                                    {!! Form::text('title',null,['id'=>'title','class'=>'form-control']) !!}
                                    
                                      @if ($errors->has('title'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('title') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                    <label for="description">Job Description <span>*</span></label>
                                    {!! Form::textarea('description', null,['id'=>'description','class'=>'form-control']) !!}

                                      @if ($errors->has('description'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('description') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                    <label for="title">Industry <span>*</span></label>
                                    <select name="industry">
                                        <option disabled="disabled" selected="selected">Select Industry</option>
                                        <option value="1">Real Estate</option>
                                    </select>
                                    
                                      @if ($errors->has('industry'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('industry') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->

                                  
                                  <div class="form-group">
                                    <label class="form-label">Position<span>*</span></label>

                                    <input class="checkBoxJobCategory" type="checkbox" name="JobCategory[]" value="1"><span>&nbsp;Realtor</span><br>
                                    <input class="checkBoxJobCategory" type="checkbox" name="JobCategory[]" value="2"><span>&nbsp;Real Estate Agent</span><br>
                                    <input class="checkBoxJobCategory" type="checkbox" name="JobCategory[]" value="3"><span>&nbsp;Real Estate Broker</span>

                                    
                                      @if ($errors->has('JobCategory'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('JobCategory') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                    <label for="location">Location <span>*</span></label>

                                    {!! Form::select('location',[''=>'Choose Location'] + $states,null,['class' => 'form-control']) !!}
                                    
                                      @if ($errors->has('location'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('location') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->


                                  <div class="form-group how_to_aply">
                                     <label class="form-label">How to Apply *</label>

                                     <div class="row">
                                        <div class="col-md-6">
                                           
                                          <label for="via-email" class="form-label">
                                           <input type="radio"> <span>By Email</span><br>
                                          </label>
                                          
                                          {!! Form::text('byemailapply',null,['class'=>'form-control']) !!}
                                          @if ($errors->has('byemailapply'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('byemailapply') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                        <div class="col-md-6">
                                           
                                           <label for="via-site" class="form-label">
                                           <input type="radio" name="Apply"><span>By URL</span>
                                           </label>
                                          {!! Form::text('byurlapply',null,['class'=>'form-control']) !!}
                                          @if ($errors->has('byurlapply'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('byurlapply') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                     </div>
                                  </div>


                                  <div class="form-group">
                                      <label for="title">Employment type</label>
                                      <select name="employment_type">
                                          <option disabled="disabled" selected="selected">Select Employment type </option>
                                          <option value="contract">Contract</option>
                                          <option value="salary">Salary</option>
                                      </select>
                                          @if ($errors->has('employment_type'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('employment_type') }}</strong>
                                          </span>
                                          @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="title">Education requirements</label>
                                      <select name="education">
                                          <option disabled="disabled" selected="selected" name="education">Select Education requirements</option>
                                          <option value="1">None</option>
                                          <option value="2">Diploma</option>
                                          <option value="3">Associate Degree</option>
                                          <option value="4">Bechelor's Degree</option>
                                      </select>
                                          @if ($errors->has('education'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('education') }}</strong>
                                            </span>
                                          @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="title">Qualifications</label>
                                      <select name="qualifications">
                                          <option disabled="disabled" selected="selected" name="1">Select Qualifications</option>
                                          <option value="2">No Licence Required</option>
                                          <option value="3">Licence Required</option>
                                      </select>
                                          @if ($errors->has('qualifications'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('qualifications') }}</strong>
                                            </span>
                                          @endif
                                  </div><!-- singel form -->



                                  <div class="form-group">
                                      <label for="Experience">Experience requirements <span>*</span></label>

                                      {!! Form::textarea('experience', null,['id'=>'Experience','class'=>'form-control']) !!}
                                          @if ($errors->has('experience'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('experience') }}</strong>
                                            </span>
                                          @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="Experience">Responsibilities </label>

                                      {!! Form::textarea('responsibilities', null,['id'=>'responsibilities','class'=>'form-control']) !!}
                                          @if ($errors->has('responsibilities'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('responsibilities') }}</strong>
                                            </span>
                                          @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="Experience">Skills </label>
                                      {!! Form::textarea('skills', null,['id'=>'skills','class'=>'form-control']) !!}
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="title">Work hours</label>
                                      <select name="work_hour">
                                          <option disabled="disabled" selected="selected">Select Work hours</option>
                                          <option value="1">Independent</option>
                                          <option value="2">Full time</option>
                                          <option value="3">Part time</option>
                                      </select>
                                  </div><!-- singel form -->


                                  <div class="form-group">
                                      <label for="estimated_salary">Estimated salary </label>
                                      
                                      {!! Form::text('estimated_salary',null,['class'=>'form-control']) !!}
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="incentive">Incentive Compensation </label>
                                      {!! Form::text('incentive',null,['class'=>'form-control']) !!}
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="base_salary">Base salary </label>
                                      {!! Form::text('base_salary',null,['class'=>'form-control']) !!}
                                  </div><!-- singel form -->
     
                                    <button type="submit" class="btn btn-submit">Preview</button>
                                  
                              {!! Form::close() !!}

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

