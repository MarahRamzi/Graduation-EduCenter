@extends('admin.master')

@section('title', 'Events | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Event</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Location</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($events as $event)
        <tr>
            <td>{{ $event->id}}</td>
            <td><img width="80" src="{{ asset('uploads/events/'.$event->image) }}" alt=""></td>
            <td>{{ $event->location}}</td>
            <td>{{ $event->description}}</td>

            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.events.edit', $event->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  {{ $events->links() }}
@stop
