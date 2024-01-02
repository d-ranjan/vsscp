<x-app-layout>
    <div class="flex flex-col">
        <div class="mx-2 my-4 max-w-lg bg-white overflow-hidden shadow-sm rounded-lg dark:bg-gray-800">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="flex items-center justify-between p-6 pb-3">
                <h2 class="text-gray-700 uppercase font-bold dark:text-white">Course</h2>
                <a href="{{ route('course.index') }}"
                    class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z">
                        </path>
                    </svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
            <hr>

            <header class="px-6 py-3">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Course Information') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                    {{ __("Update course information.") }}
                </p>
            </header>

            <div class="px-4 pb-4 sm:px-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <form method="post" action="{{ route('course.update', $course->id) }}" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $course->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Description -->
                    <div class="my-2">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full h-24" type="text" name="description"
                            :value="old('description', $course->description)" required autofocus
                            autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Banner -->
                    <div class="my-2">
                        <x-input-label for="banner" :value="__('Banner')" />
                        <div class="flex items-center space-x-1">
                            <img class="w-10 h-10 mx-auto" src="{{ asset('/courses/' . $course->banner) }}">
                            <x-text-input id="banner" class="block mt-1 w-full" type="file" name="banner" required />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end gap-4">
                        <x-primary-button class="w-24">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>