@extends('layout.layout')

@section('content')
    <main>
        @component('components.registro.banner',[
          'banners_value'=>$banners_value
        ])
        @endcomponent

        @component('components.registro.formRegistro')
        @endcomponent

    </main>
@endsection