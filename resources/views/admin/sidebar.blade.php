<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('site.index') }}">
            <i class="fas fa-fw fa-heart"></i>
            <span>{{ __('admin.public_site') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-heart"></i>
                <span>{{ __('admin.dashboard') }}</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">


    <!-- Categories Menu -->
    @if (Auth::user()->hasAbility('all_categories') || Auth::user()->hasAbility('add_category'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                aria-expanded="true" aria-controls="collapseCategories">
                <i class="fas fa-tags"></i>
                <span>{{ __('admin.categories') }}</span>
            </a>
            <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if (Auth::user()->hasAbility('all_categories'))
                        <a class="collapse-item" href="{{ route('admin.categories.index') }}">All Categories</a>
                    @endif
                    @if (Auth::user()->hasAbility('add_category'))
                        <a class="collapse-item" href="{{ route('admin.categories.create') }}">Add New</a>
                    @endif
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Teachers Menu -->
    @if (Auth::user()->hasAbility('all_teachers'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeacher"
                aria-expanded="true" aria-controls="collapseTeacher">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>{{ __('admin.teacher') }}</span>
            </a>
            <div id="collapseTeacher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.teachers.index') }}">All Teacher</a>
                    <a class="collapse-item" href="{{ route('admin.teachers.create') }}">Add New</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Courses Menu -->
    @if (Auth::user()->hasAbility('all_courses')  || Auth::user()->hasAbility('add_course') )
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourses"
                aria-expanded="true" aria-controls="collapseCourses">
                <i class="fas fa-book-open"></i>
                <span>{{ __('admin.courses') }}</span>
            </a>
            <div id="collapseCourses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if (Auth::user()->hasAbility('all_courses'))
                    <a class="collapse-item" href="{{ route('admin.courses.index') }}">All Courses</a>
                    @endif
                    @if (Auth::user()->hasAbility('add_course'))
                    <a class="collapse-item" href="{{ route('admin.courses.create') }}">Add New</a>
                    @endif
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Abouts Menu -->
    @if (Auth::user()->hasAbility('all_abouts'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
                aria-expanded="true" aria-controls="collapseAbout">
                <i class="fas fa-fw fa-cog"></i>
                <span>{{ __('admin.about') }}</span>
            </a>
            <div id="collapseAbout" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.abouts.index') }}">All About</a>
                    <a class="collapse-item" href="{{ route('admin.abouts.create') }}">Add New</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Events Menu -->
    @if (Auth::user()->hasAbility('all_events'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent"
                aria-expanded="true" aria-controls="collapseEvent">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ __('admin.event') }}</span>
            </a>
            <div id="collapseEvent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.events.index') }}">All Event</a>
                    <a class="collapse-item" href="{{ route('admin.events.create') }}">Add New</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- News Menu -->
    @if (Auth::user()->hasAbility('all_newss'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLates_New"
                aria-expanded="true" aria-controls="collapseLates_New">
                <i class="fas fa-newspaper"></i>
                <span>{{ __('admin.lates_new') }}</span>
            </a>
            <div id="collapseLates_New" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.news.index') }}">All News</a>
                    <a class="collapse-item" href="{{ route('admin.news.create') }}">Add New</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Users Menu -->
    @if (Auth::user()->hasAbility('all_users'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i>
                <span>{{ __('admin.user') }}</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Roles Menu -->
    @if (Auth::user()->hasAbility('all_roles'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.roles.index') }}">
                <i class="fas fa-user-shield"></i>
                <span>{{ __('admin.roles') }}</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
