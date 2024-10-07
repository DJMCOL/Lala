<div class="sep60" style="height: 60px"></div>

<section class="portadaBlog">
    <div class="mg90 colflex">
        <h1>{{$blog_value->titulo}}</h1>
        <img src="{{asset($blog_value->banner)}}" alt="">
    </div>
</section>

<section class="contenidoPost mg90">
    <div>{!!$blog_value->contenido!!}</div>
</section>