<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f8ff;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home')}}">ConnectFriend</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-5">
                    <a class="nav-link active" href="{{ route('friendlist')}}" style="color: #0056b3; font-weight: 500;">{{ __('messages.Friendlist') }}</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ route('profile') }}" style="color: #0056b3; font-weight: 500;">{{ __('messages.Profile') }}</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{--{{ route('notification') }}--}}" style="color: #0056b3; font-weight: 500;">{{ __('messages.Notification') }}</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{--{{ route('messages') }}--}}" style="color: #0056b3; font-weight: 500;">{{ __('messages.Message') }}</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ route('search.page') }}" style="color: #0056b3; font-weight: 500;">{{ __('messages.Search User') }}</a>
                </li>
                <li class="nav-item me-5">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0 text-danger">
                            <a class="nav-link" style="color: #0056b3; font-weight: 500;"">{{ __('messages.Logout') }}</a></button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Language Switcher -->
        <div class="d-flex align-items-center m-3">
            <a href="/locale/en" class="text-decoration-none text-primary me-3">EN</a>
            |
            <a href="/locale/id" class="text-decoration-none text-primary ms-3">ID</a>
        </div>
    </div>
</nav>
