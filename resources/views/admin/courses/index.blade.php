@extends('admin.master')

@section('title', 'Courses | ' . env('APP_NAME'))


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Courses</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>btn_text</th>
                <th>btn_link</th>
                <th>Teacher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td><img width="80" src="{{ asset('uploads/courses/' . $course->image) }}" alt=""></td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->btn_text }}</td>
                    <td>{{ $course->btn_link }}</td>
                    <td>{{ $course->teacher->name ?? 'Not Assigned!' }}</td>
                    <td class="w-auto">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.courses.edit', $course->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                        @if ($user->hasAbility('assign_teacher') )

                        <button class="btn btn-sm btn-success" onclick="assignTeacher('{{ $course->title }}', {{ $course->id }}, {{ $course->teacher_id }})">
                            <i class="fas fa-chalkboard-teacher"></i>Assign
                        </button>
                        @endif
                    </td>
                </tr>
            @empty
            <td colspan="8" class="text-center">No records found</td>

            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-3">
        {{ $courses->links() }}
    </div>

    <!-- Modal for Assigning Teacher -->
    <div class="modal fade" id="assignTeacherModal" tabindex="-1" aria-labelledby="assignTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignTeacherModalLabel">Assign Teacher to Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="assignTeacherForm" action="{{ route('admin.courses.assignTeacher') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="course_id" id="course_id">
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Select Teacher</label>
                            <select name="teacher_id" id="teacher_id" class="form-select">
                                <option value="">Choose a Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        // Function to set course name, course id, and teacher info in modal
        function assignTeacher(courseName, courseId, currentTeacherId) {
            // Set course id in the hidden input field
            document.getElementById('course_id').value = courseId;

            // Set course name in the modal title
            document.getElementById('assignTeacherModalLabel').innerText = 'Assign Teacher to ' + courseName;

            // Set teacher id in the select dropdown (if exists)
            document.getElementById('teacher_id').value = currentTeacherId || '';
            
            // Show the modal
            var assignTeacherModal = new bootstrap.Modal(document.getElementById('assignTeacherModal'));
            assignTeacherModal.show();
        }
    </script>
@endsection
