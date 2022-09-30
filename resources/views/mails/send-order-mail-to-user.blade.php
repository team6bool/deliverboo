@component('mail::message')

Il tuo ordine numero #{{$order->id}} contenente:
@foreach ($order->dishes as $dish)
- {{$dish->name}} x {{$dish->pivot->quantity}} = € {{$dish->pivot->quantity * $dish->price}}
@endforeach

è stato ricevuto. <br>
Verrà preparato e spedito il prima possibile.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Ordina altro
@endcomponent

Grazie da,<br>
<strong>Deliveboo, team 6</strong> #classe65.

@endcomponent
