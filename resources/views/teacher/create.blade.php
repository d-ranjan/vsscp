<x-app-layout>
    <div class="mt-14 max-w-lg mx-auto bg-white overflow-hidden shadow-sm rounded-lg ">
        <div class="flex items-center justify-between p-6 pb-3">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Add New Teacher</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('teacher.index') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>
        <hr class="">
        
        @if ($errors->any())
            <div class="alert alert-danger text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('teacher.store') }}" method="POST" class="w-full max-w-xl px-12" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="my-2">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Phone Number -->
            <div class="my-2">
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" pattern="[0-9]{10}" maxlength="10" minlength="10" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
    
            <!-- Gender -->
            <div class="my-2">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" :value="old('gender')" class="block mt-1 w-full p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option selected value="male" class="p-2">Male</option>
                <option value="female" class="p-2">Female</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Qualifications -->
            <div class="my-2">
                <x-input-label for="qualifications" :value="__('Qualifications')" />
                <x-text-input id="qualifications" class="block mt-1 w-full" type="text" name="qualifications" :value="old('qualifications')" required autofocus autocomplete="qualifications" />
                <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
            </div>

            <!-- Picture Left -->
            <div class="my-2">
                <x-input-label for="photo_left" :value="__('Photo Left')" />
    
                <x-text-input id="photo_left" class="block mt-1 w-full"
                                type="file"
                                name="photo_left" required/>
            </div>

            <!-- Picture Right -->
            <div class="my-2">
                <x-input-label for="photo_right" :value="__('Photo Right')" />
    
                <x-text-input id="photo_right" class="block mt-1 w-full"
                                type="file"
                                name="photo_right" required/>
            </div>  

            <!-- Password -->
            <div class="my-2">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="my-2">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>        
    </div>
</x-app-layout>