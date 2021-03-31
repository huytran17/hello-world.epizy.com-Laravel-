<x-conversation class="{{ $attributes['class'] }}">
	<x-slot name="header">
		{{ __('Super Admin Channel') }}
	</x-slot>
	@foreach ($super_messages as $m)
		<div class="chat-wrapper p-1">
			<div class="chat-box-wrapper">
			    <div>
			        <div class="avatar-icon-wrapper mr-1">
			            <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
			            </div>
			            <div class="avatar-icon avatar-icon-lg rounded">
			                <img src="{{ $m->user->profile_photo_path }}" alt="{{ $m->user->slug }}">
			            </div>
			        </div>
			    </div>
			    <div>
			        <div class="chat-box">{{ $m->content }}</div>
			        <small class="opacity-6">
			            <i class="fa fa-calendar-alt mr-1"></i>
			            {{ $m->time_created }}
			        </small>
			    </div>
			</div>
		</div>
	@endforeach
</x-conversation>