<section class="post">
  <div class="containerPost mg90 grid">
    <!---->
    @foreach($blog_value as $key=>$b)
      <a href="{{url('/blog/'.$b->slug)}}" class="colflex itemBlog">
        <img class="portadaItem" src="{{$b->portada}}" alt="">
        <div class="colflex">
          <h3>{{$b->titulo}}</h3>
          <p>{{$b->resumen}}</p>
          <div class="flex txtBlog">
            <p>Por: {{$b->autor}}</p>
            <div class="flex publish">
              <img src="{{asset('./img/calendar.svg')}}" alt="">
              <span>{{ date("Y-m-d", strtotime($b->created_at)) }}</span>
            </div>
          </div>
        </div>
      </a>
    @endforeach
  </div>
  {{$blog_value->links() }}
</section>