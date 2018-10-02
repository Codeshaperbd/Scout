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


      #app {
          width: 100;
          height: 500px;
          /* position: absolute; */
          /* left: 50%; */
          /* top: 50%; */
          /* margin-left: -250px; */
          /* margin-top: -250px; */
          box-shadow: 0px 0px 10px 0px #BDBDBD;
          display: grid;
          grid-template-columns: repeat(12, 1fr);
          grid-template-rows: 50px 380px 70px;
      }

      #app header {
        padding: 0px 10px;
        /* Take 12 grids */
        grid-column: span 12;
        /* Coloring */
        background-color: #00BCD4;
        color: #FFFFFF;
        /* Flexbox */
        display: flex;
        flex-direction: row;
        align-items: stretch;
      }
      #app header * {
        line-height: 50px;
      }
      #app #logo {
        flex-grow: 1;
        font-size: 14pt;
        font-weight: 700;
        padding: 0px 10px;
      }
      #app #buttons {
        flex-grow: 1;
        text-align: right;
      }
      #app #buttons > i {
        width: 50px;
        text-align: center;
        /* Because Font-Awesome has set line-height */
        line-height: inherit;
      }
      #app header .clickable:hover {
        background-color: #4DD0E1;
        cursor: pointer;
      }

      #app aside {
        grid-column: span 4;
        background-color: #FFFFFF;
        overflow: auto;
      }
      #app aside .conversation-item {
        padding: 10px;
        display: grid;
        grid-template-areas: 'icon title' 'icon msg';
        grid-template-columns: 50px auto;
        grid-gap: 10px;
      }
      #app aside .conversation-item.active,
      #app aside .conversation-item:hover {
        background-color: #E0E0E0;
        cursor: pointer;
      }
      #app aside .conversation-item .c-icon {
        grid-area: icon;
        width: 50px;
        height: 50px;
        background-color: #F5F5F5;
        border-radius: 25px;
      }
      #app aside .conversation-item .c-title {
        grid-area: title;
        font-weight: bold;
      }
      #app aside .conversation-item {
          padding: 10px;
          display: grid;
          grid-template-areas: 'icon title' 'icon msg';
          grid-template-columns: 50px auto;
          grid-gap: 10px;
          border-bottom: 1px solid #ddd;
      }


      #app main {
        grid-column: span 8;
        background-color: #F5F5F5;
        overflow: auto;
      }
      .bubble {
        width: 80%;
        margin: 10px;
        padding: 10px;
        background-color: #E0F7FA;
        border-radius: 5px;
        overflow: hidden;
      }
      .bubble:hover {
        background-color: #B2EBF2;
        cursor: pointer;
      }
      .bubble.right {
        float: right;
      }
      .bubble .b-time {
        text-align: right;
        font-style: italic;
        font-size: smaller;
      }

      #app footer {
        grid-column: span 12;
        /* Coloring */
        background-color: #EEEEEE;
        /**/
        padding: 10px;
      }
      #app footer #input-container {
        width: 100%;
        height: 50px;
        overflow: hidden;
        display: flex;
        flex-direction: row;
        align-items: stretch;
        border-radius: 10px 10px;
      }
      #app #input-container > * {
        height: 100%;
        border: none;
        margin: 0px;
      }
      #app #input-container > *:focus {
        outline: none;
      }
      #app #input-container > textarea {
        padding: 0px 10px;
        flex: 6;
      }
      #app #input-container > button {
          flex: 1;
          background-color: #13b5ea;
          color: #fff;
      }
      #app #input-container > button:hover {
        background-color: #BDBDBD;
        cursor: pointer;
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

                        <div id="app">
                          <header>
                            <div id="logo" class="clickable">
                              SQUARE MESSENGER
                            </div>
                            <!-- <div id="buttons">
                              <i class="fas fa-cog clickable"></i>
                              <i class="fas fa-ellipsis-v clickable"></i>
                            </div> -->
                          </header>
                          <aside>
                            @foreach($allMessage->unique('sender_id') as $message)
                              <a href="{{ route('inbox.show',$message->sender->id) }}">
                                <div class="conversation-item">


                                    <div class="c-icon">
                                      @if (!empty($message->sender->BrokerInfo->profile_img))
                                        <img src="{{url('/')}}/profile_images/{{$message->sender->BrokerInfo->profile_img}}" alt="" >
                                      @elseif (!empty($message->sender->resume->profile_img))
                                        <img src="{{url('/')}}/profile_images/{{$message->sender->resume->profile_img}}" alt="" >
                                      @else 
                                        <img src="http://placehold.it/65x65" alt="Company Logo">
                                      @endif
                                    </div>
                                    <div class="c-title">{{ $message->sender->name }}</div>
                                    <div class="c-msg">Hello World</div>
                                  
                                </div>
                              </a>
                            @endforeach
                          </aside>
                          <main>
                            @foreach($messages as $message)
                              @if($message->sender_id != Auth::user()->id)
                                <div class="bubble">
                                  <div class="b-msg">
                                    {{$message->message}}
                                  </div>
                                  <div class="b-time">
                                    {{$message->created_at->diffforhumans() }}
                                  </div>
                                </div>
                              @endif
                              @if($message->sender_id == Auth::user()->id)
                                <div class="bubble right">
                                  <div class="b-msg">
                                    {{$message->message}}
                                  </div>
                                  <div class="b-time">
                                    {{$message->created_at->diffforhumans() }}
                                  </div>
                                </div>
                              @endif
                            @endforeach
                          </main>
                          <footer>
                            {!! Form::open(['method'=>'POST','action'=>'MessageController@store','files'=>true]) !!}
                              @csrf
                              <input type="hidden" name="receiver_id" value="{{$id}}">
                              <div id="input-container">
                                  <textarea placeholder="Your message here" name="message"></textarea>
                                  <button type="submit">SEND</button>
                              </div>
                            {!! Form::close() !!}
                          </footer>
                        </div>

          							 <!-- <i class="careerfy-icon careerfy-conversation"></i>
                         <h2>Select a Conversation</h2>
                         <p>Try selecting a conversation or searching for someone specific.</p> -->
                      </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
@endsection

