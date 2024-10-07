@extends('layout.layout')

@section('content')
    <div class="contentImg">
        <div class="contener">
            <h3>
                Compra de curso
            </h3>
            <h1>
                {{$course->course->titulo}}
            </h1>
            <h2>
                Total: {{$course->total}} USD
            </h2>
            <div id="paypal-button-container"></div>
        </div>
    </div>
@endsection

@section('script')
    <style>
        .contener{
            width: 80%;
            margin-left: 10%;
            padding: 2% 0%;
            background: rgba(255,255,255,0.8);
        }
        .contener h2{
            color: #292929;
            font-weight: 700;
            margin-bottom: 4%;
        }
        .contentImg{
            text-align: center;
            padding: 5% 0%;
            padding-top: 8%;
            background-image: url({{asset('img/banner_mail.jpg')}});
            background-repeat: no-repeat;
            background-position: top center;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
        }
        .spaceador{
            display: none;
        }
        form{
            display: none;
        }
    </style>
    <script src="https://www.paypal.com/sdk/js?client-id=AV8hCWTg_pceC_hZWAs-7bTv1W4A9cxHUYY_PT-d8KaK293d74tEZxiGijvJvwMdX6phAdcCFR6Q7wmq"> // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>
    @php
        $address = $course->user->address[0]->address;
    @endphp
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$course->total}}',
                            currency_code: 'USD',
                        },
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
@endsection
