@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold text-primary display-4">{{__('messages.Find New Friends')}}</h2>
        <div class="row">
            @foreach ($users as $user)
                @include('layouts.user-postcard', [
                    'profile-picture' => $user->profile_picture,
                    'name' => $user->name,
                    'gender' => $user->gender,
                    'linkedin_username' => $user->linkedin_username,
                    'mobile' => $user->mobile,
                    'profile_picture' => $user->profile_picture,
                    'fieldOfWorks' => $user->fieldOfWorks,
                    'user_id' => $user->id
                ])                
            @endforeach

        </div>
    </div>
@endsection
