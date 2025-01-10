<div class="list-group-item list-group-item-action d-flex align-items-start">
    <div class="me-3">
        <i class="bi bi-envelope text-primary fs-4"></i>
    </div>
    <div>
        <div class="fw-bold">{{__('messages.Friend Request')}}</div>
        <small class="text-muted">{{__('messages.requestBody')}} {{ $sender->name }}</small>
    </div>
    <div class="ms-auto text-muted">
        @php
            $timeAgo = $sent_at->diffInMinutes;
            $sentDate = $sent_at->format('d F Y');
            $sentHour = $sent_at->format('H:i');
        @endphp
        <small>{{ $timeAgo }} {{__('messages.minutesAgo') }}</small>
        <small>{{__('messages.Sent At')}}: {{ $sendDate }} ({{ $sentHour }})</small>
    </div>
</div>