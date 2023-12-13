@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-10">
                <h2 class="fw-bold display-6 text-primary">Settings</h2>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('settings.create') }}" class="btn btn-primary">Create Setting</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-striped table-hover text-center align-items-center">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">Desposit Bonus</th>
                    <th scope="col">Add Image</th>
                    <th scope="col">Offices Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settings as $setting)
                    <tr>
                        <td class="fs-5">{{ $setting->despositBonus }}</td>
                        <td>
                            @if ($setting->addImageUrl)
                                <img src="{{ asset('upload/settings/addImageUrl/' . $setting->addImageUrl) }}"
                                    class="rounded-circle" alt="Add Image" style="width: 40px; height: 40px;">
                            @else
                                <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle" alt="Add Image"
                                    style="width: 40px; height: 40px;">
                            @endif
                        </td>
                        <td>
                            @if ($setting->officesImageUrl)
                                <img src="{{ asset('upload/settings/officesImageUrl/' . $setting->officesImageUrl) }}"
                                    class="rounded-circle" alt="Offices Image" style="width: 40px; height: 40px;">
                            @else
                                <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle" alt="Offices Image"
                                    style="width: 40px; height: 40px;">
                            @endif
                        </td>

                        <td class="d-flex justify-content-center">
                            <a href="{{ route('settings.show', $setting->id) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye"></i> Details
                            </a>
                            <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
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
@endsection
