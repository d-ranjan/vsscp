<x-app-layout>
    <div class="flex flex-col">
        <div class="mt-14 sm:w-full max-w-lg mx-auto bg-white overflow-hidden shadow-sm rounded-lg">

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
                <div>
                    <h2 class="text-gray-700 uppercase font-bold">Teacher Profile</h2>
                </div>
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('teacher.index') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path>
                        </svg>
                        <span class="ml-2 text-xs font-semibold">Back</span>
                    </a>
                </div>
            </div>
            <hr class="">
            @endif

            <div class="px-4 pb-4 sm:px-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ route('teacher.update', $teacher->id) }}" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $teacher->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <x-text-input id="phone_number" name="phone_number" type="tel" pattern="[0-9]{10}" class="mt-1 block w-full" :value="old('phone_number', $teacher->phone_number)" required autocomplete="phone_number" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>

                    <!-- Gender -->
                    <div>
                        <x-input-label for="gender" :value="__('Gender')" />
                        <select id="gender" name="gender" class="block mt-1 w-full p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="male" class="p-2">Male</option>
                            <option value="female" {{  $teacher->gender == 'female' ? 'selected' : "" }}>Female</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <!-- Qualifications -->
                    <div>
                        <x-input-label for="qualifications" :value="__('Qualifications')" />
                        <x-text-input id="qualifications" class="block mt-1 w-full" type="text" name="qualifications" :value="old('qualifications')" required autofocus autocomplete="qualifications" value="{{$teacher->qualifications}}" />
                        <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                    </div>

                    <!-- Picture Left -->
                    <div>
                        <x-input-label for="photo_left" :value="__('Photo Left')" />

                        <x-text-input id="photo_left" class="block mt-1 w-full" type="file" name="photo_left" accept="image/*" value="{{$teacher->photo_left}}" />
                    </div>

                    <!-- Picture Right -->
                    <div>
                        <x-input-label for="photo_right" :value="__('Photo Right')" />

                        <x-text-input id="photo_right" class="block mt-1 w-full" type="file" name="photo_right" accept="image/*" value="{{$teacher->photo_right}}" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end gap-4">
                        <x-primary-button class="w-24">{{ __('Save') }}</x-primary-button>
                    </div>

                </form>
            </div>
        </div>

        <div class="my-4 max-w-lg mx-auto bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>