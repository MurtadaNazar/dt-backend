@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>Statistic Details</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Monthly Withdrawal :</strong> {{ $statistics->monthlyWithDrawal }}
                            </li>
                            <li class="list-group-item">
                                <strong>Monthly IB Withdrawal :</strong> {{ $statistics->monthlyIbWithDrawal }}
                            </li>
                            <li class="list-group-item">
                                <strong>Monthly Trading Range :</strong> {{ $statistics->monthlyTradingRange }}
                            </li>
                            <li class="list-group-item">
                                <strong>Monthly Active Client :</strong> {{ $statistics->monthlyActiveClient }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ route('statistics.edit', $statistics->id) }}" class="btn btn-warning">Edit Statistic</a>
        </div>
    </div>
@endsection
