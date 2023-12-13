@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-primary fw-bold mb-4">Create Statistic</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('statistics.store') }}" class="bg-light p-4 rounded-3"
            style="border: 2px solid #3498db;">

            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="monthlyWithDrawal" class="form-label text-muted">Monthly Withdrawal:</label>
                        <input type="number" name="monthlyWithDrawal" id="monthlyWithDrawal" class="form-control"
                            min="0" style="border: 2px solid #3498db;">
                    </div>

                    <div class="mb-3">
                        <label for="monthlyIbWithDrawal" class="form-label text-muted">Monthly IB Withdrawal:</label>
                        <input type="number" name="monthlyIbWithDrawal" id="monthlyIbWithDrawal" class="form-control"
                            min="0" style="border: 2px solid #3498db;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="monthlyTradingRange" class="form-label text-muted">Monthly Trading Range:</label>
                        <input type="number" name="monthlyTradingRange" id="monthlyTradingRange" class="form-control"
                            min="0" style="border: 2px solid #3498db;">
                    </div>

                    <div class="mb-3">
                        <label for="monthlyActiveClient" class="form-label text-muted">Monthly Active Client:</label>
                        <input type="number" name="monthlyActiveClient" id="monthlyActiveClient" class="form-control"
                            min="0" style="border: 2px solid #3498db;">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary"
                    style="background-color: #3498db; border-color: #3498db;">Create Statistic
                </button>
            </div>
        </form>
    </div>
@endsection
