@component('mail::message')

Ricevuto ordine numero #{{$order->id}} contenente:

@component('mail::table')
| Nome piatto | Quantità | Prezzo |
|:-----------:|:--------:|:------:|
@foreach ($order->dishes as $dish)
| {{$dish->name}} | {{$dish->pivot->quantity}} | € {{$dish->pivot->quantity * $dish->price}} |
@endforeach
@endcomponent


@component('mail::button', ['url' => route('admin.orders.show', $order->id)])
Visualizza ordine
@endcomponent

<strong>Deliveboo, team 6</strong> #classe65.

@endcomponent