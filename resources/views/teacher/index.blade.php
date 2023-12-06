<x-app-layout>
    <div class="mt-12 bg-white overflow-hidden shadow-sm">
        <div class="p-6 text-gray-900">
            <div class="flex items-center justify-between">
                <h2 class="text-gray-700 uppercase font-bold">Teachers</h2>
                <x-add-button :route="__('teacher.create')">{{__("Add New Teacher")}}</x-add-button>
            </div>

            {{-- Student Table --}}
            <div class="mt-2 border rounded-lg overflow-x-auto dark:border-gray-700">
                <table class="text-sm text-white text-center shadow-md dark:text-gray-400">
                    <tr class="uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="w-2/12 px-4 py-3 text-xs">Name</th>
                        <th scope="col" class="w-2/12 px-4 py-3 text-xs whitespace-nowrap">Phone Number</th>
                        <th scope="col" class="w-2/12 px-4 py-3 text-xs whitespace-nowrap">Gender</th>
                        <th scope="col" class="w-2/12 px-4 py-3 text-xs whitespace-nowrap">Qualification</th>
                        <th scope="col" class="w-1/12 px-4 py-3 text-xs whitespace-nowrap">Pic_Left</th>
                        <th scope="col" class="w-1/12 px-4 py-3 text-xs whitespace-nowrap">Pic_Right</th>
                        <th scope="col" class="w-2/12 px-4 py-3 text-xs">Action
                        </th>
                    </tr>
                    @foreach ($teachers as $teacher)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row"
                            class="w-4/12 px-1 py-1 text-sm font-semibold text-gray-600 tracking-tight whitespace-nowrap capitalize">
                            {{ $teacher->name }}
                        </td>
                        <td class="px-1 py-1 text-sm font-semibold text-gray-600 tracking-tight">
                            {{ $teacher->phone_number }}
                        </td>
                        <td class="px-1 py-1 text-sm font-semibold text-gray-600 tracking-tight capitalize">
                            {{ $teacher->gender }}
                        </td>
                        <td class="px-1 py-1 text-sm font-semibold text-gray-600 tracking-tight capitalize">
                            {{ $teacher->qualifications }}
                        </td>
                        <td>
                            <x-profile-img :pic="__('/teachers/'. $teacher->photo_left)" />
                        </td>
                        <td>
                            <x-profile-img :pic="__('/teachers/'. $teacher->photo_right)" />
                        </td>
                        <td class="px-1 py-1">
                            <div class="flex items-center justify-center">
                                <a href="{{ route('teacher.edit', $teacher->id) }}"
                                    class="mx-1 bg-green-600 p-2 border-b rounded-sm" title="Edit">
                                    <svg class="h-4 w-4 text-white dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                                    </svg>
                                </a>
                                <a href="{{ route('teacher.destroy', $teacher->id) }}"
                                    class="mx-1 bg-red-600 p-2 border-b rounded-sm" title="Delete">
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

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </div>
</x-app-layout>