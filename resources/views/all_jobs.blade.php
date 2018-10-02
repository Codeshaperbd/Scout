@extends('layouts.app')

@section('styles')
    
    <style type="text/css">
        
        div#search-single span {
            width: 100%;
        }

        #search-single input#aa-search-input {
            background: transparent;
            border: 1px solid #ddd;
            padding: 5px;
            height: 36px;
        }

        .aa-dropdown-menu {
            background: #e4e4e4;
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
                       <h1>Jobs</h1>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
    <!-- /. header banner --> 


    <!-- /. header sub menu  --> 
    @include('includes.inner_menu')

    <!-- Main Content -->
    <div class="careerfy-main-content">
        
        <!-- Main Section -->
        <div class="container">
            <div class="row">
                
                <aside class="careerfy-column-3 careerfy-typo-wrap">
                    <form class="careerfy-search-filter">
                        <div class="careerfy-search-filter-wrap careerfy-without-toggle">
                            <h2><a href="#">Locations</a></h2>
                            <div class="careerfy-search-box">
                                <div id="search-single">

                                    <input type="search" id="aa-search-input" class="" placeholder="Location For Job Search..." name="search" autocomplete="off" />
                                    <i class="careerfy-icon careerfy-search"></i>                      
                                </div>


                                {{-- <input value="Search" onblur="if(this.value == '') { this.value ='Search'; }" onfocus="if(this.value =='Search') { this.value = ''; }" type="text">
                                <input type="submit" value="">
                                <i class="careerfy-icon careerfy-search"></i> --}}
                            </div>
                            <ul class="careerfy-checkbox">
                                <li>
                                    <input type="checkbox" id="r1" name="rr" />
                                    <label for="r1"><span></span>San Francisco</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="r2" name="rr" />
                                    <label for="r2"><span></span>Portland</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="r3" name="rr" />
                                    <label for="r3"><span></span>London</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="r4" name="rr" />
                                    <label for="r4"><span></span>Bangalore</label>
                                </li>
                            </ul>
                            <a href="#" class="careerfy-seemore">+see more</a>
                        </div>
                        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                            <h2><a href="#" class="careerfy-click-btn">Date Posted</a></h2>
                            <div class="careerfy-checkbox-toggle">
                                <ul class="careerfy-checkbox">
                                    <li>
                                        <input type="checkbox" id="r5" name="rr" />
                                        <label for="r5"><span></span>Last Hour</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r6" name="rr" />
                                        <label for="r6"><span></span>Last 24 hours</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r7" name="rr" />
                                        <label for="r7"><span></span>Last 7 days</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r8" name="rr" />
                                        <label for="r8"><span></span>Last 14 days</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r9" name="rr" />
                                        <label for="r9"><span></span>Last 30 days</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r10" name="rr" />
                                        <label for="r10"><span></span>All</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                            <h2><a href="#" class="careerfy-click-btn">Vacancy Type</a></h2>
                            <div class="careerfy-checkbox-toggle">
                                <ul class="careerfy-checkbox">
                                    <li>
                                        <input type="checkbox" id="r11" name="rr" />
                                        <label for="r11"><span></span>Freelance</label>
                                        <small>13</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r12" name="rr" />
                                        <label for="r12"><span></span>Full Time</label>
                                        <small>4</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r13" name="rr" />
                                        <label for="r13"><span></span>Internship</label>
                                        <small>12</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r14" name="rr" />
                                        <label for="r14"><span></span>Part Time</label>
                                        <small>22</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r15" name="rr" />
                                        <label for="r15"><span></span>Temporary</label>
                                        <small>5</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r16" name="rr" />
                                        <label for="r16"><span></span>Volunteer</label>
                                        <small>20</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                            <h2><a href="#" class="careerfy-click-btn">Categories</a></h2>
                            <div class="careerfy-checkbox-toggle">
                                <ul class="careerfy-checkbox">
                                    <li>
                                        <input type="checkbox" id="r17" name="rr" />
                                        <label for="r17"><span></span>Accountancy</label>
                                        <small>10</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r18" name="rr" />
                                        <label for="r18"><span></span>Banking</label>
                                        <small>2</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r19" name="rr" />
                                        <label for="r19"><span></span>Charity & Voluntary</label>
                                        <small>6</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r20" name="rr" />
                                        <label for="r20"><span></span>Digital & Creative</label>
                                        <small>4</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r21" name="rr" />
                                        <label for="r21"><span></span>Estate Agency</label>
                                        <small>19</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r22" name="rr" />
                                        <label for="r22"><span></span>Graduate</label>
                                        <small>5</small>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="r23" name="rr" />
                                        <label for="r23"><span></span>IT Contractor</label>
                                        <small>10</small>
                                    </li>
                                </ul>
                                <a href="#" class="careerfy-seemore">+see more</a>
                            </div>
                        </div>
                    </form>
                </aside>
                <div class="careerfy-column-9 careerfy-typo-wrap">
                    @if(count($jobs) > 0)
                    <!-- FilterAble -->
                    <div class="careerfy-filterable">
                        <h2>Showing 0-12 of {{count($jobs)}} results</h2>
                    </div>
                    <!-- FilterAble -->
                    <div class="careerfy-job careerfy-joblisting-classic">
                        <ul class="careerfy-row">
                            @foreach($jobs as $job)
                                <li class="careerfy-column-12">
                                    <div class="careerfy-joblisting-classic-wrap">
                                        <figure>
                                            <a href="{{ route('job_details',$job->slug) }}">
                                                @if (!empty($job->BrokerInfo->profile_img))
                                                    <img src="{{url('/')}}/profile_images/{{$job->BrokerInfo->profile_img}}" alt="" > 
                                                @else 
                                                  <img src="http://placehold.it/65x65" alt="Company Logo">
                                                @endif
                                            </a>
                                        </figure>
                                        <div class="careerfy-joblisting-text">
                                            <div class="careerfy-list-option">
                                                <h2><a href="{{ route('job_details',$job->slug) }}">{{$job->title}}</a> <span>Featured</span></h2>
                                                <ul>
                                                    <li><a>@ {{ $job->BrokerInfo->name }}</a></li>
                                                    <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$job->location}}</li>
                                                    <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> Real Estate</li>
                                                </ul>
                                            </div>
                                            <div class="careerfy-job-userlist">
                                                <a href="#" class="careerfy-option-btn">
                                                    @if($job->work_hour == 1)
                                                    Independent
                                                    @elseif($job->work_hour == 2)
                                                        Part-Time
                                                    @else 
                                                        Full-Time
                                                    @endif</a>
                                                </a>
                                                <!-- <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a> -->
                                            </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Pagination -->
                    <!-- <div class="careerfy-pagination-blog">
                        <ul class="page-numbers">
                            <li><a class="prev page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                            <li><span class="page-numbers current">01</span></li>
                            <li><a class="page-numbers" href="#">02</a></li>
                            <li><a class="page-numbers" href="#">03</a></li>
                            <li><a class="page-numbers" href="#">04</a></li>
                            <li><a class="next page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                        </ul>
                    </div> -->
                    {{  $jobs->links() }}
                    @else 
                    <div class="careerfy-filterable">
                        <h2>No job are avaliable.</h2>
                    </div>
                    @endif
                </div>

            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->

@endsection
