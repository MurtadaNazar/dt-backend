@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Comment Details</h3>
                    </div>
                    <div class="card-body" style="background-color: #ecf0f1;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background-color: #ecf0f1;">
                                <strong class="text-primary">Name:</strong> {{ $comment->name }}
                            </li>
                            <li class="list-group-item" style="background-color: #ecf0f1;">
                                <strong class="text-primary">Comment:</strong> {{ $comment->text }}
                            </li>
                            <li class="list-group-item" style="background-color: #ecf0f1;">
                                <strong class="text-primary">Date:</strong> {{ $comment->date->format('d/m/Y') }}
                            </li>
                            <li class="list-group-item" style="background-color: #ecf0f1;">
                                <strong class="text-primary">Stars:</strong> {{ $comment->starts }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @if ($comment->avatar_url)
                    <img src="{{ asset('upload/comments_avater/' . $comment->avatar_url) }}"
                        class="rounded-circle avatar-preview mb-3" alt="Trader Image"
                        style="width: 128px; height: 128px; border: 4px solid #3498db;">
                @else
                    <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle avatar-preview mb-3"
                        alt="Trader Image" style="width: 128px; height: 128px; border: 4px solid #3498db;">
                @endif
            </div>
        </div>

        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning">Edit comment</a>
    </div>
@endsection
