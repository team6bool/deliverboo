@extends('layouts.app')

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
            </svg> Tutti i piatti
          </a>
        </div>

        <div class="row">
          <div class="col">
            <img src="{{ asset('/storage/public/images/dishes/' . $dish->img) }}" alt="{{ $dish->name }}" class="mb-3 img-fluid" onerror="this.onerror=null;this.src='{{asset('/storage/public/images/placeholder.jpg')}}';">
          </div>
          <div class="col">
            <dl>
              <dt>Nome piatto</dt>
              <dd>{{ $dish->name }}</dd>
              <dt>Prezzo</dt>
              <dd>{{ $dish->price }}</dd>
              <dt>Descrizione</dt>
              <dd>{{ $dish->description }}</dd>
            </dl>
          </div>
        </div>

        <a href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}" class="btn btn-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-activity">
            <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
            <line x1="3" y1="22" x2="21" y2="22"></line>
          </svg> Edit
        </a>
        <form class="d-inline-block" action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary ms-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-activity">
              <polyline points="3 6 5 6 21 6"></polyline>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg> Delete
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection