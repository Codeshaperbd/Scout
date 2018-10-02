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

    <div class="careerfy-main-content">
        <div id="generic_price_table">   
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!--PRICE HEADING START-->
                            <div class="price-heading clearfix">
                                <h1>Subscription Plan For Broker.</h1>
                            </div>
                            <!--//PRICE HEADING END-->
                        </div>
                    </div>
                </div>
                <div class="container">
                    
                    <!--BLOCK ROW START-->
                    <div class="row">
                        <div class="col-md-4">
                        
                            <!--PRICE CONTENT START-->
                            <div class="generic_content clearfix">
                                
                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">
                                
                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">
                                    
                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Sprout</span>
                                        </div>
                                        <!--//HEAD END-->
                                        
                                    </div>
                                    <!--//HEAD CONTENT END-->
                                    
                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">    
                                        <span class="price">
                                            <span class="sign">$</span>
                                            <span class="currency">100</span>
                                            <span class="month">/per month</span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->
                                    
                                </div>                            
                                <!--//HEAD PRICE DETAIL END-->
                                
                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <ul>
                                        <li>Minimum of <span>50</span> qualified views per month</li>
                                        <li>Optimized keywords that relate to the real estate industry</li>
                                        <li>Company profile with logo & description</li>
                                        <li>Unlimited job post changes</li>
                                        <li>Automatically notify qualified candidates</li>
                                        <li>Targeted exposure to over 100 other niche job websites</li>
                                        <li>Acess to our content writers for $100</li>
                                        <li>Email and phone support</li>
                                    </ul>
                                </div>
                                <!--//FEATURE LIST END-->
                                

                                
                                <!--BUTTON START-->
                                <div class="generic_price_btn clearfix">
                                    {!! Form::open(['method'=>'POST','action'=>'PricingController@store']) !!}
                                      @csrf
                                      <input type="hidden" name="job_id" value="{{ $job_id }}">
                                      <input type="hidden" name="packeg_name" value="Sprout">
                                      <input type="hidden" name="pricing_plan" value="plan_DSqmjUBhh35GLA">
                                      <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_8WXTNL7KR1OFyQBAvxP43Zsp"
                                        data-amount="10000"
                                        data-name="Reality Scout"
                                        data-description="Sprout Charge"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-label="Subscribe Now"
                                        data-panel-label="Pay Monthly"
                                        data-email="{{ auth()->check()?auth()->user()->email: null}}"
                                        data-zip-code="true">
                                      </script>
                                    {!! Form::close(); !!}
                                </div>
                                <!--//BUTTON END-->
                                
                            </div>
                            <!--//PRICE CONTENT END-->
                                
                        </div>
                        
                        <div class="col-md-4">
                        
                            <!--PRICE CONTENT START-->
                            <div class="generic_content active clearfix">
                                
                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">
                                
                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">
                                    
                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Grow</span>
                                        </div>
                                        <!--//HEAD END-->
                                        
                                    </div>
                                    <!--//HEAD CONTENT END-->
                                    
                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">    
                                        <span class="price">
                                            <span class="sign">$</span>
                                            <span class="currency">200</span>
                                            <span class="cent">.00</span>
                                            <span class="month">/MON</span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->
                                    
                                </div>                            
                                <!--//HEAD PRICE DETAIL END-->
                                
                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <ul>
                                        <li>Minimum of <span>100</span> qualified views per month</li>
                                        <li>Optimized keywords that relate to the real estate industry</li>
                                        <li>Company profile with logo & description</li>
                                        <li>Unlimited job post changes</li>
                                        <li>Automatically notify qualified candidates</li>
                                        <li>Targeted exposure to over 100 other niche job websites</li>
                                        <li>Acess to our content writers for $75</li>
                                        <li>Email and phone support</li>
                                        <li>Featured job post on our website</li>
                                        <li>Even more views, even more applications</li>
                                    </ul>
                                </div>
                                <!--//FEATURE LIST END-->
                                
                                <!--BUTTON START-->
                                <div class="generic_price_btn clearfix">
                                    {!! Form::open(['method'=>'POST','action'=>'PricingController@store']) !!}
                                      @csrf
                                      <input type="hidden" name="job_id" value="{{ $job_id }}">
                                      <input type="hidden" name="packeg_name" value="Grow">
                                      <input type="hidden" name="pricing_plan" value="plan_DSpvJdx4SRplye">
                                      <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_8WXTNL7KR1OFyQBAvxP43Zsp"
                                        data-amount="20000"
                                        data-name="Reality Scout"
                                        data-description="Grow Charge"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-label="Subscribe Now"
                                        data-panel-label="Pay Monthly"
                                        data-email="{{ auth()->check()?auth()->user()->email: null}}"
                                        data-zip-code="true">
                                      </script>
                                    {!! Form::close(); !!}
                                </div>
                                <!--//BUTTON END-->
                                
                            </div>
                            <!--//PRICE CONTENT END-->
                                
                        </div>
                        <div class="col-md-4">
                        
                            <!--PRICE CONTENT START-->
                            <div class="generic_content clearfix">
                                
                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">
                                
                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">
                                    
                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Flourish</span>
                                        </div>
                                        <!--//HEAD END-->
                                        
                                    </div>
                                    <!--//HEAD CONTENT END-->
                                    
                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">    
                                        <span class="price">
                                            <span class="sign">$</span>
                                            <span class="currency">300</span>
                                            <span class="month">/per month</span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->
                                    
                                </div>                            
                                <!--//HEAD PRICE DETAIL END-->
                                
                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <ul>
                                        <li>Minimum of <span>150</span> qualified views per month</li>
                                        <li>Optimized keywords that relate to the real estate industry</li>
                                        <li>Company profile with logo & description</li>
                                        <li>Unlimited job post changes</li>
                                        <li>Automatically notify qualified candidates</li>
                                        <li>Targeted exposure to over 100 other niche job websites</li>
                                        <li>Acess to our content writers for FREE</li>
                                        <li>Email and phone support</li>
                                        <li>Featured job post on our website</li>
                                        <li>Even more views, even more applications</li>
                                        <li>Dedicated account manager</li>
                                    </ul>
                                </div>
                                <!--//FEATURE LIST END-->
                                
                                <!--BUTTON START-->
                                <div class="generic_price_btn clearfix">
                                    {!! Form::open(['method'=>'POST','action'=>'PricingController@store']) !!}
                                      @csrf
                                      <input type="hidden" name="job_id" value="{{ $job_id }}">
                                      <input type="hidden" name="packeg_name" value="Flourish">
                                      <input type="hidden" name="pricing_plan" value="plan_DSql1ZwIIIdmVf">
                                      <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_8WXTNL7KR1OFyQBAvxP43Zsp"
                                        data-amount="30000"
                                        data-name="Reality Scout"
                                        data-description="Flourish Charge"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-label="Subscribe Now"
                                        data-panel-label="Pay Monthly"
                                        data-email="{{ auth()->check()?auth()->user()->email: null}}"
                                        data-zip-code="true">
                                      </script>
                                    {!! Form::close(); !!}
                                </div>
                                <!--//BUTTON END-->
                                
                            </div>
                            <!--//PRICE CONTENT END-->
                                
                        </div>
                    </div>  
                    <!--//BLOCK ROW END-->
                    
                </div>
            </section>    
        </div>
    </div>


@endsection