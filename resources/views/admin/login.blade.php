<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Reality scout | Admin panel') }}</title>


        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="admin-assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="admin-assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="admin-assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link href="{{ asset('admin-assets/css/dashmix.min.css') }}" rel="stylesheet">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="admin-assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>

        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="row no-gutters justify-content-center bg-body-dark">
                    <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
                        <!-- Sign In Block -->
                        <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url('assets/media/photos/photo20@2x.jpg');">
                            <div class="row no-gutters">
                                <div class="col-md-6 order-md-1 bg-white">
                                    <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                        <!-- Header -->
                                        <div class="mb-2 text-center">
                                            <a class="font-w700 font-size-h1" href="index.html">
                                                <img src="admin-assets/media/photos/logo.png">
                                            </a>
                                            <p class="text-uppercase font-w700 font-size-sm text-muted">Sign In</p>
                                        </div>
                                        <!-- END Header -->

                                        <!-- Sign In Form -->
                                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form action="{{ route('admin.login') }}" method="POST" aria-label="{{ __('Admin Login') }}">
                                        @csrf
                                            <div class="form-group">
                                                <input id="email" type="email" class="form-control-alt form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Admin email">


                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password" class="form-control-alt form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-hero-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                </button>

                                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>

                                            </div>
                                        </form>
                                        <!-- END Sign In Form -->
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                                    <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                        <div class="media">
                                            <a class="img-link mr-3" href="javascript:void(0)">
                                                <img class="img-avatar img-avatar-thumb" src="admin-assets/media/avatars/avatar14.jpg" alt="">
                                            </a>
                                            <div class="media-body">
                                                <p class="text-white font-w600 mb-1">
                                                    Amazing framework with tons of options! It helped us build our project!
                                                </p>
                                                <a class="text-white-75 font-w600" href="javascript:void(0)">Justin Hunt, Web Developer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>




                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!--
            Dashmix JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="{{asset('admin-assets/js/dashmix.core.min.js')}}"></script>

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="{{asset('admin-assets/js/dashmix.app.min.js')}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset('admin-assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('admin-assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    </body>
</html>