@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="post" action="{{ route('admin.dishes.update', $dishes->slug) }}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nome del piatto') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $dishes->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description', $dishes->description) }}" required
                                    autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezzo del piatto') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" step=".01"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price', $dishes->price) }}" required autocomplete="price" autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine del piatto') }}</label>

                                <div class="col-md-6">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset('/storage/public/images/dishes/' . $dishes->img) }}"
                                            class="card-img-top" alt="{{ $dishes->name }}">
                                    </div>
                                    <input id="img" type="file"
                                        class="form-control @error('img') is-invalid @enderror" name="img"
                                        value="{{ old($dishes->img) }}" autocomplete="img" autofocus>

                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="visible"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E\' disponibile?') }}</label>

                                    <div id="visible" class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="active" value="1" class="switch-input"
                                                {{ $dishes->visible ? 'checked' : '' }} />

                                        </div>

                                        @error('visible')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Aggiungi') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection
