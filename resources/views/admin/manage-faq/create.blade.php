@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Add New FAQ</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New FAQ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    

                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add New FAQ</h3>
                        </div>
                        <div class="block-content block-content-full">

                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                            {!! Form::open(['method'=>'POST','action'=>'Admin\AdminFAQController@store','files'=>true]) !!}
                            @csrf
                                <div class="careerfy-employer-box-section">
                                    <div class="row careerfy-employer-profile-form">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Question  *</label>
                                                <input placeholder="Question" type="text" class="form-control" name="question">
                                            </div>
                                            @if ($errors->has('question'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('question') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="answer">Content <span>*</span></label>
                                              {!! Form::textarea('answer', null,['id'=>'js-ckeditor','class'=>'js-simplemde']) !!}

                                                @if ($errors->has('answer'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('answer') }}</strong>
                                                    </span>
                                                @endif
                                            </div><!-- singel form -->
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="answer">Select FAQ For <span>*</span></label>
                                              <select name="faq_for" class="form-control">
                                                  <option disabled="disabled" selected="selected">Select</option>
                                                  <option value="agent">Agent</option>
                                                  <option value="broker">Broker</option>
                                              </select>

                                                @if ($errors->has('faq_for'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('faq_for') }}</strong>
                                                    </span>
                                                @endif
                                            </div><!-- singel form -->
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="example-checkbox-custom1" name="status" value="1" checked="checked">
                                                  <label class="custom-control-label" for="example-checkbox-custom1">Active</label>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-hero-md btn-square btn-outline-warning mr-1 mb-3 form-control">
                                                  <i class="fa fa-fw fa-pencil-alt"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                        
                                                            
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->

                </div>
                <!-- END Page Content -->



@endsection
