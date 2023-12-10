@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-primary fw-bold">Create User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">

            @csrf

            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle" alt="Profile Picture">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label text-muted">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="userName" class="form-label text-muted">User Name:</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter User Name"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label text-muted">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label text-muted">Confirm Password:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" required>
                </div>
            </div>

            <div class="form-check mb-3">
                <label class="form-check-label text-muted" for="type">User Type:</label>
                <input type="checkbox" class="form-check-input" id="type" name="type" value="2" required>
                <label class="form-check-label text-muted" for="type">Check if the user is an Agent</label>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label text-muted">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="faceBook" class="form-label text-muted">Facebook URL:</label>
                    <input type="text" name="faceBook" id="faceBook" class="form-control"
                        placeholder="Enter Facebook URL">
                </div>
                <div class="col-md-6">
                    <label for="instagram" class="form-label text-muted">Instagram URL:</label>
                    <input type="text" name="instagram" id="instagram" class="form-control"
                        placeholder="Enter Instagram URL">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telegram" class="form-label text-muted">Telegram URL:</label>
                    <input type="text" name="telegram" id="telegram" class="form-control"
                        placeholder="Enter Telegram URL">
                </div>
                <div class="col-md-6">
                    <label for="youTube" class="form-label text-muted">YouTube URL:</label>
                    <input type="text" name="youTube" id="youTube" class="form-control"
                        placeholder="Enter YouTube URL">
                </div>
            </div>
            <div class="mb-3">
                <label for="imageUrl" class="form-label text-muted">Profile Picture:</label>
                <input type="file" class="form-control" id="imageUrl" name="imageUrl" accept="image/*">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection
