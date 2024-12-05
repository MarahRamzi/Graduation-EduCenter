@extends('admin.master')

@section('title', 'Teachers | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Teacher</h1>

    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif
<form method="GET" action="{{ route('admin.teachers.index') }}">
    <div class="d-flex justify-content-end mb-3 ">
        <select name="category_name" class="form-select w-auto" aria-label="Select Category">
            <option value="">All Categories</option>
            
            @foreach($categories as $category)
                <option value="{{ $category->name_major }}" 
                    {{ request('category_name') == $category->name_major ? 'selected' : '' }}>
                    {{ $category->name_major }} 
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary ml-2">
            <i class="fa fa-search"></i> Search
        </button>
    </div>
</form>





    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Major</th>
                <th>Category Name</th>
                {{-- <th>Created At</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td><img width="80" src="{{ asset('uploads/teachers/' . $teacher->image) }}" alt=""></td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->major }}</td>
                    <td>{{ $teacher->category->name_major }}</td>


                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.teachers.edit', $teacher->id) }}"><i
                                class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $teachers->links() }}
@stop
