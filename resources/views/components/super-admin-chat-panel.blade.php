<x-conversation class="{{ $attributes['class'] }}">
	<x-slot name="header">
		{{ __('Super Admin Channel') }}
	</x-slot>
	<x-slot name="input">
		<input placeholder="Nhấn Enter để gửi..." type="text" class="form-control-sm form-control" id="superAdInput" data-route="{{ route('admin.chat.store') }}">
	</x-slot>
	@foreach ($super_messages as $m)
		<div class="chat-wrapper p-1 {{ $m->user->id===auth()->id() ? 'chat-right' : 'chat-left' }}">
			<div class="chat-box-wrapper">
			    <div style="padding: .5rem 1rem;">
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