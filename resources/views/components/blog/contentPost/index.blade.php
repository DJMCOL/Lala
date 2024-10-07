@extends('layout.layout')

@section('content')
    <main>
        @component('components.blog.contentPost.contentPost',[
          'blog_value'=>$blog_value
      ])
        @endcomponent
        @component('components.float',[
          'info_value'=>$info_value
      ])
        @endcomponent
    </main>
@endsection
