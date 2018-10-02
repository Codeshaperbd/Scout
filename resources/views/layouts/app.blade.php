<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Reality Scout') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="{{asset('public-assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/slick-slider.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/plugin-css/fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/plugin-css/plugin.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/video.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/algolia.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public-assets/css/responsive.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Varela+Round&amp;subset=hebrew,latin-ext,vietnamese" rel="stylesheet">
    @yield('styles')
</head>
<body>

    <!-- blade query -->
    @auth
    @php

        $unreadMessages = \App\Message::where('receiver_id', Auth::user()->id)
                    ->where('read_at',null)
                    ->get();

    @endphp
    @endauth
    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->
        <header id="careerfy-header" class="careerfy-header-four navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <aside class="col-md-2 col-sm-2 col-xs-6"> <a href="{{ url('/') }}" class="careerfy-logo"><img src="{{url('/images/logo.png')}} "alt=""></a> </aside>
                    <aside class="col-md-7 col-sm-4 col-xs-6">
                        <nav class="careerfy-navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#careerfy-navbar-collapse-1" aria-expanded="false">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="careerfy-navbar-collapse-1">
                                <ul class="navbar-nav">
                                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                    <li>
                                        @if(Auth::user() == true)
                                        @if(Auth::user()->role_id == 2)
                                        <a href="{{ route('job.listing') }}">Brokers & Hiring Managers</a>
                                        @else 
                                        <a href="{{ route('how-works-broker') }}">Brokers & Hiring Managers</a>
                                        @endif
                                        @else 
                                            <a href="{{ route('how-works-broker') }}">Brokers & Hiring Managers</a>
                                        @endif
                                    </li>
                                    <li><a href="{{ route('how-works-agent') }}">Pre-Licensees & Agents</a></li>
                                    <li><a href="http://www.realtyscout.theceshop.com/" target="_blank">Get Licensed</a></li>
                                    <li><a href="{{route('industry_news')}}">Industry News</a></li>
                                    
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </div>
                      </nav>
                    </aside>
                    <aside class="col-md-3 col-sm-6 col-xs-12">
                        <div class="careerfy-right">
                            
                            <ul class="careerfy-user-section">
                            @guest
                                <li><a class="careerfy-color" href="{{ route('register') }}">Register</a></li>
                                <li><a class="careerfy-color" href="{{ route('login') }}">Sign in</a></li>

                            @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                    <a class="dropdown-item" href="{{ route('console') }}">
                                        <i class="fa fa-angle-right"></i> {{ __('Dashboard') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="margin-bottom: 0px;">
                                        <i class="fa fa-angle-right"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item dropdown comment">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-comments"></i>
                                    <span class="badge">{{count($unreadMessages)}}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right message-wrap" aria-labelledby="navbarDropdown">
                                    <div class="single-wrap">
                                        @if(!empty($unreadMessages))
                                        @foreach($unreadMessages->unique('receiver_id') as $unreadMessage)
                                        <div class="single-message">
                                            <a href="{{ route('inbox.show',$unreadMessage->sender->id) }}">
                                                @if (!empty($unreadMessage->sender->BrokerInfo->profile_img))
                                                    <img src="{{url('/')}}/profile_images/{{$unreadMessage->sender->BrokerInfo->profile_img}}" alt="" >
                                                @elseif (!empty($unreadMessage->sender->resume->profile_img))
                                                    <img src="{{url('/')}}/profile_images/{{$unreadMessage->sender->resume->profile_img}}" alt="" >
                                                @else 
                                                    <img src="http://placehold.it/65x65" alt="Company Logo">
                                                @endif
                                                <div class="single-message-left">
                                                    <h3>{{$unreadMessage->sender->name}}</h3>
                                                    <p>{{ str_limit($unreadMessage->message,10) }}</p>
                                                    <small>{{$unreadMessage->created_at->diffforhumans()}}</small>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                        @else
                                            No message Avaliable
                                        @endif
                                    </div>
                                    <a class="viewAllMessage" href="{{ route('inbox.index') }}">View All Message</a>

                                </div>
                            </li>

                            @endguest
                            </ul>

                            @if(Auth::user() == true)
                                @if(Auth::user()->role_id == 2)
                                <a href="{{ route('job.listing') }}" class="careerfy-simple-btn careerfy-bgcolor"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                                @else 
                                <a href="{{ route('job.listing') }}" class="careerfy-simple-btn careerfy-bgcolor"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                                @endif
                            @else 
                                <a href="{{ route('register-broker') }}" class="careerfy-simple-btn careerfy-bgcolor"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                            @endif
                        </div>
                    </aside>
                </div>
            </div>
        </header>
        <!-- Header -->

        @yield('content')
        
        <!-- Footer -->
        <footer id="careerfy-footer" class="careerfy-footer-one">
            <div class="container">
                <!-- Footer Widget -->
                <div class="careerfy-footer-widget">
                    <div class="row">
                        <aside class="widget col-md-4 widget_contact_info">
                            <div class="widget_contact_wrap">
                                <a class="careerfy-footer-logo" href="{{url('/')}}"><img src="{{url('images/logo.png')}}" alt=""></a>
                            </div>
                        </aside>
                        <aside class="widget col-md-3 widget_nav_manu">
                            <div class="footer-widget-title"><h2>Quick Links</h2></div>
                            <ul>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('all_jobs')}}">Searh Job</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </aside>
                        <aside class="widget col-md-3 widget_nav_manu">
                            <div class="footer-widget-title"><h2>Agents/Candidates</h2></div>
                            <ul>
                                <li><a href="{{route('register-agent')}}">Create a profile</a></li>
                                <li><a href="{{route('how-works-agent')}}">How it works</a></li>
                                <li><a href="{{route('agent-faq')}}">Agent FAQ</a></li>
                            </ul>
                        </aside>
                        <aside class="widget col-md-2 widget_nav_manu">
                            <div class="footer-widget-title"><h2>Brokers/Employers</h2></div>
                            <ul>
                                <li><a href="{{ route('jobpost.create') }}">Post a job</a></li>
                                <li><a href="{{route('how-works-broker')}}">How it works</a></li>
                                <li><a href="{{route('broker-faq')}}">Broker FAQ</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <!-- Footer Widget -->
                <!-- CopyRight -->
                <div class="careerfy-copyright">
                    <p>Copyrights © 2018 All Rights Reserved by <a href="http://www.codeshaper.net/" target="_blank" class="careerfy-color">Codeshaper</a></p>
                    <ul class="careerfy-social-network">
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-facebook"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-twitter"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-dribbble"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-linkedin"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-instagram"></a></li>
                    </ul>
                </div>
                <!-- CopyRight -->
            </div>
        </footer>
        <!-- Footer -->

    </div>
    <!-- Wrapper -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('public-assets/script/jquery.js')}}"></script>
    <script src="{{asset('public-assets/script/bootstrap.js')}}"></script>
    <script src="{{asset('public-assets/script/slick-slider.js')}}"></script>
    <script src="{{asset('public-assets/plugin-script/counter.js')}}"></script>
    <script src="{{asset('public-assets/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{asset('public-assets/plugin-script/isotope.min.js')}}"></script>
    <script src="{{asset('public-assets/plugin-script/video.js')}}"></script>
    <script src="{{asset('public-assets/plugin-script/progressbar.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA78tV7rTO62MUBscyt08AnZoRs_sQSxok&libraries=places"></script>
    <script src="{{asset('public-assets/plugin-script/functions.js')}}"></script>
    <script src="{{asset('public-assets/script/functions.js')}}"></script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <!-- Initialize autocomplete menu -->



    <script>

        var client = algoliasearch('1JVGQG2YJT', '8e2e436bb674b16cd2481d49e44fc1bb');
        var index = client.initIndex('states');
        //initialize autocomplete on search input (ID selector must match)
        autocomplete('#aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'name',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function(suggestion) {
                  return '<span>' +
                    suggestion._highlightResult.name.value + '</span><span>';
                }
            }
        }).on('autocomplete:selected', function (event, suggestion, dataset) {
            window.location.href = window.location.origin + '/job-by-state/' + suggestion.name;
            enterPressed = true;
        }).on('keyup', function(event) {
            if (event.keyCode == 13 && !enterPressed) {
                window.location.href = window.location.origin + '/search-algolia?q=' + document.getElementById('aa-search-input').value;
            }
        });
    </script>


    @yield('scripts')
</body>
</html>


