@extends('layout.layout')

@section('title', 'talleres')

@section('content')
    <main>
        @component('components.talleres.contentTaller',[
            'taller'=>$taller,
        ])
        @endcomponent
    </main>
@endsection

@section('script')
    <script>
        $('a.openTaller').click(function(event) {
            $(this).modal({
                clickClose: false,
                showClose: true,
                fadeDuration: 120
            });
            return false;
        });
    </script>
@endsection
