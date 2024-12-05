@extends('admin.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between">
        <h1 class="h3 mb-4 text-gray-800">Create New User</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-success mb-3">
            <i class="fas fa-users"></i> All Users
        </a>
    </div>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <!-- Form to create a new user -->
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
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
       
        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end mt-2">
        <button type="submit" class="btn btn-primary">Create User</button>
        </div>
    </form>

@stop
