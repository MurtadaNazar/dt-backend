@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-body">
                        @include('admin.admin-dashboard')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
