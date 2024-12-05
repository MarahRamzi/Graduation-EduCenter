@extends('admin.master')

@section('title', 'Create Teacher | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create New Teacher</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif
 @include('admin.errors')

<form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
    </div>


    <div class="mb-3">
        <label> Name </label>
        <input type="text" name="name" placeholder="Name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="password">{{ __('Confirm Password') }}</label>
        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="mb-3">
        <label>Major</label>
        <input type="text" name="major" placeholder="major" class="form-control" />
    </div>


    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">Select</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name_major}}</option>
            @endforeach
        </select>
    </div>




    @if(Auth::user()->hasAbility('add_teacher'))
    <button class="btn btn-success px-5">Add</button>
    @endif


</form>

@stop
