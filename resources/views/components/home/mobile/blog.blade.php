<section class="blogM">
    <h1>Memorias</h1>
    <div class="contBlogM mg90 colflex">
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
        <a href="{{route('blog')}}" class="blogBtn">ver todo</a>
    </div>
</section>