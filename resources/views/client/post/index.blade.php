<x-client.home>
    <x-slot name="title">
        {{ __('Danh sách bài viết') }}
    </x-slot>
    <x-slot name="content">
    	<x-client.post.index :posts="$posts" />
    </x-slot>
</x-client.home>