<div class="col-md-3">
    <div class="card text-center border rounded-3 shadow-sm w-1">
        <!-- Profile Picture -->
        <div class="card-body">
            @if ($profile_picture)
                <img src="{{ asset('storage/' . $profile_picture) }}" class="rounded img-fluid w-75" alt="Profile Picture">                
            @else
                <img src="{{ asset('avatar-icon.png') }}" class="rounded img-fluid w-75" alt="Profile Picture">  
            @endif

            <!-- Username -->
            <h5 class="card-title mb-1 fw-bold">{{$name}}</h5>
            <!-- Field of Work -->
            <p class="card-text text-muted">
                @foreach ($fields_name as $field)
                    {{ $field }}@if (!$loop->last) | @endif
                @endforeach
            </p>

            <p class="card-text text-muted">{{$gender}}</p>
            <p class="card-text text-muted">{{__('messages.Mobile Number')}}: {{$mobile}}</p>
            <p class="card-text text-muted"><a href="https://www.linkedin.com/in/{{$linkedin_username}}">https://www.linkedin.com/in/{{$linkedin_username}}</a></p>
    
            <form action="{{ route('edit.thumbsup') }}" method="POST">
                @csrf
                @if(in_array($user_id, $wishlist))
                    <button type="submit" name="user_id" value="{{ $user_id }}" class="border-0 bg-transparent p-0">
                        <img class="w-75" src="{{ asset('thumbs-up-active.png') }}">
                    </button>
                @else
                    <button type="submit" name="user_id" value="{{ $user_id }}" class="border-0 bg-transparent p-0">
                        <img class="w-75" src="{{ asset('thumbs-up-nonactive.png') }}">
                    </button>
                @endif
            </form>   
        </div>
    </div>
</div>
