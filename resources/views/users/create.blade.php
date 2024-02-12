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
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label text-muted">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name"
                        required value="{{ old('name') }}" autocomplete="false">
                </div>
                <div class="col-md-6">
                    <label for="userName" class="form-label text-muted">User Name:</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter User Name"
                        required value="{{ old('userName') }}" autocomplete="false">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label text-muted" required value="{{ old('password') }}"
                        autocomplete="false">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                        required value="{{ old('password') }}" autocomplete="false">
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label text-muted">Confirm Password:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" required value="{{ old('password_confirmation') }}"
                        autocomplete="false">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="type" class="form-label text-muted">User Type:</label>
                    <select name="type" id="type" class="form-control">
                        <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>
                            Agent
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label text-muted">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="faceBook" class="form-label text-muted">Facebook URL:</label>
                    <input type="text" name="faceBook" id="faceBook" class="form-control"
                        placeholder="Enter Facebook URL" value="{{ old('faceBook') }}" autocomplete="false">
                </div>
                <div class="col-md-6">
                    <label for="instagram" class="form-label text-muted">Instagram URL:</label>
                    <input type="text" name="instagram" id="instagram" class="form-control"
                        placeholder="Enter Instagram URL" value="{{ old('instagram') }}" autocomplete="false">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telegram" class="form-label text-muted">Telegram URL:</label>
                    <input type="text" name="telegram" id="telegram" class="form-control"
                        placeholder="Enter Telegram URL" value="{{ old('telegram') }}" autocomplete="false">
                </div>
                <div class="col-md-6">
                    <label for="youTube" class="form-label text-muted">YouTube URL:</label>
                    <input type="text" name="youTube" id="youTube" class="form-control"
                        placeholder="Enter YouTube URL" value="{{ old('youTube') }}" autocomplete="false">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imageUrl" class="form-label text-muted">Profile Picture:</label>
                    <input type="file" name="imageUrl" id="imageUrl" class="form-control"
                        value="{{ old('imageUrl') }}" {{-- // old file apper after reload  --}}>
                </div>
            </div>


            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection
