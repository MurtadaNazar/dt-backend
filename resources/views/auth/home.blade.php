@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h1 class="mb-3 text-primary">{{ __('Welcome,') }} {{ Auth::user()->name }}</h1>
                            <h2 class="text-info">Dashboard</h2>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                @include('admin.admin-dashboard', [
                                    'title' => 'Number of Comments',
                                    'total' => $totalComments,
                                    'color' => 'bg-primary',
                                ])
                            </div>

                            <div class="col-md-4">
                                @include('admin.admin-dashboard', [
                                    'title' => 'Traders',
                                    'total' => $totalTraders,
                                    'color' => 'bg-success',
                                ])
                            </div>

                            <div class="col-md-4">
                                @include('admin.admin-dashboard', [
                                    'title' => 'Agents',
                                    'total' => $totalAgents,
                                    'color' => 'bg-warning',
                                ])
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                @include('admin.admin-dashboard', [
                                    'title' => 'Latest Comments',
                                    'latestComments' => $latestComments,
                                    'color' => 'bg-info',
                                ])
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-md-12">
                                @yield('additional_content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
