<div class="chat-wrapper p-1 chat-right">
    <div class="chat-box-wrapper">
        <div style="padding: .5rem 1rem;">
            <div class="chat-box" title="{{ $msg->user->name }}">{{ $msg->content }}</div>
            <small class="opacity-6">
                <i class="fa fa-calendar-alt mr-1"></i>
                {{ $msg->time_created }}
            </small>
            <small class="opacity-6">
		        | <a href="{{ route('admin.user.show', ['id' => $msg->user->id]) }}">{{ $msg->user->name }}</a>
	        </small>
        </div>
    </div>
</div>
