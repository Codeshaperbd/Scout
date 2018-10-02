@extends('layouts.app')

@section('content')


        <!-- header banner -->
        <div class="header-banner">
            <div class="careerfy-subheader careerfy-subheader-with-bg" style="background-image: url('https://careerfy.net/belovedjobs/wp-content/uploads/subheader-bgg.png');">
               <span class="careerfy-banner-transparent" style="background-color: rgba(30,49,66,0.81) !important;"></span>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="careerfy-page-title">
                           <h1>Reset Password</h1>
                           <br><br>
                            @if(Session::has('contact_success'))
                                <strong style="font-size: 20px;color: #fff;">{{Session('contact_success')}}</strong>
                            @endif
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="careerfy-breadcrumb">
                  <ul>
                     <li><a href="">Home</a></li>
                     <li class="active">Reset Password</li>
                  </ul>
               </div>
            </div>
        </div>
        <!-- /. header banner --> 
        
        <!-- Main Content -->
        <div class="careerfy-main-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Reset Password') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
