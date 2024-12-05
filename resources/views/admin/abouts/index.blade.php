@extends('admin.master')

@section('title', 'Abouts | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All About</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>btn_text</th>
            <th>btn_link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($abouts as $about)
        <tr>
            <td>{{ $about->id}}</td>
            <td style="text-align: center">{{ $about->title}}</td>
            <td><img width="80" src="{{ asset('uploads/abouts/'.$about->image) }}" alt=""></td>
            <td>{{ $about->description}}</td>
            <td>{{ $about->btn_text}}</td>
            <td>{{ $about->btn_link}}</td>


            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.abouts.edit', $about->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  {{ $abouts->links() }}
@stop
