<x-conversation class="{{ $attributes['class'] }}">
	<x-slot name="header">
		{{ __('Vice Admin Channel') }}
	</x-slot>
	<x-slot name="input">
		<input placeholder="Write here and hit enter to send..." type="text" class="form-control-sm form-control" id="viceAdInput" data-route="{{ route('admin.chat.store') }}">
	</x-slot>
	@foreach ($lower_messages as $m)
		<div class="chat-wrapper p-1">
			<div class="chat-box-wrapper">
			    <div>
			        <div class="chat-box">{{ $m->content }}</div>
			        <small class="opacity-6">
			            <i class="fa fa-calendar-alt mr-1"></i>
			            {{ $m->time_created }}
			        </small>
			        <small class="opacity-6">
			            | <a href="{{ route('admin.user.show', ['id' => $m->user->id]) }}">{{ $m->user->name }}</a>
			        </small>
			    </div>
			</div>
		</div>
	@endforeach
</x-conversation>