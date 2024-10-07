@extends('layout.layout')

@section('content')
  <main>
    @component('components.about.about')
    @endcomponent

    @component('components.about.about2')
    @endcomponent

    @component('components.about.about3')
    @endcomponent

    @component('components.about.formacion')
    @endcomponent

    @component('components.about.more')
    @endcomponent

    @component('components.about.atencion')
    @endcomponent

    @component('components.float',[
      'info_value'=>$info_value
      ])
    @endcomponent
  </main>
@endsection
