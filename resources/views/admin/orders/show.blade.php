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
            <dd class="fs-3 row">
                <div class="col">
                    <ul>
                        <li>Carne</li>
                        <li>Pesce</li>
                        <li>Pane</li>
                    </ul>
                </div>
                <div class="col-2">
                        <div>4</div>
                        <div>2</div>
                        <div>7</div>
                </div>
                <div class="col">
                        <div>25,00€</div>
                        <div>13,50€</div>
                        <div>39,00€</div>
                </div>
            </dd>
            <dd class="fs-3">Totale: {{ $order->total }}€</dd>


        </div>
        <div class="col-6 d-flex justify-content-end align-items-start">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                    <line x1="20" y1="12" x2="4" y2="12"></line>
                    <polyline points="10 18 4 12 10 6"></polyline>
                </svg> Tutti gli ordini
            </a>
        </div>
    </div>
    @endsection