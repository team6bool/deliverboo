@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Visualizzazione ordine</h1>

                <dd class="fs-3">Nome: {{ $order->name }}</dd>
                <dd class="fs-3">Cognome: {{ $order->lastname }}</dd>
                <dd class="fs-3">Indirizzo: {{ $order->address }}</dd>
                <dd class="fs-3">Email: {{ $order->email }}</dd>
                <dd class="fs-3">Telefono: {{ $order->phone }}</dd>
                <dd class="fs-3">Piatti:</dd>
                <ul>

                    {{-- take all the dishies for that order --}}
                    @foreach ($order->dishes as $dish)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dish->name }}</h5>
                                {{-- take subtotal from order_dish --}}
                                <p class="card-text">Subtotale: {{ $dish->pivot->subtotal }}</p>
                                {{-- take quantity from order_dish --}}
                                <p class="card-text">Quantità: {{ $dish->pivot->quantity }}</p>
                            </div>
                        </div>
                    @endforeach
                </ul>


                <dd class="fs-3">Totale: {{ number_format($order->total, 2, '.', '') }}€</dd>

            </div>
            <div class="col-6 d-flex justify-content-end align-items-start">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-activity">
                        <line x1="20" y1="12" x2="4" y2="12"></line>
                        <polyline points="10 18 4 12 10 6"></polyline>
                    </svg> Tutti gli ordini
                </a>
            </div>
        </div>
    @endsection
