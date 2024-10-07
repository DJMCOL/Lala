@extends('layout.layout')

@section('content')
  <main>
    @component('components.contact.contact',[
      'info_value'=>$info_value
      ])
    @endcomponent

  </main>
@endsection
