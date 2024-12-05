@extends('admin.master')

@section('title', 'Edit Courses | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Course</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/courses/'.$course->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $course->title}}" />
    </div>

    <div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" placeholder="Description" class="form-control" value="{{ $course->description }}" />
    </div>

    <div class="mb-3">
        <label>btn_text</label>
        <input type="text" name="btn_text" placeholder="Description" class="form-control" value="{{  $course->btn_text }}" />
    </div>

    <div class="mb-3">
        <label>btn_link</label>
        <input type="text" name="btn_link" placeholder="Description" class="form-control" value="{{  $course->btn_link }}" />
    </div>

   {{-- <div class="mb-3">
        <label>Register</label>
        <select name="registration_id" class="form-control">
            <option value="">Select</option>
            @foreach ($registration as $item)
                <option @selected($course->registration_id == $item->id) value="{{ $item->id }}"></option>
            @endforeach
        </select>
    </div> --}}


    <div class="mb-3">
        <label>Teacher</label>
        <select name="teacher_id" class="form-control">
            <option value="">Select</option>
            @foreach ($teachers as $teacher)
                <option  value="{{ $teacher->id }}" {{$course->teacher_id == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
            @endforeach
        </select>
    </div>

    @if(Auth::user()->hasAbility('edit_course'))
    <button class="btn btn-success px-5">Update</button>
    @endif


</form>

@stop
