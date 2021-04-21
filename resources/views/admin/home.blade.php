<x-admin.home>
	<x-slot name="title">
		{{ __('Administrator') }}
	</x-slot>
	<x-slot name="content">
		<div class="welcome-pane" style="background-image: url({{ asset('images/airplane.png') }}); background-position: center center; background-repeat: no-repeat; background-size: cover; width: 100%; height: 100%; min-height: 400px;">
			<h1 class="welcome-title">Welcome to {{ config('app.name', 'hello-world') }}'s Administration!</h1>
		</div>
	</x-slot>
</x-admin.home>
