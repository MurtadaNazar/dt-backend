@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-primary fw-bold mb-4">Edit Setting</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.update', $setting->id) }}" enctype="multipart/form-data"
            class="bg-light p-4 rounded-3" style="border: 2px solid #3498db;">

            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-2">
                        @if ($setting->addImageUrl)
                            <img src="{{ asset('upload/settings/addImageUrl/' . $setting->addImageUrl) }}"
                                class="rounded-circle avatar-preview me-3" alt="Add Image"
                                style="width: 128px; height: 128px; border: 2px solid #3498db;">
                        @else
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle avatar-preview me-3"
                                alt="Add Image" style="width: 128px; height: 128px; border: 2px solid #3498db;">
                        @endif

                        <label for="$addImageUrl" class="form-label text-muted">Add Image:</label>
                    </div>
                    <input type="file" class="form-control" id="$addImageUrl" name="$addImageUrl" accept="image/*">
                    <small class="text-muted">Add Image: {{ $setting->addImageUrl }}</small>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-2">
                        @if ($setting->officesImageUrl)
                            <img src="{{ asset('upload/settings/officesImageUrl/' . $setting->officesImageUrl) }}"
                                class="rounded-circle avatar-preview me-3" alt="Offices Image"
                                style="width: 128px; height: 128px; border: 2px solid #3498db;">
                        @else
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle avatar-preview me-3"
                                alt="offices Image" style="width: 128px; height: 128px; border: 2px solid #3498db;">
                        @endif

                        <label for="$officesImageUrl" class="form-label text-muted">offices Image:</label>
                    </div>
                    <input type="file" class="form-control" id="$officesImageUrl" name="$officesImageUrl"
                        accept="image/*">
                    <small class="text-muted">offices Image: {{ $setting->officesImageUrl }}</small>
                </div>


                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="despositBonus" class="form-label text-muted">Desposit Bonus:</label>
                        <input type="number" name="despositBonus" id="despositBonus" class="form-control"
                            value="{{ $setting->despositBonus }}" style="border: 2px solid #3498db;">
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #3498db; border-color: #3498db;">Update Setting</button>
                </div>

        </form>
    </div>
@endsection
