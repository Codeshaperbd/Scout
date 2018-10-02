@extends('layouts.app-admin')


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
                    
                            {!! Form::model($jobpost, ['method'=>'PATCH','action'=>['Admin\AdminJobPostingController@update',$jobpost->id],'files'=>true]) !!}
                              @csrf




                              @if(Session::has('job_update'))
                                <div class="alert alert-danger alert-size">
                                  <strong>{{Session('job_update')}}</strong>
                                </div>
                              @endif

                              @if(Session::has('is_active'))
                                <div class="alert alert-success alert-size">
                                  <strong>{{Session('is_active')}}</strong>
                                </div>
                              @endif
                              <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Edit Details</h3>


                                    <div class="block-options">
                                      @if($jobpost->is_active == 1)
                                        <a href="{{route('published-job',['id' => $jobpost->id, 'status' => 'inactive']) }}">
                                          <button type="button" class="btn btn-hero-sm btn-square btn-outline-warning mr-1 mb-3">
                                              <i class="fa fa-fw fa-eye-slash"></i> Deactive Job
                                          </button>
                                        </a>
                                      @else

                                        <a href="{{route('published-job',['id' => $jobpost->id, 'status' => 'active']) }}">
                                          <button type="button" class="btn btn-hero-sm btn-square btn-outline-success mr-1 mb-3">
                                              <i class="fa fa-fw fa-check"></i> Active This Job
                                          </button>
                                        </a>
                                      @endif
                                    </div>
                                </div>

                                <div class="block-content block-content-full">
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
                                    {!! Form::textarea('description', null,['id'=>'js-ckeditor','class'=>'js-simplemde']) !!}

                                      @if ($errors->has('simplemde'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('simplemde') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                    <label for="title">Industry <span>*</span></label>
                                    <select name="industry" class="form-control">
                                        <option disabled="disabled" selected="selected">Select Industry</option>
                                        <option value="1" selected="selected">Real Estate</option>
                                    </select>

                                      @if ($errors->has('industry'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('industry') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->

                                  
                                  <div class="form-group">  

                                      @php $position = unserialize($jobpost->JobCategory); @endphp

                                      <label>Position<span>*</span></label>
                                      
                                      <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="example-checkbox-custom1" name="JobCategory[]" value="1" @if(!empty($position[0]) && $position[0] == 1) checked="checked" @endif>
                                          <label class="custom-control-label" for="example-checkbox-custom1">&nbsp;Realtor</label>
                                      </div>
                                      <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="example-checkbox-custom2" name="JobCategory[]" value="2" @if(!empty($position[1]) && $position[1] == 2) checked="checked" @endif>
                                          <label class="custom-control-label" for="example-checkbox-custom2">&nbsp;Real Estate Agent</label>
                                      </div>
                                      <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="example-checkbox-custom3" name="JobCategory[]"  value="3" @if(!empty($position[2]) && $position[2] == 3) checked="checked" @endif>
                                          <label class="custom-control-label" for="example-checkbox-custom3">&nbsp;Real Estate Broker</label>
                                      </div>

                                    
                                      @if ($errors->has('JobCategory'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('JobCategory') }}</strong>
                                          </span>
                                      @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                    <label for="location">Location <span>*</span></label>
                                    {!! Form::text('location',null,['id'=>'searchTextField','class'=>'form-control']) !!}
                                    
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


                                         <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="example-checkbox-custom11" @if(!empty($jobpost->byemailapply)) checked="checked" @endif>
                                              <label class="custom-control-label" for="example-checkbox-custom11">&nbsp;By Email</label>
                                              <br>
                                          </div>
                                          
                                          
                                          {!! Form::text('byemailapply',null,['class'=>'form-control']) !!}
                                          @if ($errors->has('byemailapply'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('byemailapply') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                        <div class="col-md-6">
                                           


                                           <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="example-checkbox-custom12" @if(!empty($$jobpost->byurlapply)) checked="checked" @endif>
                                                <label class="custom-control-label" for="example-checkbox-custom12">&nbsp;By URL</label>
                                                <br>
                                            </div>

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
                                      <select name="employment_type" class="form-control">
                                          <option disabled="disabled" selected="selected">Select Employment type </option>
                                          <option value="contract" @if($jobpost->employment_type == 'contract') selected @endif>Contract</option>
                                          <option value="salary" @if($jobpost->employment_type == 'salary') selected @endif>Salary</option>
                                      </select>
                                        @if ($errors->has('employment_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employment_type') }}</strong>
                                        </span>
                                        @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="title">Education requirements</label>
                                      <select name="education" class="form-control">
                                          <option disabled="disabled" selected="selected" name="education">Select Education requirements</option>
                                          <option value="1" @if($jobpost->education == 1) selected @endif>None</option>
                                          <option value="2" @if($jobpost->education == 2) selected @endif>Diploma</option>
                                          <option value="3" @if($jobpost->education == 3) selected @endif>Associate Degree</option>
                                          <option value="4" @if($jobpost->education == 4) selected @endif>Bechelor's Degree</option>
                                      </select>
                                          @if ($errors->has('education'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('education') }}</strong>
                                            </span>
                                          @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="title">Qualifications</label>
                                      <select name="qualifications" class="form-control">
                                          <option disabled="disabled" selected="selected" disabled="disabled">Select Qualifications</option>
                                          <option value="2" @if($jobpost->qualifications == 2) selected @endif>No Licence Required</option>
                                          <option value="3" @if($jobpost->qualifications == 3) selected @endif>Licence Required</option>
                                      </select>
                                          @if ($errors->has('qualifications'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('qualifications') }}</strong>
                                            </span>
                                          @endif
                                  </div><!-- singel form -->



                                  <div class="form-group">
                                      <label for="Experience">Experience requirements <span>*</span></label>
                                      {!! Form::textarea('experience', null,['id'=>'js-ckeditor','class'=>'js-simplemde']) !!}
                                        @if ($errors->has('experience'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('experience') }}</strong>
                                          </span>
                                        @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="Experience">Responsibilities </label>

                                      {!! Form::textarea('responsibilities', null,['id'=>'js-ckeditor','class'=>'js-simplemde']) !!}

                                      @if ($errors->has('responsibilities'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('responsibilities') }}</strong>
                                        </span>
                                      @endif
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="Experience">Skills </label>
                                      {!! Form::textarea('skills', null,['id'=>'js-ckeditor','class'=>'js-simplemde']) !!}
                                  </div><!-- singel form -->

                                  <div class="form-group">
                                      <label for="title">Work hours</label>
                                      <select name="work_hour" class="form-control">
                                          <option disabled="disabled" selected="selected">Select Work hours</option>
                                          <option value="1" @if($jobpost->qualifications == 1) selected @endif>Independent</option>
                                          <option value="2" @if($jobpost->qualifications == 2) selected @endif>Full time</option>
                                          <option value="3" @if($jobpost->qualifications == 3) selected @endif>Part time</option>
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
     
                                    <button type="submit" class="btn btn-hero-sm btn-square btn-outline-warning mr-1 mb-3">
                                        <i class="fa fa-fw fa-pencil-alt"></i> Update
                                    </button>

                                </div>
                              </div>
                              {!! Form::close() !!}

                </div>
                <!-- END Page Content -->



@endsection


@section('scripts')

<script type="text/javascript">
    CKEDITOR.replace( 'skills' );
    CKEDITOR.add            
 </script>
<script type="text/javascript">
    CKEDITOR.replace( 'experience' );
    CKEDITOR.add            
 </script>
<script type="text/javascript">
    CKEDITOR.replace( 'responsibilities' );
    CKEDITOR.add            
 </script>

@endsection