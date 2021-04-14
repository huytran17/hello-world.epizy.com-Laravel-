<x-client.home>
    <x-slot name="title">
        Danh mục con
    </x-slot>
    <x-slot name="content">
        <x-client.children :category="$category"/>
    </x-slot>
</x-client.home>
