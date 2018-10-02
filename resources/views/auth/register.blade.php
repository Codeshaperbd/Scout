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
                       <h1>Register</h1>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
    <!-- /. header banner --> 


    <div class="careerfy-breadcrumb">
      <ul>
         <li><a href="">Home</a></li>
         <li class="active">Register</li>
      </ul>
   </div>

    <!-- Main Content -->
    <div class="careerfy-main-content">
        
        <!-- Main Section -->
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="auth-form">
                    <div class="careerfy-modal-title-box">
                        <h2>Signup to your account</h2>
                    </div>
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="careerfy-box-title">
                            <span>Choose your Account Type</span>
                        </div>
                        <div class="careerfy-user-form careerfy-user-form-coltwo">
                            <ul>
                                <li>
                                    <label>First Name:</label>
                                    <input value="{{ old('name') }}" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="name">
                                    <i class="careerfy-icon careerfy-user"></i>


                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                </li>
                                <li>
                                    <label>Last Name:</label>
                                    <input value="{{ old('lname') }}" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="lname">
                                    <i class="careerfy-icon careerfy-user"></i>

                                    @if ($errors->has('lname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lname') }}</strong>
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    <label>Email Address:</label>
                                    <input value="{{ old('email') }}" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" name="email">
                                    <i class="careerfy-icon careerfy-mail"></i>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    <label>Phone Number:</label>
                                    <input value="{{ old('number') }}" onblur="if(this.value == '') { this.value ='Enter Your Phone Number'; }" onfocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }" type="text" name="number">
                                    <i class="careerfy-icon careerfy-mail"></i>

                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    <label>Password:</label>
                                    <input id="password" type="password" name="password" required>
                                    <i class="careerfy-icon careerfy-lock"></i>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    <label>Confirm Password:</label>
                                    <input id="password-confirm" type="password" name="password_confirmation" required>
                                    <i class="careerfy-icon careerfy-lock"></i>

                                </li>
                                <li class="careerfy-user-form-coltwo-full">
                                    <label>Categories:</label>
                                    <div class="careerfy-profile-select">
                                        <select name="role_id" required>
                                            <option disabled="disabled" selected="selected">Select Type</option>
                                            <option value="1">Searching</option>
                                            <option value="2">Hiring</option>
                                        </select>
                                    </div>

                                    @if ($errors->has('role_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                    @endif
                                </li>
                                <li class="careerfy-user-form-coltwo-full">
                                    <input type="submit" value="Sign Up">
                                </li>
                            </ul>
                        </div>
                        <div class="careerfy-box-title careerfy-box-title-sub">
                            <span>Or Sign Up With</span>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="careerfy-login-media">
                            <li><a href="#"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                            <li><a href="#" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                            <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                            <li><a href="#" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                        </ul>
                    </form>
                </div>  
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->

@endsection
