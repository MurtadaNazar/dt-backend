@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-10">
                <h2 class="fw-bold display-6 text-primary">Comments</h2>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('comments.create') }}" class="btn btn-primary">Create Comment</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover text-center align-items-center">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">Comment Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Stars</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>
                                @if ($comment->avatar_url)
                                    <img src="{{ asset('upload/comments_avater/' . $comment->avatar_url) }}"
                                        class="rounded-circle" alt="Trader Image" style="width: 40px; height: 40px;">
                                @else
                                    <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle" alt="Trader Image"
                                        style="width: 40px; height: 40px;">
                                @endif
                            </td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->text }}</td>
                            <td>{{ $comment->starts }}</td>
                            <td>{{ $comment->date->format('d/m/Y') }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-info me-2">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
