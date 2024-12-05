@extends('admin.master')

@section('title', 'Edit Event| ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Event</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/abouts/'.$event->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" placeholder="location" class="form-control" value="{{ $event->location}}" />
    </div>

    <div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" placeholder="Description" class="form-control" value="{{$event->description}}" />
    </div>


    <button class="btn btn-success px-5">Update</button>


</form>

@stop
