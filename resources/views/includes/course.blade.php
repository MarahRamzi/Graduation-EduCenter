
@foreach ($courses as $item)
<div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-0 shadow-sm rounded-3 hover-shadow">
        <img class="card-img-top rounded-top" src="{{ asset('uploads/courses/' . $item->image) }}"
            alt="{{ $item->title }} thumbnail" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <ul class="list-inline mb-3">
                <li class="list-inline-item">
                    <i class="ti-calendar me-1 text-primary"></i>
                    {{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}
                </li>
                <!-- Display the badge for the number of enrolled users -->
                <li class="list-inline-item">
                    <span class="badge bg-success">{{ $item->students_count }} Enrolled</span>
                </li>
            </ul>
            <a href="course-single.html" class="text-decoration-none">
                <h4 class="card-title text-dark">{{ $item->title }}</h4>
            </a>
            <p class="card-text text-muted">
                {{ Str::limit($item->description, 100) }}
            </p>
            <!-- Display teacher's name -->
            <p class="text-muted">Instructor: {{ $item->teacher->name ?? 'N/A' }}</p>
            
            @if (auth()->check() && ( auth()->user()->hasRole(Role::ROLE_STUDENT) || auth()->user()->hasAbility('enroll_courses')))
                @if ($item->is_enrolled)
                    <button class="btn btn-secondary btn-sm">Enrolled</button>
                @else
                    <form action="{{ route('courses.enroll', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">{{ $item->btn_text }}</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>
@endforeach


