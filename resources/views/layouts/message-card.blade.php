<div class="list-group-item list-group-item-action d-flex align-items-start">
    <div class="me-3">
        <i class="bi bi-envelope text-primary fs-4"></i>
    </div>
    <div>
        <div class="fw-bold">{{__('messages.New Message')}}</div>
        <small class="text-muted">{{__('messages.messageBody')}} {{ $sender->name }}</small>
        <p>{{ $message }}</p>
    </div>
    <div class="ms-auto text-muted">
        @php
            $timeAgo = $created_at->diffInMinutes;
        @endphp
        <small>{{ $timeAgo }} {{__('messages.minutesAgo') }}</small>
    </div>
</div>