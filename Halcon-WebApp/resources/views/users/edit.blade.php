@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="Sales" {{ $user->role == 'Sales' ? 'selected' : '' }}>Sales</option>
                <option value="Purchasing" {{ $user->role == 'Purchasing' ? 'selected' : '' }}>Purchasing</option>
                <option value="Warehouse" {{ $user->role == 'Warehouse' ? 'selected' : '' }}>Warehouse</option>
                <option value="Route" {{ $user->role == 'Route' ? 'selected' : '' }}>Route</option>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

