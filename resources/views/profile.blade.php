@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('messages.Profile') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Profile Picture -->
                        <div class="col-md-4 text-center">
                            @if ($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" class="img-fluid rounded-circle" alt="Profile Picture" width="150">
                            @else
                                <img src="{{ asset('avatar-icon.png')}}" class="img-fluid rounded-circle" alt="Profile Picture" width="150">
                            @endif
                        </div>

                        <!-- User Information -->
                        <div class="col-md-8">
                            <h4>{{ $user->name }}</h4>
                            <p><strong>{{ __('messages.Email') }}:</strong> {{ $user->email }}</p>
                            <p><strong>{{ __('messages.Gender') }}:</strong> {{ ucfirst($user->gender) }}</p>
                            <p><strong>{{ __('messages.LinkedIn') }}:</strong> <a href="https://linkedin.com/in/{{ $user->linkedin_username }}" target="_blank">{{ $user->linkedin_username }}</a></p>
                            <p><strong>{{ __('messages.Mobile') }}:</strong> {{ $user->mobile }}</p>
                            <p><strong>{{ __('messages.Coins Balance') }}:</strong> {{ $user->coins_balance }} Coins</p>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <!-- Button to Edit Profile (if required) -->
                        <div class="col text-end">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('messages.Edit Profile') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
