@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('home') }}" class="btn btn-cart mb-2 fs-4">
        <i class="fa-solid fa-house"></i>
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Indirizzo</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->lastname }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ number_format($order->total, 2, '.', '') }}</td>

                <td>
                    <div class="text-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Mostra</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection