<x-guest-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ __('Posts') }}
            </div>
        </header>

        @include('components.post-index')

    </div>
</x-guest-layout>






