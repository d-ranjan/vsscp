<x-app-layout>
    <div class="mt-6 mx-3 p-6 lg:px-8 space-y-6 bg-white shadow rounded-lg dark:bg-gray-800">
        <section class="space-y-6">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200">
                    {{ __('Delete Course') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once the course is deleted, all of its resources and data will be permanently deleted. Before
                    deleting course, please download any data or information that you wish to retain.') }}
                </p>
            </header>

            <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{
                __('Delete Course') }}</x-danger-button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('course.destroy', $course->id) }}" class="p-6 dark:bg-gray-800">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200">
                        {{ __('Are you sure you want to delete the course?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once the course is deleted, all of its resources and data will be permanently deleted.
                        Please enter your password to confirm you would like to permanently delete the course.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}" />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3">
                            {{ __('Delete Course') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </section>
    </div>
</x-app-layout>