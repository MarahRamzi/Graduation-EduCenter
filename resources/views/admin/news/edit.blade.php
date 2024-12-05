@extends('admin.master')

@section('title', 'Edit News| ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit News</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.news.update', $new->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/news/'.$new->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="text" name="date" placeholder="date" class="form-control" value="{{ $new->title }}" />
    </div>

    <div class="mb-3">
        <label>Auther</label>
        <input type="text" name="auther" placeholder="auther" class="form-control" value="{{ $new->title }}" />
    </div>


    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $new->title }}" />
    </div>

    <div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" placeholder="Description" class="form-control" value="{{$new->description}}" />
    </div>



    <div class="mb-3">
        <label>btn_text</label>
        <input type="text" name="btn_text" placeholder="btn_text" class="form-control" value="{{ $new->btn_text }}" />
    </div>

    <div class="mb-3">
        <label>btn_link</label>
        <input type="text" name="btn_link" placeholder="btn_link" class="form-control" value="{{ $new->btn_link }}" />
    </div>


    <button class="btn btn-success px-5">Update</button>


</form>

@stop
