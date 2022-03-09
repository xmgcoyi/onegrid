<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('components.success-card')
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-xl font-light leading-relaxed mt-6 mb-4 text-gray-800">
                    {{ $post->body }}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-10">
        @include('components.errors-card')
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="post" action="{{ route('rating.capture', ['post' => $post->id]) }}">
                    @csrf
                    <div class="flex justify-center">
                        <div class="form-check form-check-inline mx-2">
                            <label class="form-check-label inline-block text-gray-800 font-semibold"
                                   for=""><strong>Rating: </strong></label>
                        </div>
                        <div class="form-check form-check-inline mx-2">
                            <input
                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="score" id="inlineRadio1" value="1">
                            <label class="form-check-label inline-block text-gray-800"
                                   for="inlineRadio10">1</label>
                        </div>
                        <div class="form-check form-check-inline mx-2">
                            <input
                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="score" id="inlineRadio2" value="2">
                            <label class="form-check-label inline-block text-gray-800"
                                   for="inlineRadio20">2</label>
                        </div>
                        <div class="form-check form-check-inline mx-2">
                            <input
                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="score" id="inlineRadio1" value="3">
                            <label class="form-check-label inline-block text-gray-800"
                                   for="inlineRadio10">3</label>
                        </div>
                        <div class="form-check form-check-inline mx-2">
                            <input
                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="score" id="inlineRadio2" value="4">
                            <label class="form-check-label inline-block text-gray-800"
                                   for="inlineRadio20">4</label>
                        </div>
                        <div class="form-check form-check-inline mx-2">
                            <input
                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="score" id="inlineRadio2" value="5">
                            <label class="form-check-label inline-block text-gray-800"
                                   for="inlineRadio20">5</label>
                        </div>
                        <div class="form-check form-check-inline mx-2">
                            <div class="flex space-x-2 justify-center">
                                <button
                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
