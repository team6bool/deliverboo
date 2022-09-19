@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Nome del piatto: {{ $dish->name }}</h1>
                <p>Descrizione: {{ $dish->description }}</p>
                <p>Ristorante: {{ $dish->user->name }}</p>
                <p>Prezzo: {{ $dish->price }}</p>
                <img src="{{ Storage::url($dish->image) }}" alt="{{ $dish->slug }}">
            </div>
        </div>
    </div>
@endsection
