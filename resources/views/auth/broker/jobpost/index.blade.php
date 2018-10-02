@extends('layouts.app')


@section('styles')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
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
                  @if(Session::has('deleteJob'))
                    <div class="alert alert-danger alert-size">
                      <strong>{{Session('deleteJob')}}</strong>
                    </div>
                  @endif
                  @if(Session::has('job_created'))
                    <div class="alert alert-success alert-size">
                      <strong>{{Session('job_created')}}</strong>
                    </div>
                  @endif
                <div class="row">
                    <!-- agent aside -->
                    <aside class="careerfy-column-3">
                    @include('includes.agent-sidebar')
                    </aside>
                    <!-- agent aside end -->
                    <div class="careerfy-column-9 careerfy-typo-wrap">
                        <!-- FilterAble -->
                        
                        <!-- FilterAble -->
                          <!-- JobGrid -->
                          <div class="careerfy-job careerfy-joblisting-classic">
                            
                         
                              <div class="careerfy-employer-box-section">
                                  <!-- Profile Title -->
                                  <div class="careerfy-profile-title">
                                      <h2>{{count($jobs)}} JOB POSTINGS</h2>
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
                                                  <div class="careerfy-table-cell">Applications</div>
                                                  <div class="careerfy-table-cell">View</div>
                                                  <div class="careerfy-table-cell">Status</div>
                                                  <div class="careerfy-table-cell"></div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->

                                        @if(count($jobs) > 0)
                                          @foreach($jobs as $job)
                                          <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                              <div class="careerfy-table-row">
                                                  <div class="careerfy-table-cell">
                                                      <h6><a href="{{route('jobpost.show',$job->slug)}}">{{ $job->title }}</a></h6>
                                                      <ul>
                                                          <li><i class="careerfy-icon careerfy-calendar"></i> Created: <span>{{ $job->created_at->diffForHumans() }}</span></li>
                                                          <!-- <li><i class="careerfy-icon careerfy-calendar"></i> Expiry: <span>Dec 9, 2017</span></li> -->
                                                          <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{ $job->location }}</li>
                                                          @php $position = unserialize($job->JobCategory);
                                                          @endphp
                                                          <li>
                                                            <i class="careerfy-icon careerfy-filter-tool-black-shape"></i> 
                                                            <a href="">
                                                              @foreach($position as $pos) 
                                                               @if($pos == '1')
                                                                Realtor ,
                                                               @elseif($pos == '2')
                                                                Real Estate Agent ,
                                                               @else 
                                                                Real Estate Broker
                                                               @endif
                                                              @endforeach
                                                            </a>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  @php
                                                    $totalApplied = \App\JobApply::where('job_id',$job->id)->get();
                                                  @endphp
                                                  <div class="careerfy-table-cell"><a href="{{ route('job.application',$job->slug) }}" class="careerfy-managejobs-appli">{{count($totalApplied)}} Application(s)</a></div>
                                                  <div class="careerfy-table-cell">10</div>
                                                  <div class="careerfy-table-cell">
                                                    @if($job->is_active == 1)
                                                    <span class="careerfy-managejobs-option active">Active</span>
                                                    @else
                                                    <span class="careerfy-managejobs-option">Pending</span>
                                                    @endif
                                                  </div>
                                                  <div class="careerfy-table-cell">
                                                      <div class="careerfy-managejobs-links">
                                                          <a href="{{route('jobpost.show',$job->slug)}}" class="careerfy-icon careerfy-view"></a>
                                                          <a href="{{route('jobpost.edit',$job->slug)}}" class="careerfy-icon careerfy-edit"></a>

                                                          <!-- delete button -->
                                                          <form id="delete-form-{{ $job->id }}" method="post" action="{{ route('jobpost.destroy',$job->id) }}" style="display: none">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                          </form>
                                                          <a href="" onclick="
                                                            if(confirm('Are you sure, You Want to delete this?'))
                                                              {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $job->id }}').submit();
                                                              }
                                                              else{
                                                                event.preventDefault();
                                                              }" >
                                                              <button style="background: transparent;color: red;outline:none" class="careerfy-icon careerfy-rubbish"></button>
                                                          </a>
                                                          <!-- <a href="#" class="careerfy-icon careerfy-rubbish"></a> -->
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Manage Jobs Body -->
                                          @endforeach
                                        @endif
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
                              </div>

                          </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
@endsection

@section('scripts')

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
@endsection