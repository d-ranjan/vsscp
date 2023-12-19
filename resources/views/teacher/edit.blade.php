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

            @if (Auth::user()->role == 'admin')
                <div class="flex items-center justify-between p-6 pb-3">
                    <h2 class="text-gray-700 uppercase font-bold dark:text-white">Teacher Profile</h2>
                    <a href="{{ route('teacher.index') }}"
                        class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas"
                            data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z">
                            </path>
                        </svg>
                        <span class="ml-2 text-xs font-semibold">Back</span>
                    </a>
                </div>
            @else
                <header class="px-6 py-3">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Profile Information') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                        {{ __("Update your account's profile information.") }}
                    </p>
                </header>
            @endif
            <hr>

            <div class="px-4 pb-4 sm:px-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <form method="post" action="{{ route('teacher.update', $teacher->id) }}" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $teacher->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <x-text-input id="phone_number" name="phone_number" type="tel" pattern="[1-9][0-9]{9}"
                            class="mt-1 block w-full" :value="old('phone_number', $teacher->phone_number)" required autocomplete="phone_number" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>

                    <!-- Gender -->
                    <div>
                        <x-input-label for="gender" :value="__('Gender')" />
                        <select id="gender" name="gender"
                        class="block mt-1 w-full p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm dark:bg-gray-400"
                            required>
                            <option value="male" class="p-2">Male</option>
                            <option value="female" {{ $teacher->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <!-- Qualifications -->
                    <div>
                        <x-input-label for="qualifications" :value="__('Qualifications')" />
                        <x-text-input id="qualifications" class="block mt-1 w-full" type="text" name="qualifications"
                            :value="old('qualifications')" required autofocus autocomplete="qualifications"
                            value="{{ $teacher->qualifications }}" />
                        <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                    </div>

                    <!-- Picture Left -->
                    <div>
                        <x-input-label for="photo_left" :value="__('Photo Left')" />
                        <div class="flex items-center space-x-1">
                            <x-profile-img :pic="__('/teachers/' . $teacher->photo_left)" />
                            <x-text-input id="photo_left" class="block mt-1 w-full" type="file" name="photo_left"
                                accept="image/*" />
                        </div>
                    </div>

                    <!-- Picture Right -->
                    <div>
                        <x-input-label for="photo_right" :value="__('Photo Right')" />
                        <div class="flex items-center space-x-1">
                            <x-profile-img :pic="__('/teachers/' . $teacher->photo_right)" />
                            <x-text-input id="photo_right" class="block mt-1 w-full" type="file" name="photo_right"
                                accept="image/*" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end gap-4">
                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-200 dark:bg-green-500">{{ __('Saved.') }}</p>
                        @endif
                        <x-primary-button class="w-24">{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mx-2 my-4 max-w-lg bg-white overflow-hidden shadow-sm rounded-lg dark:bg-gray-800">
            <div class="px-4 py-4 sm:px-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                @include('profile.partials.update-password-form')
            </div>
        </div>

    </div>
</x-app-layout>
