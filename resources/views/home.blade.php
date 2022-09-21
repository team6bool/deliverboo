@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div class="d-flex gap-4 pb-3 ps-3">
                        <button class="btn btn-warning" type="button"
                            onclick="window.location=`{{ url('admin/dishes') }}`">Piatti</button>
                        <button class="btn btn-warning" type="button"
                            onclick="window.location=`{{ url('admin/orders') }}`">Ordini</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
