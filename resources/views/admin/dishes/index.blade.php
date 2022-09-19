@extends('layouts.app')

@foreach ('dishes' as $dish)
    <div class="card" style="width: 18rem;">
        <img src="{{ Storage::url($dish->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $dish->name }}</h5>
            <p class="card-text">{{ $dish->description }}</p>
            <p class="card-text">{{ $dish->user->name }}</p>
            <p class="card-text">{{ $dish->price }}</p>
            <a href="#" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endforeach
