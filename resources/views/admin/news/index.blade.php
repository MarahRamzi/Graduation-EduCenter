@extends('admin.master')

@section('title', 'News | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All News</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Date</th>
            <th>Auther</th>
            <th>Title</th>
            <th>Description</th>
            <th>btn_text</th>
            <th>btn_link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($n as $news)
        <tr>
            <td>{{$news->id}}</td>
            <td><img width="80" src="{{ asset('uploads/news/'.$news->image) }}" alt=""></td>
            <td>{{ $news->date}}</td>
            <td>{{ $news->auther}}</td>
            <td>{{ $news->title}}</td>
            <td>{{ $news->description}}</td>
            <td>{{$news->btn_text}}</td>
            <td>{{$news->btn_link}}</td>


            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.news.edit', $news->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $n->links() }}
@stop
