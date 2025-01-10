@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary">{{__('messages.Notification')}}</h2>
    <form action="{{ route('read.all', $notifications)}}" method="POST">
        @csrf
        <button class="btn btn-outline-primary btn-sm" type="submit">{{__('messages.Mark All as Read')}}</button>

        <div class="list-group">
            @foreach ($notifications as $notif)
                @if ($notif->type == 'incoming_message')
                    @include('layouts.message-card',[
                        'message' => $notif->message,
                        'status' => $notif->status,
                        'sent_at' => $notif->sent_at,
                        'sender' => $notif->sender
                    ])
                @else 
                    @include('layouts.request-card', [
                        'message' => $notif->message,
                        'status' => $notif->status,
                        'sent_at' => $notif->sent_at,
                        'sender' => $notif->sender, 
                    ])
                @endif            
            @endforeach            
        </div>
        

    </form>
    
</div>    
@endsection
