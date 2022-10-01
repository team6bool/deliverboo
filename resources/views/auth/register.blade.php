@extends('layouts.app')

@section('script')
    function onSubmit(){
        {{-- bootstrap validation --}}
        const form = document.querySelector('form');
        form.classList.add('was-validated');

        {{-- categories validation --}}
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
        const categoriesDiv = document.querySelector('.if-invalid');
        if(!checkedOne){
            categoriesDiv.classList.replace('d-none','d-block');
            return false
        }else{
            categoriesDiv.classList.replace('d-block', 'd-none');
        }

    }
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrati') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                            class="d-flex flex-column gap-4">
                            @csrf

                            <div class="form-group position-relative row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus min="3">

                                    <div class="invalid-tooltip text-light">
                                        Il nome deve contenere almeno 3 lettere!
                                    </div>

                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    <div class="invalid-tooltip text-light">
                                        Inserisci un'email valida: info@example.com
                                    </div>

                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

                                    <div class="invalid-tooltip text-light">
                                        La password deve contenere almeno 8 caratteri: una Maiuscola, una minuscola e un
                                        numero.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                </div>

                                <div class="invalid-tooltip text-light">
                                    Le password devono essere uguali!
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus
                                        min="5">

                                    <div class="invalid-tooltip text-light">
                                        Inserisci un indirizzo valido!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA*') }}</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text" min="11" max="11"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>

                                    <div class="invalid-tooltip text-light">
                                        Inserisci un numero di Partita IVA valido!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="delivery_price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezzo di consegna*') }}</label>

                                <div class="col-md-6">
                                    <input id="delivery_price" type="number" step=".01"
                                        class="form-control @error('delivery_price') is-invalid @enderror"
                                        name="delivery_price" value="{{ old('delivery_price') }}" required
                                        autocomplete="delivery_price" autofocus>

                                    <div class="invalid-tooltip text-light">
                                        Definisci il prezzo di consegna: il più comune è €1,50!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                    <div class="invalid-tooltip text-light">
                                        Inserisci un numero valido!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="website"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo web') }}</label>

                                <div class="col-md-6">
                                    <input id="website" type="url"
                                        class="form-control @error('website') is-invalid @enderror" name="website"
                                        value="{{ old('website') }}" autocomplete="website" autofocus>

                                    <div class="invalid-tooltip text-light">
                                        Inserisci un url valido!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row" action="{{ url('form') }}">
                                <label for="cover_img_file"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine di copertina*') }}</label>

                                <div class="col-md-6">

                                    <input id="cover_img_file" type="file" name="img"
                                        class="form-control @error('cover_img_file') is-invalid @enderror" name="img"
                                        value="{{ old('cover_img_file') }}" required autocomplete="cover_img_file"
                                        autofocus>

                                    <div class="invalid-tooltip text-light">
                                        L'immagine è obbligatoria!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description') }}" autocomplete="description" autofocus
                                        max="2000">

                                    <div class="invalid-tooltip text-light">
                                        Puoi inserire massimo 2000 caratteri!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group position-relative row">
                                <label for="category"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Seleziona categorie*') }}</label>

                                <div id="category" class="col-md-6 position-relative">
                                    @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categories[]"
                                                id="{{ $category->id }}" value="{{ $category->id }}">
                                            <label class="form-check-label" for="{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                    <div class="if-invalid fw-semibold text-danger d-none">Seleziona almeno una categoria!
                                    </div>
                                </div>
                            </div>



                            <div class="form-group position-relative row mb-0 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="onSubmit()">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
