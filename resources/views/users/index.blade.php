@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-10">
                <h2 class="fw-bold display-6 text-primary">Users</h2>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-striped table-hover text-center align-items-center">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->status == '1')
                        <tr>
                            <td>
                                @if ($user->imageUrl)
                                    <img src="{{ asset('upload/admin_images/' . $user->imageUrl) }}" class="rounded-circle"
                                        alt="User Image" style="width: 40px; height: 40px;">
                                @else
                                    <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle" alt="User Image"
                                        style="width: 40px; height: 40px;">
                                @endif
                            </td>
                            <td class="fs-5">{{ $user->name }}</td>
                            <td class="fs-5">{{ $user->userName }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info me-2">
                                    <i class="fas fa-eye"></i> Details
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div class="row mt-4">
            <div class="col-md-12">
                <button class="btn btn-secondary" onclick="showInactiveUsers()">Show Inactive Users</button>
            </div>
        </div>

        <!-- Add table for inactive users -->
        <div id="inactiveUsersTable" class="row mt-4" style="display: none;">
            <div class="col-md-12">
                <h2 class="fw-bold display-6 text-primary">Inactive Users</h2>
                <table class="table table-striped table-hover text-center align-items-center">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->status == '0')
                                <tr>
                                    <td>
                                        @if ($user->imageUrl)
                                            <img src="{{ asset('upload/admin_images/' . $user->imageUrl) }}"
                                                class="rounded-circle" alt="User Image" style="width: 40px; height: 40px;">
                                        @else
                                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle"
                                                alt="User Image" style="width: 40px; height: 40px;">
                                        @endif
                                    </td>
                                    <td class="fs-5">{{ $user->name }}</td>
                                    <td class="fs-5">{{ $user->userName }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info me-2">
                                            <i class="fas fa-eye"></i> Details
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showInactiveUsers() {
            document.getElementById('inactiveUsersTable').style.display = 'block';
        }
    </script>
@endsection
