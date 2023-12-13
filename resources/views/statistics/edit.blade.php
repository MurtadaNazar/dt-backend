@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-primary fw-bold mb-4">Edit Statistic</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('statistics.update', $statistics->id) }}" class="bg-light p-4 rounded-3"
            style="border: 2px solid #3498db;">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="monthlyWithDrawal" class="form-label text-muted">Monthly Withdrawal:</label>
                    <input type="number" name="monthlyWithDrawal" id="monthlyWithDrawal" class="form-control"
                        value="{{ $statistics->monthlyWithDrawal }}" style="border: 2px solid #3498db;">
                </div>
                <div class="col-md-6">
                    <label for="monthlyIbWithDrawal" class="form-label text-muted">Monthly IB Withdrawal:</label>
                    <input type="number" name="monthlyIbWithDrawal" id="monthlyIbWithDrawal" class="form-control"
                        value="{{ $statistics->monthlyIbWithDrawal }}" style="border: 2px solid #3498db;">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="monthlyTradingRange" class="form-label text-muted">Monthly Trading Range:</label>
                    <input type="number" name="monthlyTradingRange" id="monthlyTradingRange" class="form-control"
                        value="{{ $statistics->monthlyTradingRange }}" style="border: 2px solid #3498db;">
                </div>
                <div class="col-md-6">
                    <label for="monthlyActiveClient" class="form-label text-muted">Monthly Active Client:</label>
                    <input type="number" name="monthlyActiveClient" id="monthlyActiveClient" class="form-control"
                        value="{{ $statistics->monthlyActiveClient }}" style="border: 2px solid #3498db;">
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary"
                    style="background-color: #3498db; border-color: #3498db;">Update Statistic</button>
            </div>
        </form>
    </div>
@endsection
