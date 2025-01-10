@extends('layouts.app')
@section('content')
<form action="{{ route('cont.register')}}" method="POST">
    <div class="container mt-4">
        <h2 class="fw-bold text-primary display-4 mb-4">{{__('messages.Registration Payment')}}</h2>
        
        <div class="row mb-3">
            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('messages.Price for Registration') }}</label>

            <div class="col-md-6">
                <input id="price" type="numeric" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus readonly>
            </div>

            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('messages.Enter Pay Balance') }}</label>

            <div class="col-md-6">
                <input id="pay" type="numeric" class="form-control @error('pay') is-invalid @enderror" name="pay" required autocomplete="pay" autofocus placeholder="{{__('messages.Must be equal to the price')}}">

                @error('pay')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('messages.Pay') }}
                </button>
            </div>
        </div>        
    </div>
</form>
    
@endsection