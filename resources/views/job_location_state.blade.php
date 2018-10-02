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
                       <h1>All Cities</h1>
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
                
                <div class="col-md-12 careerfy-typo-wrap">
                    
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
                    <div class="careerfy-plain-btn"> {{ $states->links()}} </div>
                    <!-- Categories -->
                </div>

            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->

@endsection
