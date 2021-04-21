<x-admin.home>
	<x-slot name="title">
		Trò chuyện
	</x-slot>
	<x-slot name="content">
		@if (auth()->user()->isSuperAdmin())
			<div id="conversation">
				<x-super-admin-chat-panel class="col-12 col-md-6 admin-chat-panel"/>
			</div>
		@elseif (auth()->user()->isLowerAdmin())
			<div id="conversation">
				<x-lower-admin-chat-panel class="col-12 col-md-6 admin-chat-panel"/>
			</div>
		@endif
	</x-slot>
</x-admin.home>
