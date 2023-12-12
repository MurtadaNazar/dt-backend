@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-10">
                <h2 class="fw-bold display-6 text-primary">Trader's</h2>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('traders.create') }}" class="btn btn-primary">Create Trader</a>
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
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($traders as $trader)
                    <tr>
                        <td>
                            @if ($trader->imgurl)
                                <img src="{{ asset('upload/trader_images/' . $trader->imgurl) }}" class="rounded-circle"
                                    alt="Trader Image" style="width: 40px; height: 40px;">
                            @else
                                <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle" alt="Trader Image"
                                    style="width: 40px; height: 40px;">
                            @endif
                        </td>
                        <td class="fs-5">{{ $trader->name }}</td>
                        <td class="fs-5">{{ $trader->balance }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('traders.show', $trader->id) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye"></i> Details
                            </a>
                            <a href="{{ route('traders.edit', $trader->id) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('traders.destroy', $trader->id) }}" method="POST"
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
    @endsection
