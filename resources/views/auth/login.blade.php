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
                           <h1>Login</h1>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="careerfy-breadcrumb">
                  <ul>
                     <li><a href="">Home</a></li>
                     <li class="active">Login</li>
                  </ul>
               </div>
            </div>
        </div>
        <!-- /. header banner --> 

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <div class="auth-form">
                        <div class="careerfy-modal-title-box">
                            <h2>LOGIN TO YOUR ACCOUNT</h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                            <div class="careerfy-box-title">
                                <span>LOGIN TO YOUR ACCOUNT</span>
                            </div>
                            <div class="careerfy-user-form">
                                <ul>
                                    <li>
                                        <label>Email Address:</label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" value="Enter Your Email Address">

                                        <i class="careerfy-icon careerfy-mail"></i>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif

                                    </li>
                                    <li>
                                        <label>Password:</label>
                                        <input value="Enter Password" onblur="if(this.value == '') { this.value ='Enter Password'; }" onfocus="if(this.value =='Enter Password') { this.value = ''; }" id="password" type="password" name="password" required>
                                        <i class="careerfy-icon careerfy-multimedia"></i>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </li>
                                    <li>
                                        <input type="submit" value="Sign In">
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <div class="careerfy-user-form-info">
                                    <p>
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a> | 
                                        <a href="{{ route('register') }}">Sign Up</a>
                                    </p>
                                    <div class="careerfy-checkbox">
                                        <input type="checkbox" id="r10" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                        <label for="r10"><span></span> Remember Password</label>

                                    </div>
                                </div>
                            </div>
                            <div class="careerfy-box-title careerfy-box-title-sub">
                                <span>Or Sign In With</span>
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
