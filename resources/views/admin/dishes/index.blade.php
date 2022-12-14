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
        <h1>Tutti i piatti</h1>
        <div class="d-flex justify-content-end align-items-center">
          <a href="{{ route('home') }}" class="btn btn-cart mb-2 mx-2 fs-4">
            <i class="fa-solid fa-house"></i>
          </a>
          <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary text-nowrap">Aggiungi piatto</a>
        </div>
      </div>
      <div class="row">
        @foreach ($dishes as $dish)
        <div class="col-12 col-sm-6 col-lg-4 py-3">
          <div class="card mt-3 p-2 h-100 d-flex flex-column justify-content-between">
            <div class="d-flex">
              <div class="text-center py-2">
                <img src="{{ asset('/storage/public/images/dishes/' . $dish->img) }}" alt="{{ $dish->name }}" class="rounded" style="height:100px; width:100px; object-fit: cover;" onerror="this.onerror=null;this.src='{{asset('/storage/public/images/placeholder.jpg')}}';">
              </div>
              <div class="d-flex flex-column px-3">
                <div class="fs-5 fw-semibold">{{ $dish->name }}</div>
                <div class="fs-5 pt-2">{{ number_format($dish->price, 2) }} ???</div>
              </div>
            </div>

            <div class="py-3 d-flex justify-content-center align-items-center">
              <a class="btn btn-secondary btn-sm" href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
              </a>
              <a class="btn btn-secondary btn-sm mx-2" href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                  <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
                  <line x1="3" y1="22" x2="21" y2="22"></line>
                </svg>
              </a>
              <button class="btn btn-primary btn-sm" onclick="showModal({{$dish->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                  <polyline points="3 6 5 6 21 6"></polyline>
                  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                  <line x1="10" y1="11" x2="10" y2="17"></line>
                  <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
              </button>

              <div class="position-fixed top-0 bottom-0 start-0 end-0 w-100 d-none align-items-center justify-content-center" style="background: rgba(0,0,0,0.5); z-index: 10;" id="{{ "modal-" . $dish->id}}">
                <div class="bg-white rounded p-4">
                  <h4 class="pb-4">Sicuro di voler eliminare "{{$dish->name}}"?</h4>

                  <button class="btn btn-secondary me-3" onclick="hideModal({{$dish->id}})">No, indietro</button>
                  <button class="btn btn-primary" type="submit" onclick="hideModal({{$dish->id}}),showSuccess({{$dish->id}})">S??, elimina</button>
                  <form id="{{'form-delete-' . $dish->id }}" class="d-inline-block" action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}" method="post">
                    @csrf
                    @method('DELETE')
                  </form>
                </div>
              </div>
            </div>


            <div class="position-fixed top-0 bottom-0 start-0 end-0 w-100 d-none align-items-center justify-content-center" style="background: rgba(0,0,0,0.5); z-index: 11;" id="success-modal">
              <div class="bg-white rounded p-4">
                <h4>Prodotto eliminato correttamente! <i class="fa-solid fa-check text-success position-relative ms-3 fs-4"></i></h4>
              </div>
            </div>

          </div>
        </div>
        @endforeach
      </div>

    </div>

  </div>
</div>
</div>
@endsection