<x-client.home>
    <x-slot name="title">
        Danh mục
    </x-slot>
    <x-slot name="content">
        <x-client.category :categories="$categories" />
    </x-slot>
</x-client.home>
