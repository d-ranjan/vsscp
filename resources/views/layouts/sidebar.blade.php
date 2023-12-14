<!-- start sidebar -->
<nav id="sideBar" class="fixed bg-white border-r border-gray-300 p-3 mt-12 w-32 h-screen shadow-xl dark:bg-gray-800 dark:border-gray-700" :class="{'max-sm:hidden':sidebar == false}">
    <!-- sidebar content -->
    <div class="flex flex-col">
        <p class="uppercase text-xs text-gray-600 mb-1 tracking-wider dark:text-slate-400">Dashboards</p>

        @if (Auth::user()->role === 'admin')
        <x-nav-link href="{{ route('teacher.index') }}">Teachers</x-nav-link>
        <x-nav-link href="{{ route('teacher.students') }}">Students</x-nav-link>
        @endif

        <p class="uppercase text-xs text-gray-600 mb-1 mt-4 tracking-wider dark:text-slate-400">Functions</p>
        <x-nav-link href="{{ route('course.index') }}">Courses</x-nav-link>
        <x-nav-link href="{{ route('subject.index') }}">Subjects</x-nav-link>
    </div>
    <!-- end sidebar content -->
</nav>
<!-- end sidbar -->
