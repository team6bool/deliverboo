@extends('layouts.app')
@section('tagscript')
<script src="{{ asset('chart.js/chart.js') }}"></script>
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
                        <th scope="col">Totale</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginateOrders as $order)
                        <tr>
                            <td scope="row">{{ date_format($order->created_at, 'd/m/Y H:i') }}</td>
                            <td scope="row">{{ $order->name }} {{ $order->lastname }}</td>
                            <td scope="row">{{ $order->address }}</td>
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
              {{ $paginateOrders->links() }}
        </div>

        <h1 class="pt-5">Statistiche</h1>
        <div class="p-3 bg-soft shadow rounded">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    @php
            $totalAmount = 0;
            $dates = [];
            foreach ($orders as $order) {
                    array_push($dates, $order->created_at->format('m'));
                    $totalAmount += $order->total;
            }
            $datesArrays = [
              "01" => 0,
              "02" => 0,
              "03" => 0,
              "04" => 0,
              "05" => 0,
              "06" => 0,
              "07" => 0,
              "08" => 0,
              "09" => 0,
              "10" => 0,
              "11" => 0,
              "12" => 0
            ];
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
const orders = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
{{-- console.log(orders.reverse()); --}}
const quantities = {!! json_encode($ordersQuantity) !!};
{{-- console.log(quantities) --}}

const labels = orders;

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