<x-client.home>
    <x-slot name="title">
        Chuyên mục
    </x-slot>
    <x-slot name="content">
    	<x-client.category.show-children :cate="$cate" />
    </x-slot>
</x-client.home>