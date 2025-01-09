@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{__('messages.Share Something')}}</h5>
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="mb-3">
                                <textarea class="form-control" name="content" rows="3" placeholder="What's on your mind?"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{__('messages.Friend Updates')}}</h5>
                        <ul class="list-group">
                            @foreach($posts as $post)
                                <li class="list-group-item">
                                    <strong>{{ $post->user->name }}</strong>: {{ $post->content }}
                                    <small class="text-muted d-block">{{ $post->created_at->diffForHumans() }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{__('messages.Friendlist')}}</h5>
                        <ul class="list-group">
                            @foreach($friends as $friend)
                                <li class="list-group-item">
                                    {{ $friend->name }}
                                    <a href="{{ route('messages.create', $friend->id) }}" class="btn btn-sm btn-outline-secondary float-end">Message</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
