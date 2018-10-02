@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">User</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    @if(Session::has('update_user'))
                        <div class="alert alert-danger alert-size">
                          <strong>{{Session('update_user')}}</strong>
                        </div>
                    @endif

                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Edit User</h3>
                        </div>
                        <div class="block-content block-content-full">
                           
                            {!! Form::model($user, ['method'=>'PATCH','action'=>['Admin\AdminManageUserController@update',$user->id],'files'=>true]) !!}


                                @csrf
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-profile-title"><h2>Basic Information</h2></div>
                                    <div class="row careerfy-employer-profile-form">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label>First Name *</label>
                                              <input required value="{{ $user->name }}" type="text" name="name" class="form-control"> 
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Last Nmae *</label>
                                              <input required value="{{ $user->lname }}" type="text" name="lname" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Email*</label>
                                              <input required value="{{ $user->email }}" type="text" name="email" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Phone *</label>
                                              <input required value="{{ $user->number }}" type="text" name="number" class="form-control">
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-hero-sm btn-square btn-outline-warning mr-1 mb-3">
                                    <i class="fa fa-fw fa-pencil-alt"></i> Update
                                </button>
                                @if($user->role_id == 1)
                                  <a href="#">
                                    <button type="submit" class="btn btn-hero-sm btn-square btn-outline-success mr-1 mb-3">
                                        <i class="fa fa-fw fa-eye"></i> View resume
                                    </button>
                                  </a>
                                @else
                                  <a href="#">
                                    <button type="submit" class="btn btn-hero-sm btn-square btn-outline-success mr-1 mb-3">
                                        <i class="fa fa-fw fa-eye"></i> View company details
                                    </button>
                                  </a>
                                @endif
                            {!! Form::close() !!}

                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->




                  @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif

                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Password Change</h3>
                        </div>
                        <div class="block-content block-content-full">
                           
                            <form class="careerfy-employer-dasboard" method="post" action="{{ route('userAccess',$user->id) }}">
                            {{ csrf_field() }}

                              <div class="careerfy-employer-box-section">
                                  <div class="careerfy-profile-title">
                                      <h2>Change Password</h2>
                                  </div>

                                  <div class="row careerfy-employer-profile-form">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Old Password *</label>
                                            <input class="form-control" id="current-password" type="password" name="current-password" required>

                                                  @if ($errors->has('current-password'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('current-password') }}</strong>
                                                      </span>
                                                  @endif
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New Password *</label>
                                            <input class="form-control" id="new-password" type="password" name="new-password" required>

                                            @if ($errors->has('new-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm New Password  *</label>
                                            <input class="form-control" id="new-password-confirm" type="password" name="new-password_confirmation" required>
                                        </div>
                                      </div>
                                  </div>

                              </div>
                              <button type="submit" class="btn btn-hero-sm btn-square btn-outline-warning mr-1 mb-3">
                                    <i class="fa fa-fw fa-pencil-alt"></i> Update Password
                                </button>
                              
                          </form>

                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->
                </div>
                <!-- END Page Content -->



@endsection
