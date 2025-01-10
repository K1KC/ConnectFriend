@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                         <!-- Name -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('messages.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <!-- Email -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('messages.Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <!-- Password -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('messages.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{__('messages.Gender') }}</label>
                        
                            <div class="col-md-6">
                                <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="" disabled selected>{{__('messages.Select your gender') }}</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{__('messages.Male')}}</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{__('messages.Female')}}</option>
                                </select>
                        
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Field of Work -->
                        <div class="mb-3 row">
                            <label for="fields" class="col-md-4 col-form-label text-md-end">{{ __('messages.Field of Work') }}</label>
                            <div class="col-md-6" id="field-of-work-container">
                                <!-- Default Input Boxes -->
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="fields[]" placeholder="Field of Work 1" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="fields[]" placeholder="Field of Work 2" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="fields[]" placeholder="Field of Work 3" required>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4 mt-2 d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-primary btn-sm" id="add-field-btn">{{{__('messages.Add More Fields')}}}</button>
                                <button type="button" class="btn btn-outline-danger btn-sm" id="remove-field-btn">{{__('messages.Remove Field') }}</button>
                            </div>
                                @error('fields')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- LinkedIn Username -->
                        <div class="mb-3 row">
                            <label for="linkedin" class="col-md-4 col-form-label text-md-end">{{ __('messages.LinkedIn Username') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">https://www.linkedin.com/in/</span>
                                    <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ old('linkedin') }}" required>
                                </div>
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="mb-3 row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('messages.Mobile Number') }}</label>
                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" pattern="\\d+" placeholder="Enter all digits" required>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Price for Registration -->
                        <div class="mb-3 row">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('messages.Price for Registration') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ random_int(100000, 125000) }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p class="mb-0">{{__('messages.toLogin')}}<a href="{{ route('login') }}" class="text-decoration-none fw-bold">{{__('messages.LoginHere')}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("field-of-work-container");
        const addButton = document.getElementById("add-field-btn");
        const removeButton = document.getElementById("remove-field-btn");

        const updateRemoveButton = () => {
            const inputCount = container.querySelectorAll("input").length;
            removeButton.style.display = inputCount <= 3 ? "none" : "inline-block";
        };

        addButton.addEventListener("click", () => {
            const inputCount = container.querySelectorAll("input").length + 1;

            const newInputDiv = document.createElement("div");
            newInputDiv.className = "mb-2";

            const newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "fields[]";
            newInput.placeholder = `Field of Work ${inputCount}`;
            newInput.className = "form-control";
            newInput.required = true;

            newInputDiv.appendChild(newInput);
            container.appendChild(newInputDiv);

            updateRemoveButton();
        });

        removeButton.addEventListener("click", () => {
            const inputs = container.querySelectorAll("div.mb-2");
            if (inputs.length > 3) {
                inputs[inputs.length - 1].remove();
            }
            updateRemoveButton();
        });

        updateRemoveButton();
    });
</script>

@endsection
