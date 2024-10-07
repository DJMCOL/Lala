<section class="resumeCurso">
    <div class="colflex mg90 contresumeCurso">
        <div class="txtResume colflex">
            <h1>{{$course->titulo}}</h1>
            <p>{!! $course->descripcion!!}</p>
            @if(session()->has('id'))
                @if($validate_shop_course == 1)
                @else
                    @if($course->link == '')
                    <a class="buyCourseGo" id="{{$course->id}}">compralo ahora</a>
                    @else
                        <a href="{{$course->link}}" target="_blank">compralo ahora</a>
                    @endif
                @endif
            @else
                @if($course->link == '')
                <a href="#shopModal" class="ctaLogin buyCourseLogin" id="{{$course->id}}" rel="modal:open">compralo ahora</a>
                <a href="#loginModal" class="ctaLogin buyCourseLogin" id="{{$course->id}}" rel="modal:open">iniciar sesión</a>
                @else
                    <a href="{{$course->link}}" target="_blank">compralo ahora</a>
                @endif
            @endif
        </div>
        <div class="imgResume dnone">
            <img src="{{asset($course->portada)}}" alt="">
        </div>
    </div>
</section>
@if($validate_shop_course == 1)
<section class="videosCurso">
    @foreach($Videos  as $key=>$video)
    <div class="mg90 contvideoCurso colflex">
        <div class="txtVideo colflex">
            <h2>{{$video->titulo}}</h2>
            <p>{{$video->resumen}}</p>
        </div>
        <div class="linkVideo">
            <!--
            <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="{{$video->link}}" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
            -->
            <div style="padding:55.94% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/{{$video->link}}?byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
        </div>
    </div>
    @endforeach
</section>

<section class="filesCurso">
    <div class="mg90 contfilesCurso">
        <h2>Archivos descargables</h2>
        @foreach($Pdfs as $key=>$pdf)
        <div class="colflex itemFiles">
            <div class="flex">
                <img src="{{asset('/img/pdf.svg')}}" alt="PDF">
                <h3>{{$pdf->titulo}}</h3>
            </div>
            <p>{{$pdf->resumen}}</p>
            <div class="ctaPdf">
                <a target="_blank" href="{{asset($pdf->archivo)}}">descargar</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="audioCurso">
    <div class="mg90 contaudioCurso">
        <h2>Audios</h2>
        @foreach($Audios as $key=>$Audio)
            <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="{{$Audio->link}}&color=%236aeb77&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
        @endforeach
    </div>
</section>
@endif
