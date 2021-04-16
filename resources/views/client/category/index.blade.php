<x-client.home>
    <x-slot name="title">
        Chuyên mục
    </x-slot>
    <x-slot name="content">
    	<x-client.category.index :cates="$cates" />
    </x-slot>
</x-client.home>