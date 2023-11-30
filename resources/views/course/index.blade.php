<x-app-layout>
    <div class="mt-14 mx-4 max-w-lg mx-auto bg-white overflow-hidden shadow-sm rounded-lg ">
        <div class="p-6 text-gray-900">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-700 uppercase font-bold">Teachers</h2>
                </div>
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('teacher.create') }}" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                        </svg>
                        <span class="ml-2 text-xs font-semibold">Add New Teacher</span>
                    </a>
                </div>
            </div>

            {{-- Student Table --}}
            <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                <table class="text-sm text-white text-center shadow-md dark:text-gray-400">
                    <tr class="uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="w-4/12 px-4 py-3 text-xs">Name</th>
                        <th scope="col" class="w-4/12 px-4 py-3 text-xs whitespace-nowrap">Phone Number</th>
                        <th scope="col" class="w-4/12 px-4 py-3 text-xs whitespace-nowrap">Gender</th>
                        <th scope="col" class="w-4/12 px-4 py-3 text-xs">Action
                        </th>
                    </tr>
                    @foreach ($courses as $course)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="w-4/12 px-4 py-1 text-sm font-semibold text-gray-600 tracking-tight whitespace-nowrap capitalize">
                                {{ $course->name }}
                            </td>
                            <td class="w-4/12 px-4 py-1 text-sm font-semibold text-gray-600 tracking-tight">
                                {{ $course->phone_number }}
                            </td>
                            <td class="w-4/12 px-4 py-1 text-sm font-semibold text-gray-600 tracking-tight capitalize">
                                {{ $course->gender }}
                            </td>
                            <td class="w-4/12 px-4 py-1">
                                <div class="flex items-center justify-center">
                                    <a href="{{-- route('student.edit',$user->id) --}}" class="mx-1 bg-green-600 p-2 border-b rounded-sm" title="Edit">
                                        <svg class="h-4 w-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z"/>
                                        </svg>
                                    </a>
                                    <a href="{{-- route('student.destroy', $user->id) --}}" class="mx-1 bg-red-600 p-2 border-b rounded-sm" title="Delete">
                                        <svg class="h-4 w-4 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            @push('scripts')
            <script>
                $(function() {
                    $(".deletestudent").on("click", function(event) {
                        event.preventDefault();
                        $("#deletemodal").toggleClass("hidden");
                        var url = $(this).attr('data-url');
                        $(".remove-record").attr("action", url);
                    })

                    $("#deletemodelclose").on("click", function(event) {
                        event.preventDefault();
                        $("#deletemodal").toggleClass("hidden");
                    })
                })
            </script>
            @endpush
        </div>
    </div>
</x-app-layout>