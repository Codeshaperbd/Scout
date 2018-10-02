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

    .modal-dialog {
        margin: 0 auto;
    }

    button.close {
        background: transparent !important;
    }

    .modal-body {
        overflow: hidden;
    }
    .modal-body ul li {
        width: 100%;
        display: block;
        text-align: left;
        padding: 0;
        font-size: 24px;
        color: #000;
    }

    .modal-body ul li span {
        width: 30%;
        float: left;
        text-align: right;
        padding-right: 12px;
    }

    textarea.modal-textarea {
        width: 70%;
        padding: 11px;
        height: 100px;
        border: 3px solid #13b5ea;
        /* background: #13b5ea; */
        border-radius: 10px;
    }

    .show-error.text-center {
        font-size: 32px;
        color: red;
        padding-bottom: 30px;
    }


    div#search-single span {
        width: 100%;
    }

    input#aa-search-input2 {
        background: transparent;
        border: 1px solid #ddd;
        padding: 10px;
        height: 40px;
    }

    .aa-dropdown-menu {
        background: #f1f1f1;
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
                       <h1>Industry news</h1>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="careerfy-breadcrumb">
              <ul>
                 <li><a href="">Home</a></li>
                 <li class="active">Industry news</li>
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
                    
					<div class="careerfy-column-8 careerfy-typo-wrap">
                            <!-- JobGrid -->
                            <div class="careerfy-job careerfy-job-grid">
                                <ul class="careerfy-row">
                                	@if(!empty($blogs))
                                	@foreach($blogs as $blog)
	                                    <li class="careerfy-column-6">
	                                        <div class="careerfy-job-grid-wrap allblog">
	                                            <figure>
	                                            	@if($blog->photo)
	                                                <a href="#"><img src="{{ url('/') }}/blog-images/{{ $blog->photo }}" alt=""></a>
	                                                @else 
	                                                test
	                                                @endif
	                                            </figure>
	                                            <div class="careerfy-jobgrid-text blog">
	                                                <div class="careerfy-job-tag"><a>BlogBy: {{ $blog->Admin->name }}</a></div>
	                                                <h2><a href="{{route('blogSingle',$blog->slug)}}">{{ $blog->title }}</a></h2>
	                                                <p>{{ str_limit(strip_tags($blog->body),100) }}</p>
	                                                <ul class="careerfy-job-time">
	                                                    <li><a href="#">Date:</a></li>
	                                                    <li>{{ Carbon\Carbon::parse($blog->created_at)->format('jS M Y') }}</li>
	                                                </ul>
	                                                <a href="{{route('blogSingle',$blog->slug)}}" class="careerfy-static-btn careerfy-bgcolor full-btn"><span>Read More</span></a>
	                                            </div>
	                                        </div>
	                                    </li>
	                                @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- Pagination -->
                            <div class="careerfy-pagination-blog">
                            	{{ $blogs->links() }}
                                {{-- <ul class="page-numbers">
                                    <li><a class="prev page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                    <li><span class="page-numbers current">01</span></li>
                                    <li><a class="page-numbers" href="#">02</a></li>
                                    <li><a class="page-numbers" href="#">03</a></li>
                                    <li><a class="page-numbers" href="#">04</a></li>
                                    <li><a class="next page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>

                                </ul> --}}
                            </div>
                    </div>

                    <aside class="careerfy-column-4 careerfy-typo-wrap">
                            <form class="careerfy-search-filter">
                                <div class="careerfy-search-filter-wrap careerfy-without-toggle">
                                    <h2><a href="#">Search Post</a></h2>
                                    <div class="careerfy-search-box">
                                        <div id="search-single">
                                            <input type="search" id="aa-search-input2" class="" placeholder="Search Blogs..." name="search" autocomplete="off" />
                                            <i class="careerfy-icon careerfy-search"></i>
                                        </div>
                                    </div>
                                </div>
                           	</form>
                            <!-- Recent Blog -->
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                <h2><a href="#" class="careerfy-click-btn">Recent Blog</a></h2>
                                <div class="careerfy-checkbox-toggle">
                                    <ul class="careerfy-checkbox carrify-blog-cat">
	                                	@foreach($allBlog as $recentBlog)
	                                        <li>
	                                            <a href="{{route('blogSingle',$recentBlog->slug)}}"><i class="fa fa-check"></i>{{ $recentBlog->title }}</a>
	                                        </li>
	                                    @endforeach
                                    </ul>
                                    <a href="{{ route('blog.index') }}" class="careerfy-seemore">+see more</a>
                                </div>
                            </div>
                            <!-- End Recent Blog -->

                                <!-- Tag -->
                                {{-- <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                    <h2><a href="#" class="careerfy-click-btn">Tags</a></h2>
                                    <div class="careerfy-checkbox-toggle blog-tag">
                                        <a href="#">test one</a>
                                        <a href="#">test one</a>
                                        <a href="#">test one</a>
                                        <a href="#">test one</a>
                                        <a href="#">test one</a>
                                        <a href="#">test one</a>
                                    </div>
                                </div> --}}
                                <!-- End tag -->
                            
                    </aside>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
@endsection


@section('scripts')

    <script>

        var client = algoliasearch('1JVGQG2YJT', '8e2e436bb674b16cd2481d49e44fc1bb');
        var index = client.initIndex('blogs');
        //initialize autocomplete on search input (ID selector must match)
        autocomplete('#aa-search-input2',
        { hint: false }, {
            source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'title',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function(suggestion) {
                  return '<span>' +
                    suggestion._highlightResult.title.value + '</span><span>';
                },

                empty: function (result) {
                    return 'Sorry, we did not find any results for "' + result.query + '"';
                }
            }
        }).on('autocomplete:selected', function (event, suggestion, dataset) {
            window.location.href = window.location.origin + '/blog-single/' + suggestion.slug;
            enterPressed = true;
        }).on('keyup', function(event) {
            if (event.keyCode == 13 && !enterPressed) {
                window.location.href = window.location.origin + '/search-algolia?q=' + document.getElementById('aa-search-input2').value;
            }
        });
    </script>

@endsection