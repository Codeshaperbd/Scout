@extends('layouts.app')




@section('content')

<!-- Banner -->
<div class="careerfy-banner careerfy-typo-wrap">
    <!-- <span class="careerfy-banner-transparent"></span> -->
    <div class="careerfy-banner-caption">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">

                <h1>Launch your Real Estate career with Realty Scout</h1>
                <p>Find top Brokers hiring now & apply Instantly.</p>

                <!-- HTML Markup -->
                @include('includes.search')
                <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->

                <div class="careerfy-banner-btn">
                    <a href="{{ route('register-agent') }}" class="careerfy-bgcolorhover"><i class="careerfy-icon careerfy-up-arrow"></i> Upload Your Resume</a>
                    <a href="{{ route('register-broker') }}" class="careerfy-bgcolorhover"><i class="careerfy-icon careerfy-portfolio"></i> Hiring? Post a job</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Banner -->

<!-- Main Content -->
<div class="careerfy-main-content">
    
    <!-- Main Section -->
    <div class="careerfy-main-section careerfy-counter-full">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <!-- Counter -->
                    <div class="careerfy-counter">
                        <ul class="row">
                            <li class="col-md-4">
                                <span class="word-counter">{{ $totalresume ? count($totalresume) : '0' }}</span>
                                <small>Resume(s)</small>
                            </li>
                            <li class="col-md-4">
                                <span class="word-counter">{{ $totaljob ? count($totaljob) : '0' }}</span>
                                <small>Job Posted</small>
                            </li>
                            <li class="col-md-4">
                                <span class="word-counter">{{ $totaluser ? count($totaluser) : '0' }}</span>
                                <small>User's</small>
                            </li>
                        </ul>
                    </div>
                    <!-- Counter -->
                </div>

            </div>
        </div>
    </div>
    <!-- Main Section -->

    <!-- Main Section -->
    <div class="careerfy-main-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12 careerfy-typo-wrap">
                    <!-- Fancy Title -->
                    <section class="careerfy-fancy-title">
                        <h2>Popular Cities</h2>
                        <p>A better career is out there. We'll help you find it to use.</p>
                    </section>
                    <!-- Categories -->
                    <div class="categories-list">
                        <ul class="careerfy-row">
                            @foreach($states as $state)
                                <li class="careerfy-column-3">
                                    <i class="careerfy-icon careerfy-location"></i>
                                    <a href="{{ route('job_state',$state->name) }}">{{$state->name}}</a>
                                    {{-- <span>({{$state->JobPost->count()}} Open Vacancies)</span> --}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="careerfy-plain-btn"> <a href="{{ route('all_jobs') }}">Browse All Cities</a> </div>
                    <!-- Categories -->
                </div>

            </div>
        </div>
    </div>
    <!-- Main Section -->

    <!-- Main Section -->
    <div class="careerfy-main-section careerfy-parallex-full">
        <div class="container">
            <div class="row">

                <aside class="col-md-6 careerfy-typo-wrap">
                    <div class="careerfy-parallex-text">
                        <h2>Real Estate Broker? <br>Realty Scout helps brokers recruit hungry Agents looking to grow.</h2>
                        <p>Advertise your brokerage and hire the agents you want..</p>
                        <ul>
                            <li>Post your job to thousands of qualified applicants</li>
                            <li>Create your broker profile to share with potential applicants what makes your company unique</li>
                            <li>Join a career network made specifically for the real estate industry</li>
                        </ul>
                        <a href="{{route('register-broker')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Recruit Agents Now</span></a>
                    </div>
                </aside>
                <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right"><img src="{{url('/extra-images/parallex-thumb-1.png')}}" alt=""></div> </aside>

            </div>
        </div>
    </div>
    <!-- Main Section -->


    <!-- Main Section -->
    <div class="careerfy-main-section">
        <div class="container">
            <div class="row">

                <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right"><img src="{{url('/extra-images/1.png')}}" alt=""></div> </aside>
                <aside class="col-md-6 careerfy-typo-wrap">
                    <div class="careerfy-parallex-text">


                        <h2>Real Estate Agent? <br>Realty Scout helps agents find top Brokers in your area.</h2>
                        <p>Search all the open real estate positions on the web. Feel comfortable knowing that when you browse on Realty Scout you will only find real estate related opportunities. The right broker is out there, finding it has never been easier.</p>

                        <a href="{{route('register-agent')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Create My Profile Now</span></a>
                    </div>
                </aside>

            </div>
        </div>
    </div>
    <!-- Main Section -->

    <!-- Main Section -->
    @if(count($features_jobs) > 0)
    <div class="careerfy-main-section careerfy-parallex-full">
        <div class="container">
            <div class="row">

                <div class="col-md-12 careerfy-typo-wrap">
                    <!-- Fancy Title -->
                    <section class="careerfy-fancy-title">
                        <h2>Featured Jobs Listings</h2>
                        <p>Industry news and agent education.</p>
                    </section>
                    <!-- Featured Jobs Listings -->
                    <div class="careerfy-job-listing careerfy-featured-listing">
                        <ul class="careerfy-row">
                            @foreach($features_jobs as $features_job)
                                @foreach($paymentDetails as $paymentDetail)
                                @if($features_job->id == $paymentDetail->job_id)
                                <li class="careerfy-column-6">
                                    <div class="careerfy-table-layer">
                                        <div class="careerfy-table-row">
                                            <figure>
                                                <a href="{{ route('job_details',$features_job->slug) }}">
                                                    @if (!empty($features_job->BrokerInfo->profile_img))
                                                        <img src="{{url('/')}}/profile_images/{{$features_job->BrokerInfo->profile_img}}" alt="" > 
                                                    @else 
                                                      <img src="http://placehold.it/65x65" alt="Company Logo">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="careerfy-featured-listing-text">
                                                <h2><a href="{{ route('job_details',$features_job->slug) }}">{{$features_job->title}}</a></h2>
                                                <time datetime="2008-02-14 20:00">{{ Carbon\Carbon::parse($features_job->created_at)->format('jS M Y') }}</time>
                                                <div class="careerfy-featured-listing-options">
                                                    <ul>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$features_job->location}}</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Real Estate</a></li>
                                                    </ul>
                                                    <a href="#" class="careerfy-option-btn">@if($features_job->work_hour == 1)
                                                    Independent
                                                    @elseif($features_job->work_hour == 2)
                                                        Part-Time
                                                    @else 
                                                        Full-Time
                                                    @endif</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                    <!-- Featured Jobs Listings -->
                    <div class="careerfy-plain-btn"> <a href="{{route('all_jobs')}}">View All Jobs</a> </div>
                </div>

            </div>
        </div>
    </div>
    @endif
    <!-- Main Section -->


    <!-- Main Section -->
    @if(!empty($allBlog))
    <div class="careerfy-main-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <!-- Fancy Title -->
                    <section class="careerfy-fancy-title">
                        <h2>From Our Blogs</h2>
                        <p>A better career is out there. We'll help you find it to use.</p>
                    </section>
                    <!-- Blog -->
                    <div class="careerfy-blog careerfy-blog-grid">
                        
                        <ul class="row">
                            @foreach($allBlog as $blog)
                            <li class="col-md-4">
                                <figure><a href="#"><img src="assets/extra-images/blog-grid-1.jpg" alt=""></a></figure>
                                <div class="careerfy-blog-grid-text">
                                    <div class="careerfy-blog-tag"> <a href="#">Culture</a> </div>
                                    <h2><a href="{{route('blogSingle',$blog->slug)}}">{{ $blog->title }}</a></h2>
                                    <ul class="careerfy-blog-grid-option">
                                        <li>BY <a class="careerfy-color">{{ $blog->Admin->name }}</a></li>
                                        <li><time datetime="2008-02-14 20:00">{{ Carbon\Carbon::parse($blog->created_at)->format('jS M Y') }}</time></li>
                                    </ul>
                                    <p>{{ str_limit(strip_tags($blog->body),100) }}</p>
                                    <a href="{{route('blogSingle',$blog->slug)}}" class="careerfy-read-more careerfy-bgcolor">Read Articles</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif
    <!-- Main Section -->
</div>
<!-- Main Content -->

@endsection

