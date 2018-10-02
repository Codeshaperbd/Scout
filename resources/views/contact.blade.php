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
                           <h1>Contact us</h1>
                           <br><br>
                            @if(Session::has('contact_success'))
                                <strong style="font-size: 20px;color: #fff;">{{Session('contact_success')}}</strong>
                            @endif
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="careerfy-breadcrumb">
                  <ul>
                     <li><a href="">Home</a></li>
                     <li class="active">Contact us</li>
                  </ul>
               </div>
            </div>
        </div>
        <!-- /. header banner --> 

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section map-full">
                <div class="container-fluid">
                    <div class="row">

                        <div id="map"></div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-contact-form-full-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="careerfy-contact-info-sec">
                                <h2>Contact Information</h2>
                                <p>If you have any questions, inquiries or concerns, please reach out to us. We'll get back to you as soon as possible....</p>
                                <ul class="careerfy-contact-info-list">
                                    <li><i class="careerfy-icon careerfy-placeholder"></i> Realty Scout, Inc. 5 Penn Plaza, 23rd Fl. New York, NY 10001 United States</li>
                                    <li><i class="careerfy-icon careerfy-mail"></i> <a href="mailto:contact@realtyscout.com">Email: contact@realtyscout.com</a></li>
                                    <li><i class="careerfy-icon careerfy-technology"></i> Call: +1 866-323-6166</li>
                                    {{-- <li><i class="careerfy-icon careerfy-fax"></i> Fax: (800) 123 4567 89</li> --}}
                                </ul>
                                <div class="careerfy-contact-media">
                                    <a href="#" class="careerfy-icon careerfy-facebook-logo"></a>
                                    <a href="#" class="careerfy-icon careerfy-twitter-logo"></a>
                                    <a href="#" class="careerfy-icon careerfy-linkedin-button"></a>
                                    <a href="#" class="careerfy-icon careerfy-dribbble-logo"></a>
                                </div>
                            </div>
                            <div class="careerfy-contact-form">
                                <h2>We want to hear form you!</h2>
                                <form method="post" action="{{ route('contact.send') }}">
                                    @csrf
                                    <ul>
                                        <li>
                                            <input name="name" value="Enter Your Name" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text">
                                            <i class="careerfy-icon careerfy-user"></i>
                                        </li>
                                        <li>
                                            <input name="subject" value="Subject" onblur="if(this.value == '') { this.value ='Subject'; }" onfocus="if(this.value =='Subject') { this.value = ''; }" type="text">
                                            <i class="careerfy-icon careerfy-user"></i>
                                        </li>
                                        <li>
                                            <input name="sender_mail" value="Enter Your Email Address" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text">
                                            <i class="careerfy-icon careerfy-mail"></i>
                                        </li>
                                        <li>
                                            <input name="number" value="Enter Your Phone Number" onblur="if(this.value == '') { this.value ='Enter Your Phone Number'; }" onfocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }" type="text">
                                            <i class="careerfy-icon careerfy-technology"></i>
                                        </li>
                                        <li class="careerfy-contact-form-full">
                                            <textarea name="message"></textarea>
                                        </li>
                                        <li><input type="submit" value="Submit"></li>
                                    </ul>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

            <!-- Main Section -->
            <div class="careerfy-main-section contact-service-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="contact-service">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <h2>Want to join us?</h2>
                                        <i class="careerfy-icon careerfy-user-2"></i>
                                        <a href="{{  route('about') }}">Careers</a>
                                    </li>
                                    <li class="col-md-4">
                                        <h2>Read our latest news</h2>
                                        <i class="careerfy-icon careerfy-newspaper"></i>
                                        <a href="{{ route('industry_news') }}">Our Blog</a>
                                    </li>
                                    <li class="col-md-4">
                                        <h2>Have questions?</h2>
                                        <i class="careerfy-icon careerfy-discuss-issue"></i>
                                        <a href="{{ route('broker-faq') }}">Our FAQ</a>
                                    </li>
                                </ul>
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

    <script src="https://maps.googleapis.com/maps/api/js"></script>


@endsection