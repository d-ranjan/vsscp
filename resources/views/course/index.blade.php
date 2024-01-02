<x-app-layout>
    <div class="mx-2 my-4 max-w-lg bg-white overflow-hidden shadow-sm rounded-lg dark:bg-gray-800">
        <div class="p-6 text-gray-900">

            @if (session('status') === 'course-added')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="mb-4 py-2 bg-green-500 rounded-sm text-sm text-center text-gray-600 dark:text-white">
                {{ __('Course Added Successfully') }}</p>
            @endif

            @if (session('status') === 'course-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="mb-4 py-2 bg-green-500 rounded-sm text-sm text-center text-gray-600 dark:text-white">
                {{ __('Course Updated Successfully') }}</p>
            @endif

            @if (session('status') === 'course-deleted')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="mb-4 py-2 bg-red-500 rounded-sm text-sm text-center text-gray-600 dark:text-white">
                {{ __('Course Deleted Successfully') }}</p>
            @endif

            <div class="flex items-center justify-between">
                <h2 class="text-gray-700 uppercase font-bold dark:text-slate-200">Courses</h2>
                <x-add-button :route="__('course.create')">{{ __('Add New Course') }}</x-add-button>
            </div>

            <div class="mt-2 border rounded-lg overflow-x-auto dark:border-gray-700">
                <table class="text-sm text-white text-center shadow-md">
                    <tr class="uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-300">
                        <th scope="col" class="w-4/12 px-4 py-3 text-xs">Name</th>
                        <th scope="col" class="w-5/12 px-4 py-3 text-xs whitespace-nowrap">Description</th>
                        <th scope="col" class="w-1/12 px-4 py-3 text-xs whitespace-nowrap">Banner</th>
                        <th scope="col" class="w-2/12 px-4 py-3 text-xs">Action
                        </th>
                    </tr>
                    @foreach ($courses as $course)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50">
                        <td scope="row"
                            class="w-4/12 px-1 py-1 text-sm font-semibold text-gray-600 tracking-tight whitespace-nowrap capitalize dark:text-gray-400">
                            {{ $course->name }}
                        </td>
                        <td
                            class="px-1 py-1 text-sm font-semibold text-gray-600 tracking-tight capitalize dark:text-gray-400">
                            {{ $course->description }}
                        </td>
                        <td>
                            <img class="w-10 h-10 mx-auto" src="{{ asset('/courses/' . $course->banner) }}">
                        </td>
                        <td class="px-1 py-1">
                            <div class="flex items-center justify-center">
                                <a href="{{ route('course.edit', $course->id) }}"
                                    class="mx-1 bg-green-600 p-2 border-b rounded-sm" title="Edit Course">
                                    <svg class="h-4 w-4 text-white dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                                    </svg>
                                </a>
                                <a href="{{ route('course.delete', $course->id) }}"
                                    class="mx-1 bg-red-600 p-2 border-b rounded-sm" title="Remove Course">
                                    <svg class="h-4 w-4 fill-current text-gray-100" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>