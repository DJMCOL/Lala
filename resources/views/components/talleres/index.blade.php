@extends('layout.layout')

@section('title', 'talleres')

@section('content')
  <main>
    @component('components.talleres.banner',[
      'banners_value'=>$banners_value
])
    @endcomponent

    @component('components.talleres.talleres',[
      'talleres_value'=>$talleres_value
      ])
    @endcomponent

    @component('components.float',[
      'info_value'=>$info_value
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
