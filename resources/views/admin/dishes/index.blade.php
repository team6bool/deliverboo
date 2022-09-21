@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <h1>Tutti i piatti</h1>
          <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Aggiungi piatto</a>
        </div>
        
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome piatto</th>
              <th>Anteprima</th>
              <th class="text-center">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dishes as $dish)
              <tr>
                <td class="align-middle">{{ $dish->id }}</td>
                <td class="align-middle">{{ $dish->name }}</td>
                <td>
                    <div class="h-50">
                        <img src="{{ asset('/storage/public/images/dishes/' . $dish->img) }}" alt="{{ $dish->name }}" class="" width="70" style="height:50px; object-fit: cover">
                    </div>
                </td>
                <td class="text-center align-middle">
                  <a class="btn btn-secondary btn-sm" href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-activity">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                      <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                  </a>
                  <a class="btn btn-secondary btn-sm" href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-activity">
                      <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
                      <line x1="3" y1="22" x2="21" y2="22"></line>
                    </svg>
                  </a>
                  <form class="d-inline-block" action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-activity">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg>
                    </button>
                  </form>

                  <crud-delete-btn action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}">
                    @csrf
                    @method('DELETE')
                  </crud-delete-btn>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection