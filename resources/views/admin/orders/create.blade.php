@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Creazione nuovo ordine</h1>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <line x1="20" y1="12" x2="4" y2="12"></line>
                            <polyline points="10 18 4 12 10 6"></polyline>
                        </svg> Tutti gli ordini
                    </a>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{ route('admin.orders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nome cliente</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Inserisci il titolo" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Cognome cliente</label>
                        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"
                            placeholder="Inserisci il titolo" required>
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Indirizzo cliente</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            placeholder="Inserisci il titolo" required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Inserisci il titolo" required>

                    </div>
                    <div class="form-group">
                        <label>Numero di telefono</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Inserisci il titolo" required>

                    </div>

                    {{-- quantity pivot table --}}
                    @foreach ($dishes as $dish)
                        <div class="form-group">
                            <label for="dish-quantity">Quantità di {{ $dish->name }}</label>
                            <input id="dish-quantity" type="number" name="dishes[{{ $dish->id }}]"
                                class="form-control @error('dishes') is-invalid @enderror"
                                placeholder="Inserisci la quantità">
                        </div>
                    @endforeach

                    {{-- subtotal table --}}

                    @foreach ($dishes as $dish)
                        <div class="form-group">
                            <label for="dish-subtotal">Subtotale di {{ $dish->name }}</label>
                            <input id="dish-subtotal" type="number" name="subtotals[{{ $dish->id }}]"
                                class="form-control @error('subtotals') is-invalid @enderror"
                                placeholder="Inserisci il subtotale">
                            @error('subtotals')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach



                    {{-- total price --}}
                    <div class="form-group">
                        <label for="total_price">Prezzo totale</label>
                        <input id="total_price" type="text" name="total"
                            class="form-control @error('total') is-invalid @enderror" placeholder="Inserisci il titolo"
                            required>
                        @error('total')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-activity">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg> Crea ordine
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
