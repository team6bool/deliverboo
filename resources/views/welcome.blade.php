<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="{{ asset('js/frontend.js') }}" defer></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.10.0/js/dropin.js"></script>
    <script>
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
        }, function(err, instance) {
            if (err) {
                // An error in the create call is likely due to
                // incorrect configuration values or network issues
                return;
            }

            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        // An appropriate error will be shown in the UI
                        return;
                    }

                    // Submit payload.nonce to your server
                });
            })
        });
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css'
        integrity='sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg=='
        crossorigin='anonymous' />


</head>

<body>
    {{-- <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}

    <div class="content">
        <div id="app"></div>
    </div>
    </div>
</body>

</html>
