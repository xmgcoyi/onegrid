<x-app-layout>

    <x-slot name="header">
        {{ __('Show') }}: {{ $post->title }}
    </x-slot>

    @include('components.post-show')
</x-app-layout>






