@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-primary display-4 mb-4">{{__('messages.Friendlist')}}</h2>
    <div class="row">
        @foreach ($friends as $friend)
            @include('layouts.friend-postcard', [
                'profile_picture' => $friend->profile_picture,
                'name' => $friend->name,
                'gender' => $friend->gender,
                'linkedin_username' => $friend->linkedin_username,
                'mobile' => $friend->mobile,
                'profile_picture' => $friend->profile_picture,
                'fields_name' => $friend->fieldsOfWork->pluck('field_name')->toArray(),
                'user_id' => $friend->id,
            ])                
        @endforeach

    </div>
</div>
@endsection