@extends('layout.layout')

@section('content')
    <div class="contentImg">
        <div class="contener">
            @if(session()->has('id_paypal'))
                @switch (session()->get('type_paypal'))
                    @case(1)
                        @php
                            $info = \App\Models\CoursePurchase::find(session()->get('id_paypal'));
                        @endphp
                        <h3>
                            Compra de curso
                        </h3>
                        <h1>
                            {{$info->curso->titulo}}
                        </h1>
                        @break
                    @case(2)
                        @php
                            $info = \App\Models\TallerPurchase::find(session()->get('id_paypal'));
                        @endphp
                        <h3>
                            Compra de taller
                        </h3>
                        <h1>
                            {{$info->taller->titulo}}
                        </h1>
                        @break
                    @case(3)
                        @php
                            $info = \App\Models\ServicePurchase::find(session()->get('id_paypal'));
                        @endphp
                        <h3>
                            Compra de Asesoria
                        </h3>
                        <h1>
                            {{$info->service->titulo}}
                        </h1>
                        @break
                @endswitch
                <h2>
                    Total: {{$info->total}} USD
                </h2>
            @endif
            @if(session()->has('status'))
                <br>
                <h2>
                    {{session()->get('status')}}
                </h2>
            @endif
            @if(session()->has('code'))
                @if(session()->get('code') == 1)
                    <br>
                    <a class="contacto" href="{{url('paypal/pay')}}">INTENTAR PAGAR NUEVAMENTE</a>
                    <h4 style="margin-top: 2%">
                        Importante: Luego de haber seleccionado el día y la fecha de tu asesoría, contarás con 15 minutos para realizar el pago.<br>
                        En caso de exceder este tiempo, el sitio web liberará el agendamiento y será necesario repetir el proceso.
                    </h4>
                @endif
            @endif
        </div>
    </div>
@endsection

@section('script')
    <style>
        .contacto{
            padding: 7px 20px;
            color: #fff;
            border-radius: 20px;
            cursor: pointer;
            background: #70B125;
        }
        .contener{
            width: 80%;
            margin-left: 10%;
            padding: 4% 0%;
            background: rgba(255,255,255,0.95);
        }
        .contener h2{
            color: #292929;
            font-weight: 700;
        }
        .contentImg{
            text-align: center;
            padding: 10% 0%;
            padding-top: 8%;
            background-image: url({{asset('img/foto_paypal.jpg')}});
            background-repeat: no-repeat;
            background-position: center center;
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
@endsection
