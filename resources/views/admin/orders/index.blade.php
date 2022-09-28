@extends('layouts.app')
@section('tagscript')
<script src="{{ asset('chart.js/chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
<script src="{{ asset('chartjs-zoom/chartjs-zoom.js') }}"></script>
@endsection


@section('content')
    <div class="container">

        <a href="{{ route('home') }}" class="btn btn-cart mb-2 fs-4">
            <i class="fa-solid fa-house"></i>
        </a>

        <h1 class="pt-3">Ordini</h1>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Data e ora</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Totale</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td scope="row">{{ date_format($order->created_at, 'd/m/Y H:i') }}</td>
                            <td scope="row">{{ $order->name }} {{ $order->lastname }}</td>
                            <td scope="row">{{ $order->address }}</td>
                            <td scope="row">{{ $order->email }}</td>
                            <td scope="row">{{ $order->phone }}</td>
                            <td scope="row">€{{ number_format($order->total, 2, '.', '') }}</td>

                            <td>
                                <div class="text-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-primary">Mostra</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h1 class="pt-5">Statistiche</h1>

        <div class="p-3 bg-soft shadow rounded">
            <p>Consiglio: <em>scrolla con il mouse sul grafico!</em></p>
            <canvas id="myChart"></canvas>
        </div>
        <button class="btn btn-secondary mt-3" onclick="myChart.resetZoom(mode = 'active')">Resetta zoom</button>
    </div>
    @php
            $totalAmount = 0;
            $dates = [];
            foreach ($orders as $order) {
                    array_push($dates, $order->created_at->format('d/m/Y'));
                    $totalAmount += $order->total;
            }
            $datesArrays = [];
            foreach ($dates as $date) {
                if (array_key_exists($date, $datesArrays)) {
                    $datesArrays[$date] += 1;
                } else {
                    $datesArrays[$date] = 1;
                }
            }
            // print_r($datesArrays);

            $ordersDates = [];
            $ordersQuantity = [];

            foreach ($datesArrays as $array => $quantity){
                array_push($ordersDates, $array);
                array_push($ordersQuantity, $quantity);
            }

            // print_r($ordersDates);
            // print_r($ordersQuantity);

        @endphp
@endsection

@section('bottomscript')
const orders = {!! json_encode($ordersDates) !!};
{{-- console.log(orders.reverse()); --}}
const quantities = {!! json_encode($ordersQuantity) !!};
{{-- console.log(quantities) --}}

const labels = orders.reverse();

  const data = {
    labels: labels,
    datasets: [{
      label: 'Ordini',
      backgroundColor: '#fff',
      borderColor: '#fd5f25',
      data: quantities,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      plugins: {
        zoom: {
          zoom: {
            wheel: {
              enabled: true,
            },
            pinch: {
              enabled: true
            },
            mode: 'xy',
            limits: {
                y: {min: 0, max: 20}
            }
          }
        }
      }
    }
  };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
@endsection