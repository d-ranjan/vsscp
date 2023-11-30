    <!-- start sidebar -->
    <nav id="sideBar" class="fixed bg-white border-r border-gray-300 p-3 mt-12 w-48 h-screen shadow-xl"
    :class="{'max-sm:hidden':isOpen === false}">
        <!-- sidebar content -->
        <div class="flex flex-col">
            <p class="uppercase text-xs text-gray-600 mb-3 tracking-wider">Dashboards</p>
            
            @if (Auth::user()->role === 'admin')
            <a href="{{ route('teacher.index') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-envelope-open-text text-xs mr-2"></i>
                Teachers
            </a>
            @endif

            @if (Auth::user()->role === 'admin')
            <a href="{{ route('teacher.students') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-comments text-xs mr-2"></i>
                Students
            </a>
            @endif

            <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Functions</p>
            <a href="{{ route('course.index') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-text text-xs mr-2"></i>
                Courses
            </a>

            <a href="{{ route('subject.index') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-text text-xs mr-2"></i>
                Subjects
            </a>
        </div>
        <!-- end sidebar content -->
    </nav>
    <!-- end sidbar -->