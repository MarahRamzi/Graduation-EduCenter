@extends('admin.master')

@section('title', 'Edit About| ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit About</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/abouts/'.$about->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $about->title }}" />
    </div>

    <div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" placeholder="Description" class="form-control" value="{{$about->description}}" />
    </div>



    <div class="mb-3">
        <label>btn_text</label>
        <input type="text" name="btn_text" placeholder="btn_text" class="form-control" value="{{ $about->btn_text }}" />
    </div>

    <div class="mb-3">
        <label>btn_link</label>
        <input type="text" name="btn_link" placeholder="btn_link" class="form-control" value="{{ $about->btn_link }}" />
    </div>


    <button class="btn btn-success px-5">Update</button>


</form>

@stop
