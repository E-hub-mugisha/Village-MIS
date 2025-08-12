@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">👥 Manage Users</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add User Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">➕ Add User</button>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge bg-secondary">{{ ucfirst($user->role) }}</span></td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <!-- Show -->
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showUserModal{{ $user->id }}">👁</button>

                            <!-- Edit -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">✏️</button>

                            <!-- Delete -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this user?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️</button>
                            </form>
                        </td>
                    </tr>

                    <!-- 🔍 Show User Modal -->
                    <div class="modal fade" id="showUserModal{{ $user->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-info text-white">
                                    <h5 class="modal-title">👁 User Details</h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                                    <p><strong>Registered:</strong> {{ $user->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ✏️ Edit User Modal -->
                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">✏️ Edit User</h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Role</label>
                                            <select name="role" class="form-control" required>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="health_worker" {{ $user->role == 'health_worker' ? 'selected' : '' }}>Health Worker</option>
                                                <option value="village_official" {{ $user->role == 'village_official' ? 'selected' : '' }}>Village Official</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ➕ Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">➕ Add New User</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="health_worker">Health Worker</option>
                            <option value="village_official">Village Official</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
