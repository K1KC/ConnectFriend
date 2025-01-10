<div class="col-md-4">
    <div class="card text-center border rounded-3 shadow-sm" style="width: 250px;">
        <!-- Profile Picture -->
        <div class="card-body">
            <img 
            src="{{ asset('storage/' . $profile_picture) }}" 
                class="rounded-circle img-fluid mb-3" 
                alt="Profile Picture" 
                style="width: 100px; height: 100px; object-fit: cover;">
            <!-- Username -->
            <h5 class="card-title mb-1 fw-bold">{{$name}}</h5>
            <!-- Field of Work -->
            <p class="card-text text-muted">
                @foreach ($fieldOfWorks as $field)
                    {{ $field->field_of_works }}@if (!$loop->last) | @endif
                @endforeach
            </p>

            <p class="card-text text-muted">{{$gender}}</p>
            <p class="card-text text-muted">{{$mobile}}</p>
            <p class="card-text text-muted">{{$linkedin_username}}</p>
    
            <form action="{{ route('edit.thumbsup') }}" method="POST">
                @csrf
                @if(in_array($user_id, $friendlist))
                    <button type="submit" name="user_id" value="{{ $user_id }}">
                        <img class="size-5" src="{{ asset('thumbs-up-active.png') }}">
                    </button>
                @else
                    <button type="submit" name="friend_id" value="{{ $user_id }}">
                        <img class="size-5" src="{{ asset('thumbs-up-nonactive.png') }}">
                    </button>
                @endif
            </form>   
        </div>
    </div>
</div>
