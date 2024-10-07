@extends('layout.layout')

@section('content')
    <main>
        @component('components.courses.contentCurso.contentCurso',[
            'course'=>$course,
            'Videos'=>$Videos,
            'Pdfs'=>$Pdfs,
            'Audios'=>$Audios,
            'validate_shop_course'=>$validate_shop_course
        ])
        @endcomponent

        @component('components.float',[
          'info_value'=>$info_value
          ])
        @endcomponent
    </main>
@endsection
