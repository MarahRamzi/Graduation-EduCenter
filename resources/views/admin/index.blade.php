@extends('admin.master')


@section('title', 'Dashboard | ' . config('app.name'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>



    <!-- Earnings (Monthly) Card Example -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($m_earning) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Earnings (Monthly) Card Example -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($y_earning) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Earnings (Monthly) Card Example -->
    @if (
        $user->hasAbility('all_categories') ||
            $user->hasAbility('all_teachers') ||
            $user->hasAbility('all_events') ||
            $user->hasAbility('all_courses'))
        <div class="row">



            @if ($user->hasAbility('all_categories'))
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Categories</div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $c_count }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if ($user->hasAbility('all_teachers'))
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route('admin.teachers.index') }}" class="text-decoration-none">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Teachers
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $t_count }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if ($user->hasAbility('all_students'))
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Students
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $s_count }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if ($user->hasAbility('all_courses'))
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route('admin.courses.index') }}" class="text-decoration-none">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Courses</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $co_count }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book-open fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if ($user->hasAbility('all_events'))
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route('admin.events.index') }}" class="text-decoration-none">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Events</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $e_count }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    @endif
    @if ($enrolledCourses->isNotEmpty())
        <div class="card p-4 border-0 shadow-sm rounded-3 mb-5">
            <div class="card-body">
                <h3 class="mb-4">Your Enrolled Courses</h3>
                <div class="row">
                    @foreach ($enrolledCourses as $course)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="card p-0 border-0 shadow-sm rounded-3 hover-shadow">
                                <img class="card-img-top rounded-top" src="{{ asset('uploads/courses/' . $course->image) }}"
                                    alt="{{ $course->title }} thumbnail" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <ul class="list-inline mb-3">
                                        <li class="list-inline-item">
                                            <i class="ti-calendar me-1 text-primary"></i>
                                            {{ $course->created_at ? $course->created_at->format('M d, Y') : 'N/A' }}
                                        </li>
                                    </ul>
                                    <h4 class="card-title text-dark">{{ $course->title }}</h4>
                                    <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                                    <form action="{{ route('courses.removeEnrollment', $course->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove Enrollment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @elseif ($user->hasRole(Role::ROLE_STUDENT) || ($user->hasAbility('enroll_courses') && !$user->hasRole(Role::ROLE_ADMIN) ))
        <div class="alert alert-info text-center mb-5">
            You are not enrolled in any courses.
        </div>
    @endif

    @if ($teachingCourses->isNotEmpty())
        <div class="card p-4 border-0 shadow-sm rounded-3 mb-5">
            <div class="card-body">
                <h3 class="mb-4 text-center">Your Teaching Courses</h3>
                <div class="row gy-4">
                    @foreach ($teachingCourses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="card p-0 border-0 shadow-sm rounded-3">
                                <!-- Course Image -->
                                <img class="card-img-top rounded-top"
                                    src="{{ asset('uploads/courses/' . $course->image) }}"
                                    alt="{{ $course->title }} thumbnail" style="height: 200px; object-fit: cover;">

                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- Course Date -->
                                    <ul class="list-inline mb-2">
                                        <li class="list-inline-item">
                                            <i class="ti-calendar me-1 text-primary"></i>
                                            {{ $course->created_at ? $course->created_at->format('M d, Y') : 'N/A' }}
                                        </li>
                                    </ul>

                                    <!-- Course Title -->
                                    <h5 class="card-title text-dark fw-bold">{{ $course->title }}</h5>

                                    <!-- Course Description -->
                                    <p class="card-text text-muted">
                                        {{ Str::limit($course->description, 100) }}
                                    </p>

                                    <!-- Action Button -->
                                    <button class="btn btn-secondary btn-sm w-100">You teach it!</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @elseif($user->role_id == Role::ROLE_TEACHER)
        <div class="alert alert-info text-center mb-5">
            You are not teaching any courses.
        </div>
    @endif







    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Major</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$m_count}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-heart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@stop
