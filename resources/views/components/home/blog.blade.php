<section class="blog relative" id="blog">
  <div class="containerBlog vh100">
    <div class="colflex mg90">
      <div class="flex shapes">
        <img src="{{asset('./img/circle.svg')}}" alt="">
        <img class="line" src="{{asset('./img/line.svg')}}" alt="">
        <p>Memorias</p>
      </div>
      <div class="flex contBlog">
        <div class="colflex">
          <div class="grid">
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
          <a class="btnBlog" href="{{route('blog')}}">ver más</a>
        </div>
      </div>
    </div>
  </div>
</section>