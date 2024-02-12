@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-primary fw-bold mb-4">Edit Comment</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('comments.update', $comment->id) }}" enctype="multipart/form-data"
            class="bg-light p-4 rounded-3" style="border: 2px solid #3498db;">

            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-2">
                        @if ($comment->avatar_url)
                            <img src="{{ asset('upload/comments_avater/' . $comment->avatar_url) }}"
                                class="rounded-circle avatar-preview me-3" alt="Trader Image"
                                style="width: 40px; height: 40px; border: 2px solid #3498db;">
                        @else
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle avatar-preview me-3"
                                alt="Trader Image" style="width: 40px; height: 40px; border: 2px solid #3498db;">
                        @endif

                        <label for="avatar_url" class="form-label text-muted">Commenter Avatar:</label>
                    </div>
                    <input type="file" class="form-control" id="avatar_url" name="avatar_url" accept="image/*">
                    <small class="text-muted">Current Avatar: {{ $comment->avatar_url }}</small>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label text-muted">Name of the commenter:</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name') || $comment->name }}" required style="border: 2px solid #3498db;">
                </div>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label text-muted">Comment Text:</label>
                <textarea name="text" id="text" class="form-control" rows="5" placeholder="Share your thoughts..."
                    required style="border: 2px solid #3498db;">{{ old('text') || $comment->text }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="starts" class="form-label text-muted">Stars:</label>
                    <input type="number" name="starts" id="starts" class="form-control"
                        value="{{ old('starts') || $comment->starts }}" style="border: 2px solid #3498db;">
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label text-muted">Date:</label>
                    <input type="date" name="date" id="date" class="form-control"
                        value="{{ old('date') || $comment->date }}" required style="border: 2px solid #3498db;">
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary"
                    style="background-color: #3498db; border-color: #3498db;">Update Comment</button>
            </div>

        </form>
    </div>
@endsection
