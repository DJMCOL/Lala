@extends('layout.layout')

@section('content')
  <main>
    @component('components.courses.banner',[
      'banners_value'=>$banners_value
    ])
    @endcomponent

    @component('components.courses.courses',[
    'cursos_value'=>$cursos_value,
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
    $('a.openCourse').click(function(event) {
      $(this).modal({
        clickClose: false,
        showClose: true,
        fadeDuration: 120
      });
      return false;
    });
  </script>
@endsection
