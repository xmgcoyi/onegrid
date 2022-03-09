<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('components.success-card')
        @include('components.errors-card')
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <table class="min-w-full">
                    <thead class="border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Title
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post->id }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('post.show', ['post' => $post ]) }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @if(Auth::check() && Auth::user()->id === $post->user->id)
                                    <a href="{{ route('post.edit', ['post' => $post ]) }}">edit</a> |
                                    <a href="{{ route('post.delete', ['post' => $post ]) }}">delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
