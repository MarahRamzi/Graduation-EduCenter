@extends('admin.master')

@section('title', 'Edit teacher | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Teacher</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/teachers/'.$teacher->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label> Name </label>
        <input type="text" name="name" placeholder="Name Teacher" class="form-control" value="{{ $teacher->name }}" />
    </div>



    <div class="mb-3">
        <label>Major</label>
        <input type="text" name="major" placeholder="major" class="form-control" value="{{ $teacher->major}}" />
    </div>



    <div class="mb-3">
        <label>Category Name</label>
        <select name="category_id" class="form-control">
            <option value="">Select</option>


            @foreach ($categories as $categorie)
                <option {{ $teacher->categorie_id == $categorie->id ? 'selected' : '' }} value="{{ $categorie->id }}">{{$categorie->name_major}}</option>
            @endforeach
        </select>
    </div>


    @if(Auth::user()->hasAbility('edit_teacher'))
    <button class="btn btn-success px-5">Update</button>
    @endif


</form>

@stop
