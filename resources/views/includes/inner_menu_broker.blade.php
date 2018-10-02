<div class="inner-menu">
    <div class="container">
            <ul>   
                <li class="{{ Request::path() == 'how-works-broker' ? 'active' : '' }}"><a href="{{ route('how-works-broker') }}">How it Works?</a></li>
                <li class="{{ Request::path() == 'register-broker' ? 'active' : '' }}"><a href="{{ route('register-broker') }}">Create A Profile</a></li>
                <li class="{{ Request::path() == 'full_service_recruiting' ? 'active' : '' }}"><a href="{{ route('services') }}">Full Service Recruting</a></li>
                <li class="{{ Request::path() == 'broker-faq' ? 'active' : '' }}"><a href="{{ route('broker-faq') }}">Broker FAQ</a></li>
            </ul>
    </div>
</div>