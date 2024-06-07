@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User List</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add User</a>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
