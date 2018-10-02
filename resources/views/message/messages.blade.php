
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