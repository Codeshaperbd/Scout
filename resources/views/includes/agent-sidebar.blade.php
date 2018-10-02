
    <div class="careerfy-typo-wrap">
        <div class="careerfy-employer-dashboard-nav">
            <figure>
                @if(!empty(Auth::user()->resume->profile_img))
                <a href="#" class="employer-dashboard-thumb"><img src="{{url('/')}}/profile_images/{{Auth::user()->resume->profile_img}}" alt="" style="width: 100%;height: 100%;"> </a>
                @elseif (!empty(Auth::user()->BrokerInfo->profile_img))
                <a href="#" class="employer-dashboard-thumb"><img src="{{url('/')}}/profile_images/{{Auth::user()->BrokerInfo->profile_img}}" alt="" style="width: 100%;height: 100%;"> </a>
                @else 
                <a href="#" class="employer-dashboard-thumb"><img src="http://placehold.it/400x400" alt="" style="width: 100%;height: 100%;"> </a>
                @endif
                <figcaption>
                    <div class="careerfy-fileUpload">
                        <span><i class="careerfy-icon careerfy-add"></i> Upload Photo</span>
                        <input type="file" class="careerfy-upload" />
                    </div>
                    <h2>{{ Auth::user()->name }}</h2>
                    <!-- <span class="careerfy-dashboard-subtitle">Full stack developer</span> -->
                </figcaption>
            </figure>
            <ul>
                @if(Auth::user()->role_id == 1)
                    <li class="{{ Request::path() == 'console' ? 'active' : '' }}">
                        <a href="{{ route('console') }}"><i class="careerfy-icon careerfy-user"></i> My Profile</a>
                    </li>
                    @if(!empty(Auth::user()->resume->profile_img))
                    <li class="{{ Request::path() == 'myresume' ? 'active' : '' }}">
                        <a href="{{ route('myresume.index') }}""><i class="careerfy-icon careerfy-resume"></i> My Resume</a>
                    </li>
                    @else
                    <li class="{{ Request::path() == 'create-profile' ? 'active' : '' }}">
                        <a href="{{ route('profile_create') }}""><i class="careerfy-icon careerfy-resume"></i> Create My Resume</a>
                    </li>
                    @endif
                    <li class="{{ Request::path() == 'job-applied' ? 'active' : '' }}">
                        <a href="{{ route('agent.applied') }}"><i class="careerfy-icon careerfy-user"></i> Job Applied</a>
                    </li>
                @endif
                @if(Auth::user()->role_id == 2)
                    <li class="{{ Request::path() == 'console' ? 'active' : '' }}">
                        <a href="{{ route('console') }}"><i class="careerfy-icon careerfy-user"></i> Company Profile</a>
                    </li>
                    @if(!empty(Auth::user()->BrokerInfo))
                    <li class="{{ Request::path() == 'job-post/create' ? 'active' : '' }}">
                        <a href="{{route('jobpost.create')}}"><i class="careerfy-icon careerfy-plus"></i> Post a New Job</a>
                    </li>
                    @else
                    <li class="{{ Request::path() == 'profile_create' ? 'active' : '' }}">
                        <a href="{{ route('profile_create') }}"><i class="careerfy-icon careerfy-plus"></i> Complete Profile</a>
                    </li>
                    @endif
                    <li class="{{ Request::path() == 'job-post' ? 'active' : '' }}"><a href="{{route('jobpost.index')}}"><i class="careerfy-icon careerfy-briefcase-1"></i> Job Listing</a></li>
                    <li class="{{ Request::path() == 'allApplied' ? 'active' : '' }}"><a href="{{route('allApplied')}}"><i class="careerfy-icon careerfy-briefcase-1"></i> Application</a></li>
                @endif
      
                
                <li class="{{ Request::path() == 'inbox' ? 'active' : '' }}">
                    <a href="{{route('inbox.index')}}"><i class="careerfy-icon careerfy-alarm"></i> Inbox(0)</a>
                </li>
                <li class="{{ Request::path() == 'changePassword' ? 'active' : '' }}">
                    <a href="{{ route('changePassword') }}"><i class="careerfy-icon careerfy-multimedia"></i> Change Password</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" style="margin-bottom: 0px;">
                        <i class="careerfy-icon careerfy-logout"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
