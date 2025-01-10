@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary">{{__('messages.Notifications')}}</h2>
    <form action="{{ route('read.all', $notifications)}}" method="POST">
        @csrf
        <button class="btn btn-outline-primary btn-sm" type="submit">{{__('messages.Mark All as Read')}}</button>

        <div class="list-group">
            @foreach ($notifications as $notif)
                @if ($type == 'incoming message')
                    @include('layouts.message-card',[
                        'type' => $notif->type,
                        'message' => $notif->message,
                        'status' => $notif->status,
                        'sender' => $notif->sender,
                        'created_at' => $notif->created_at 
                    ])
                @else 
                    @include('layouts.request-card', [
                        'type' => $notif->type,
                        'message' => $notif->message,
                        'status' => $notif->status,
                        'sender' => $notif->sender,
                        'created_at' => $notif->created_at
                    ])
                @endif            
            @endforeach            
        </div>
        

    </form>
    
</div>    
@endsection
