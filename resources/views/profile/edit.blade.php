<x-app-layout>
    <div class="p-6 space-y-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="p-4 mx-auto sm:p-8 max-w-xl bg-white shadow sm:rounded-lg dark:bg-gray-800">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-4 mx-auto sm:p-8 max-w-xl bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 mx-auto sm:p-8 max-w-xl bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
