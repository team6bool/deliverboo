@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center py-3">
        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Aggiungi</a>
    </div>

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
                <td>{{ $order->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection