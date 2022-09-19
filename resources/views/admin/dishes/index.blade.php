@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row cols-4">
            @foreach ($dishes as $dish)
                <div class="col d-flex">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/storage/public/images/dishes/' . $dish->img) }}" alt="{{ $dish->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p class="card-text">{{ $dish->user->name }}</p>
                            <p class="card-text">{{ $dish->price }}</p>
                            <a href="#" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
