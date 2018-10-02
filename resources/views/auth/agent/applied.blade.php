@extends('layouts.app')


@section('styles')
  <style type="text/css">
    .active-btn {
        border: 1px solid #13b5ea;
        padding: 5px 10px;
        text-align: center;
        background: #13b5ea;
        color: #fff;
        background: #dd;
    }
    .active-btn.disable {
        border: 1px solid red;
        background: red;
        color: #fff;
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
                       <h1>View Posted Job</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">View Posted Job</li>
              </ul>
           </div>
        </div>
    </div>

    <!-- /. header banner --> 
    
    <!-- Main Content -->
    <div class="careerfy-main-content">
        
        <!-- Main Section -->
        <div class="careerfy-main-section careerfy-dashboard-fulltwo">
            <div class="container">
                <div class="row">
                    <!-- agent aside -->
                    <aside class="careerfy-column-3">
                    @include('includes.agent-sidebar')
                    </aside>
                    <!-- agent aside end -->
                    <div class="careerfy-column-9 careerfy-typo-wrap">

                        <div class="careerfy-employer-box-section">
                            <!-- Profile Title -->
                            @if(!empty($jobApplies))
                            <div class="careerfy-profile-title">
                                  <h2>You have applied {{count($jobApplies)}} job's.</h2>
                                  <form class="careerfy-employer-search">
                                      <input value="Search orders" onblur="if(this.value == '') { this.value ='Search orders'; }" onfocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                      <input type="submit" value="">
                                      <i class="careerfy-icon careerfy-search"></i>
                                  </form>
                            </div>
                            <!-- Manage Jobs -->
                            <div class="careerfy-managejobs-list-wrap">
                                <div class="careerfy-managejobs-list">
                                    <!-- Manage Jobs Header -->
                                    <div class="careerfy-table-layer careerfy-managejobs-thead">
                                        <div class="careerfy-table-row">
                                            <div class="careerfy-table-cell">Job Title</div>
                                            <div class="careerfy-table-cell">Applied Date</div>
                                            <div class="careerfy-table-cell">Status</div>
                                            <div class="careerfy-table-cell"></div>
                                        </div>
                                    </div>
                                    <!-- Manage Jobs Body -->
                                    @if(count($jobApplies) > 0)
                                      @foreach($jobApplies as $jobApplied)
                                        <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                            <div class="careerfy-table-row">
                                                <div class="careerfy-table-cell">
                                                    <h6><a href="{{route('job_details',$jobApplied->JobPost->slug)}}">{{$jobApplied->JobPost->title}}</a></h6>
                                                    <ul>
                                                        <li><i class="careerfy-icon careerfy-calendar"></i> Created: <span>{{ Carbon\Carbon::parse($jobApplied->JobPost->created_at)->format('jS M Y') }}</span></li>

                                                        @php
                                                          $expire_Date = Carbon\Carbon::parse($jobApplied->JobPost->created_at)->addMonth();
                                                        @endphp

                                                        <li><i class="careerfy-icon careerfy-calendar"></i> Expiry: <span>{{Carbon\Carbon::parse($expire_Date)->format('jS M Y') }}</span></li>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$jobApplied->JobPost->location}}</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Real Estate</a></li>
                                                    </ul>
                                                </div>


                                                <div class="careerfy-table-cell">{{ Carbon\Carbon::parse($jobApplied->created_at)->format('jS M Y') }}</div>

                                                <div class="careerfy-table-cell">
                                                    @if($jobApplied->is_qualify == 'interview')
                                                      <span class="careerfy-managejobs-option">Call for interview</span>
                                                      @elseif($jobApplied->is_qualify == 'select')
                                                      <span class="careerfy-managejobs-option" style="color: #77eb9f">Selected</span>
                                                      @elseif($jobApplied->is_qualify == 'reject')
                                                      <span class="careerfy-managejobs-option">Rejected</span>
                                                      @else
                                                      <span class="careerfy-managejobs-option">Pending</span>
                                                    @endif
                                                  
                                                </div>
                                                <div class="careerfy-table-cell">
                                                    <div class="careerfy-managejobs-links">
                                                        <a href="{{route('job_details',$jobApplied->JobPost->slug)}}" class="careerfy-icon careerfy-view"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      @endforeach
                                    @endif
                                    <!-- Manage Jobs Body -->
                                </div>
                            </div>
                            <!-- Pagination -->
                            <div class="careerfy-pagination-blog">
                                  <ul class="page-numbers">
                                      <li><a class="prev page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                      <li><span class="page-numbers current">01</span></li>
                                      <li><a class="page-numbers" href="#">02</a></li>
                                      <li><a class="page-numbers" href="#">03</a></li>
                                      <li><a class="page-numbers" href="#">04</a></li>
                                      <li><a class="next page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                  </ul>
                            </div>
                            @else 
                            You have not applied any job yet.
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
@endsection

