@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-10">
                <h2 class="fw-bold display-6 text-primary">Statistics</h2>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('statistics.create') }}" class="btn btn-primary">Create Statistic</a>
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
                    <th scope="col">Monthly Withdrawal</th>
                    <th scope="col">Monthly IB Withdrawal</th>
                    <th scope="col">Monthly Trading Range</th>
                    <th scope="col">Monthly Active Client</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statistics as $statistic)
                    <tr>
                        <td class="fs-5">{{ $statistic->monthlyWithDrawal }}</td>
                        <td class="fs-5">{{ $statistic->monthlyIbWithDrawal }}</td>
                        <td class="fs-5">{{ $statistic->monthlyTradingRange }}</td>
                        <td class="fs-5">{{ $statistic->monthlyActiveClient }}</td>

                        <td class="d-flex justify-content-center">
                            <a href="{{ route('statistics.show', $statistic->id) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye"></i> Details
                            </a>
                            <a href="{{ route('statistics.edit', $statistic->id) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('statistics.destroy', $statistic->id) }}" method="POST"
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
