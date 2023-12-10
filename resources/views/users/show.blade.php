@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>User Details</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $user->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>User Name:</strong> {{ $user->userName }}
                            </li>
                            <li class="list-group-item">
                                <strong>Status:</strong>
                                @if ($user->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <strong>Type:</strong>
                                @if ($user->type === 'Admin')
                                    <span class="badge bg-primary">Admin</span>
                                @else
                                    <span class="badge bg-info">Agent</span>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <strong>Created at:</strong> {{ $user->created_at->format('d/m/Y H:i:s') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Updated at:</strong> {{ $user->updated_at->format('d/m/Y H:i:s') }}
                            </li>
                        </ul>
                    </div>
                </div>

                @if ($user->faceBook || $user->instagram || $user->telegram || $user->youTube)
                    <div class="card mb-4">
                        <div class="card-header bg-warning text-dark">
                            <h3>Social Media</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @if ($user->faceBook)
                                    <li>
                                        <a href="{{ $user->faceBook }}" target="_blank" class="text-primary">
                                            <i class="fab fa-facebook-square"></i> Facebook
                                        </a>
                                    </li>
                                @endif
                                @if ($user->instagram)
                                    <li>
                                        <a href="{{ $user->instagram }}" target="_blank" class="text-danger">
                                            <i class="fab fa-instagram"></i> Instagram
                                        </a>
                                    </li>
                                @endif
                                @if ($user->telegram)
                                    <li>
                                        <a href="{{ $user->telegram }}" target="_blank" class="text-info">
                                            <i class="fab fa-telegram"></i> Telegram
                                        </a>
                                    </li>
                                @endif
                                @if ($user->youTube)
                                    <li>
                                        <a href="{{ $user->youTube }}" target="_blank" class="text-danger">
                                            <i class="fab fa-youtube"></i> YouTube
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                @if ($user->imageUrl)
                    <img src="{{ asset('upload/admin_images/' . $user->imageUrl) }}" class="rounded-circle img-fluid"
                        alt="Profile Picture" style="width: 128px; height: 128px;">
                @else
                    <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle img-fluid" alt="Profile Picture">
                @endif
            </div>
        </div>

        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit User</a>
    </div>
@endsection
