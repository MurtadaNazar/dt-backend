@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-primary fw-bold">Create Trader</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('traders.store') }}" enctype="multipart/form-data">

            @csrf

            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle" alt="Trader Picture">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label text-muted">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="balance" class="form-label text-muted">Balance:</label>
                    <input type="text" class="form-control" id="balance" name="balance"
                        placeholder="Enter Your balance" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="imgurl" class="form-label text-muted">Trader Picture:</label>
                <input type="file" class="form-control" id="imgurl" name="imgurl" accept="image/*">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Create Trader</button>
            </div>
        </form>
    </div>
@endsection
