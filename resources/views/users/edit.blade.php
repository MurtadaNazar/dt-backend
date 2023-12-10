@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm rounded-lg p-4" style="background-color: #f8f9fa;">
            <h2 class="text-primary fw-bold mb-4">Edit User</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label text-muted">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                        {{ Auth::user()->type !== 'Admin' ? 'disabled' : '' }} style="background-color: #ffffff;">
                </div>

                <div class="mb-3">
                    <label for="userName" class="form-label text-muted">User Name:</label>
                    <input type="text" class="form-control" id="userName" name="userName" value="{{ $user->userName }}"
                        disabled style="background-color: #cacaca;">
                </div>

                @if (Auth::user()->type === 'Admin' && Auth::user()->id !== $user->id)
                    <div class="mb-3">
                        <label for="status" class="form-label text-muted">Status:</label>
                        <select name="status" id="status" class="form-select" style="background-color: #ffffff;">
                            <option value="1" {{ $user->status === 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $user->status === 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                @endif

                <div class="mb-6">
                    <label for="imageUrl" class="form-label text-muted">Profile Picture:</label>

                    @if (auth()->user()->type === 'Admin')
                        <div class="col-md-4 pb-2">
                            @if ($user->imageUrl)
                                <img src="{{ asset('upload/admin_images/' . $user->imageUrl) }}"
                                    class="rounded-circle img-fluid" alt="Profile Picture"
                                    style="width: 128px; height: 128px;">
                            @else
                                <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle img-fluid"
                                    alt="Profile Picture">
                            @endif
                        </div>
                        <input type="file" class="form-control" id="imageUrl" name="imageUrl"
                            style="background-color: #ffffff;">
                        @error('imageUrl')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    @else
                        @if ($user->imageUrl)
                            <img src="{{ asset('upload/admin_images/' . $user->imageUrl) }}" class="rounded-circle mb-3"
                                alt="Profile Picture" style="width: 100px; height: 100px;">
                        @else
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle img-fluid"
                                alt="Profile Picture">
                        @endif
                    @endif
                </div>

                @if (auth()->user()->type === 'Admin')
                    <div class="form-group mb-3">
                        <label for="password" class="form-label text-muted">New Password:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            style="background-color: #ffffff;">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label text-muted">Confirm New Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            style="background-color: #ffffff;">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @else
                    <div class="mb-3">
                        <label for="faceBook" class="form-label text-muted">Facebook:</label>
                        <input type="text" class="form-control" id="faceBook" name="faceBook"
                            value="{{ $user->faceBook }}" style="background-color: #ffffff;">
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="form-label text-muted">Instagram:</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            value="{{ $user->instagram }}" style="background-color: #ffffff;">
                    </div>

                    <div class="mb-3">
                        <label for="telegram" class="form-label text-muted">Telegram:</label>
                        <input type="text" class="form-control" id="telegram" name="telegram"
                            value="{{ $user->telegram }}" style="background-color: #ffffff;">
                    </div>

                    <div class="mb-3">
                        <label for="youTube" class="form-label text-muted">YouTube:</label>
                        <input type="text" class="form-control" id="youTube" name="youTube"
                            value="{{ $user->youTube }}" style="background-color: #ffffff;">
                    </div>
                @endif

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
