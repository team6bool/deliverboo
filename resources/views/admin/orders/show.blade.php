@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>{{ $order->name }}</h2>
            <h2>{{ $order->lastname }}</h2>
            <h2>{{ $order->address }}</h2>
            <h2>{{ $order->email }}</h2>
            <h2>{{ $order->phone }}</h2>
            <h2>{{ $order->total }}</h2>
        </div>
    </div>
</div>
@endsection