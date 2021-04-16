<x-client.home>
    <x-slot name="title">
        {{ __('Bài viết mới nhất') }}
    </x-slot>
    <x-slot name="content">
    	<x-client.post.newest-post :newest="$newest"/>
    </x-slot>
</x-client.home>