@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-between align-items-start">
                <h1>Visualizzazione ordine</h1>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                        <line x1="20" y1="12" x2="4" y2="12"></line>
                        <polyline points="10 18 4 12 10 6"></polyline>
                    </svg>
                </a>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-md-between">
                <div class="col pt-3">
                    <dd class="fs-5">{{ $order->name }} {{ $order->lastname }}</dd>
                    <dd class="fs-5">{{ $order->address }}</dd>
                    <dd class="fs-5">{{ $order->email }}</dd>
                    <dd class="fs-5">{{ $order->phone }}</dd>
                </div>
                <div class="col">
                    <div class="col-12">
                        <div class="card mt-3 pt-2 w-100">
                            {{-- take all the dishies for that order --}}
                            @foreach ($order->dishes as $dish)
                            <div class="card-body py-2">
                                {{-- take subtotal from order_dish --}}
                                <h5 class="card-title">- {{ $dish->name }} x {{ $dish->pivot->quantity }}</h5>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    <dd class="fs-2 pt-3">Totale: {{ number_format($order->total, 2, '.', '') }}€</dd>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection