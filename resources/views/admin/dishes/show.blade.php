@extends('layouts.app')

@section('script')
    function showModal(id){
    const modal = document.getElementById("modal-" + id);
    modal.classList.replace("d-none", "d-flex");
    }

    function hideModal(id){
    const modal = document.getElementById("modal-" + id);
    modal.classList.replace("d-flex","d-none");
    }

    function showSuccess(id){
    const form = document.getElementById("form-delete-" + id);
    const modal = document.getElementById("success-modal");
    modal.classList.replace("d-none", "d-flex");
    setTimeout(function (){
    form.submit();
    },1000);
    }
@endsection

@section('style')
    .fa-check{
    animation: push 1s linear
    }

    @keyframes push{
    from, to {
    transform: scale(100%);
    }
    30%{
    transform: scale(120%);
    }
    50%{
    transform: scale(80%);
    }
    }
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>{{ $dish->name }}</h1>
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <line x1="20" y1="12" x2="4" y2="12"></line>
                            <polyline points="10 18 4 12 10 6"></polyline>
                        </svg>
                    </a>
                </div>

                <div class="row">
                    <div class="col">
                        <img src="{{ asset('/storage/public/images/dishes/' . $dish->img) }}" alt="{{ $dish->name }}"
                            class="mb-3 img-fluid"
                            onerror="this.onerror=null;this.src='{{ asset('/storage/public/images/placeholder.jpg') }}';">
                    </div>
                    <div class="col">
                        <dl>
                            <dt>Nome piatto</dt>
                            <dd>{{ $dish->name }}</dd>
                            <dt>Prezzo</dt>
                            <dd>{{ number_format($dish->price, 2) }} €</dd>
                            <dt>Descrizione</dt>
                            <dd>{{ $dish->description }}</dd>
                        </dl>
                    </div>
                </div>

                <a href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}" class="btn btn-secondary me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-activity">
                        <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
                        <line x1="3" y1="22" x2="21" y2="22"></line>
                    </svg> Edit
                </a>
                <button class="btn btn-primary btn-sm" onclick="showModal({{ $dish->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-activity">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </button>

                <div class="position-fixed top-0 bottom-0 start-0 end-0 w-100 d-none align-items-center justify-content-center"
                    style="background: rgba(0,0,0,0.5)" id="{{ 'modal-' . $dish->id }}">
                    <div class="bg-white rounded p-4">
                        <h4 class="pb-4">Sicuro di voler eliminare "{{ $dish->name }}"?</h4>

                        <button class="btn btn-secondary me-3" onclick="hideModal({{ $dish->id }})">No,
                            indietro</button>
                        <button class="btn btn-primary" type="submit"
                            onclick="hideModal({{ $dish->id }}),showSuccess({{ $dish->id }})">Sì, elimina</button>
                        <form id="{{ 'form-delete-' . $dish->id }}" class="d-inline-block"
                            action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>

                <div class="position-fixed top-0 bottom-0 start-0 end-0 w-100 d-none align-items-center justify-content-center"
                    style="background: rgba(0,0,0,0.5)" id="success-modal">
                    <div class="bg-white rounded p-4">
                        <h4>Prodotto eliminato correttamente! <i
                                class="fa-solid fa-check text-success position-relative ms-3 fs-4"></i></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
