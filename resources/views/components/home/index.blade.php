@extends('layout.layout')

@section('content')
  <main class="mainDesktop dnone">
    @component('components.home.mainBanner',[
      'info_value'=>$info_value,
      'banners_value'=>$banners_value
  ])
    @endcomponent

    @component('components.home.about_text')
    @endcomponent

    @component('components.home.about',[
      'info_value'=>$info_value
    ])
    @endcomponent

    @component('components.home.about_valores')
    @endcomponent

    @component('components.home.shopping',[
      'links_value'=>$links_value,
      'info_value'=>$info_value,
      'banners_value'=>$banners_value
    ])
    @endcomponent

    @component('components.home.workshop',[
      'info_value'=>$info_value
    ])
    @endcomponent

    @component('components.home.blog',[
    'blog_value'=>$blog_value
    ])
    @endcomponent

    @component('instagram')
    @endcomponent

    @component('components.home.subscribe')
    @endcomponent

    @component('components.float',[
      'info_value'=>$info_value
      ])
    @endcomponent
  </main>

  <main class="mainMobile">
   @component('components.home.mobile.index',[
      'banners_value'=>$banners_value,
      'blog_value'=>$blog_value,
      'links_value'=>$links_value,
      'info_value'=>$info_value,
])
    @endcomponent

  </main>
@endsection
