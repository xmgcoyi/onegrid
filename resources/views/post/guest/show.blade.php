<x-guest-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ __('Show') }}: {{ $post->title }}

                <ul>
                    <li><a href="{{ route('post.index') }}" class="text-sm hover:text-sky-800 hover:underline">All Posts</a></li>
                </ul>
            </div>
        </header>

        @include('components.post-show')
    </div>
</x-guest-layout>






