<div class="inner-menu">
    <div class="container">
            <ul>   
                <li class="{{ Request::path() == 'how-works-agent' ? 'active' : '' }}"><a href="{{ route('how-works-agent') }}">How it Works?</a></li>
                <li class="{{ Request::path() == 'register-agent' ? 'active' : '' }}"><a href="{{ route('register-agent') }}">Create A Profile</a></li>
                <li class="{{ Request::path() == 'jobs' ? 'active' : '' }}"><a href="{{ route('all_jobs') }}">Search Jobs</a></li>
                <li class="{{ Request::path() == 'agent-faq' ? 'active' : '' }}"><a href="{{route('agent-faq')}}">Agent FAQ</a></li>
            </ul>
    </div>
</div>