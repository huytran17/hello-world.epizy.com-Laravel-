<x-client.home>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>
    <x-slot name="content">
    	<x-client.post.show :post="$post" :cates="$cates" :popularPosts="$popular_posts"/>
    </x-slot>
</x-client.home>