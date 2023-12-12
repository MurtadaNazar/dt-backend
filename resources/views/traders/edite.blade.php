@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm rounded-lg p-4" style="background-color: #f8f9fa;">
            <h2 class="text-primary fw-bold mb-4">Edit Trader</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('traders.update', $trader->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label text-muted">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $trader->name }}">
                </div>

                <div class="mb-3">
                    <label for="balance" class="form-label text-muted">Balance:</label>
                    <input type="text" class="form-control" id="balance" name="balance" value="{{ $trader->balance }}">
                </div>

                <div class="mb-6">
                    <label for="imgurl" class="form-label text-muted">Trader Picture:</label>
                    <div class="col-md-4 pb-2">
                        @if ($trader->imgurl)
                            <img src="{{ asset('upload/trader_images/' . $trader->imgurl) }}"
                                class="rounded-circle img-fluid" alt="Trader Picture" style="width: 128px; height: 128px;">
                        @else
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle img-fluid"
                                alt="Trader Picture">
                        @endif
                    </div>
                    <input type="file" class="form-control" id="imgurl" name="imgurl"
                        style="background-color: #ffffff;">
                    @error('imgurl')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Trader</button>
                </div>
            </form>
        </div>
    </div>
@endsection
