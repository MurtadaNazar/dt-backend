@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-primary fw-bold mb-4">Create Setting</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data" class="bg-light p-4 rounded-3"
            style="border: 2px solid #3498db;">

            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="despositBonus" class="form-label text-muted">Desposit Bonus:</label>
                            <input type="number" name="despositBonus" id="despositBonus" class="form-control"
                                min="0" style="border: 2px solid #3498db;">
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle avatar-preview me-3"
                                alt="Add Image" style="width: 40px; height: 40px; border: 2px solid #3498db;">
                            <label for="addImageUrl" class="form-label text-muted">Add Image:</label>
                        </div>
                        <input type="file" class="form-control" id="addImageUrl" name="addImageUrl" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle avatar-preview me-3"
                                alt="Offices Image" style="width: 40px; height: 40px; border: 2px solid #3498db;">
                            <label for="officesImageUrl" class="form-label text-muted">Offices Image:</label>
                        </div>
                        <input type="file" class="form-control" id="officesImageUrl" name="officesImageUrl"
                            accept="image/*">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #3498db; border-color: #3498db;">Create Setting
                    </button>
                </div>
        </form>
    </div>
@endsection
