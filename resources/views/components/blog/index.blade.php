@extends('layout.layout')

@section('content')
  <main>
    @component('components.blog.banner',[
      'banners_value'=>$banners_value
  ])
    @endcomponent

    @component('components.blog.posts',[
    'blog_value'=>$blog_value
])
    @endcomponent

    @component('components.float',[
      'info_value'=>$info_value
      ])
    @endcomponent
  </main>
@endsection
