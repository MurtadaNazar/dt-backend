@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>Trader Details</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $trader->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Balance:</strong> {{ $trader->balance }}
                            </li>
                            <li class="list-group-item">
                                <strong>Created at:</strong> {{ $trader->created_at->format('d/m/Y H:i:s') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Updated at:</strong> {{ $trader->updated_at->format('d/m/Y H:i:s') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @if ($trader->imgurl)
                    <img src="{{ asset('upload/trader_images/' . $trader->imgurl) }}" class="rounded-circle img-fluid"
                        alt="Trader Picture" style="width: 128px; height: 128px;">
                @else
                    <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle img-fluid" alt="Profile Picture">
                @endif
            </div>
        </div>

        <a href="{{ route('traders.edit', $trader->id) }}" class="btn btn-warning">Edit Trader</a>
    </div>
@endsection
