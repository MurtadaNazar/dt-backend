@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="w-100">
                    <h1> {{ __('Welcome,') }} {{ Auth::user()->name }}</h1>
                    <h1>Dashboard</h1>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
