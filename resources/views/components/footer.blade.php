<footer>
    <div class="contFooter">
        <div class="links">
            <nav class="flex">
                <a href="/">Inicio</a>
                <a href="{{route('conoceme')}}">Conócenos</a>
                <a href="{{route('cursos')}}">Programas</a>
                <a href="{{route('asesorias')}}">Equipo</a>
                <a href="{{route('talleres')}}">
                    Embajadores y Voluntarios
                </a>
                <a href="{{route('blog')}}">
                    Memorias
                </a>
                <a href="{{route('contacto')}}">Contacto</a>
            </nav>
            <div class="social flex">
                <a class="flex" target="_blank" href="https://wa.me/1{{$info_value->whatsapp}}?text=Hola Claudia, quiero información acerca de:">
                    <img src="{{asset('./img/whatsapp.svg')}}" alt="">
                </a>
                <a class="flex" target="_blank" href="{{$info_value->instagram}}">
                    <img src="{{asset('./img/instagram.svg')}}" alt="">
                </a>
                <a class="flex" target="_blank" href="{{$info_value->facebook}}">
                    <img src="{{asset('./img/facebook.svg')}}" alt="">
                </a>
                <a class="flex" target="_blank" href="https://www.tiktok.com/@fundacion.lala">
                    <img src="{{asset('./img/tiktok_footer.svg')}}" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="gutand flex">
        <div class="gtnd2 flex">
            <p><span>Lala Helping Kids | </span>Todos los derechos reservados | Creado por</p>
            <a href="https://gutand.com/" target="_blank" class="flex">  <img src="{{asset('/img/footer/gtnd3.svg')}}" alt=""> </a>
        </div>
        <div class="tarjetas flex">
            <img src="{{asset('./img/footer/western.jpg')}}" alt="">
            <img src="{{asset('./img/footer/visa.jpg')}}" alt="">
            <img src="{{asset('./img/footer/master.jpg')}}" alt="">
            <img src="{{asset('./img/footer/paypal.jpg')}}" alt="">
        </div>
    </div>
    <div class="gutand2 dnone">
        <p><span>Lala Helping Kids</span> Creado por</p>
        <a href="https://gutand.com/" target="_blank" class="flex">  <img src="{{asset('/img/footer/gtnd3.svg')}}" alt=""></a>
    </div>
</footer>
<script>function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"4aa563b7f116fc776668dc22e3d7cfde"})});</script>
