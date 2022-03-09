<x-app-layout>

    <x-slot name="header">
        @yield('header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('components.success-card')
            @include('components.errors-card')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post">
                        @csrf
                        <label for="title">Title</label><br/>
                        <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}" class="@error('title') is-invalid @enderror w-full"><br/>
                        <label for="body">Body</label><br/>
                        <textarea id="body" name="body" class="@error('body') is-invalid @enderror w-full" cols="80" rows="10">{{ old('body', $post->body) }}</textarea>
                        <br/>
                        <button class="rounded bg-indigo-50 hover:bg-gray-50 p-2 px-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
