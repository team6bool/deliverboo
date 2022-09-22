@extends('layouts.app')

@section('script')
    function onSubmit(){
    {{-- bootstrap validation --}}
    const form = document.querySelector('.to-validate');
    form.classList.add('was-validated');

    }
@endsection

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
                        enctype="multipart/form-data" class="d-flex flex-column gap-4 to-validate">

                        @csrf
                        @method('PUT')

                        <div class="form-group row position-relative">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nome del piatto') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" min="3"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $dishes->name) }}" required autocomplete="name" autofocus>

                                <div class="invalid-tooltip text-light">
                                    Inserisci un nome valido! (almeno 3 lettere)
                                </div>
                            </div>
                        </div>

                        <div class="form-group row position-relative">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description', $dishes->description) }}" autocomplete="description"
                                    autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row position-relative">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('Prezzo del piatto') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step=".01"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price', $dishes->price) }}" required autocomplete="price" autofocus>

                                <div class="invalid-tooltip text-light">
                                    Inserisci un prezzo valido!
                                </div>
                            </div>
                        </div>

                        <div class="form-group row position-relative">
                            <label for="img"
                                class="col-md-4 col-form-label text-md-right">{{ __('Immagine del piatto') }}</label>

                            <div class="col-md-6">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('/storage/public/images/dishes/' . $dishes->img) }}"
                                        class="card-img-top" alt="{{ $dishes->name }}"
                                        onerror="this.onerror=null;this.src='{{ asset('/storage/public/images/placeholder.jpg') }}';">
                                </div>
                                <input id="img" type="file" class="form-control @error('img') is-invalid @enderror"
                                    name="img" autocomplete="img" autofocus>

                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visible"
                                class="col-md-4 col-form-label text-md-right">{{ __('E\' disponibile?') }}</label>

                            <div id="visible" class="col-md-6">
                                <div class="form-check">
                                    <label for="visible" class="pe-1">Sì</label>
                                    <input type="hidden" name="visible" value="0">
                                    <input type="checkbox" name="visible" class="switch-input" value="1"
                                        {{ $dishes->visible ? 'checked' : '' }} />

                                </div>

                                @error('visible')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="onSubmit()">
                                    {{ __('Aggiorna') }}
                                    <button class="btn btn-secondary ms-2" type="button"
                                        onclick="window.location=`{{ route('admin.dishes.index') }}`">Indietro</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    @endsection
