@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>Setting Details</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Deposit Bonus:</strong> {{ $setting->depositBonus }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5>Add Image</h5>
                    </div>
                    <div class="card-body text-center">
                        @if ($setting->addImageUrl)
                            <img src="{{ asset('upload/settings/addImageUrl/' . $setting->addImageUrl) }}"
                                class="rounded-circle img-fluid" alt="Add Image" style="width: 128px; height: 128px;">
                        @else
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle img-fluid" alt="Add Image">
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5>Offices Image</h5>
                    </div>
                    <div class="card-body text-center">
                        @if ($setting->officesImageUrl)
                            <img src="{{ asset('upload/settings/officesImageUrl/' . $setting->officesImageUrl) }}"
                                class="rounded-circle img-fluid" alt="Offices Image" style="width: 128px; height: 128px;">
                        @else
                            <img src="{{ asset('img/Avatar-dark.png') }}" class="rounded-circle img-fluid"
                                alt="Offices Image">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-warning">Edit Setting</a>
        </div>
    </div>
@endsection
