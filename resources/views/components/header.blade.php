<header id="header">
    <div class="contHeader flex mg90">
        <a href="/" class="flex">
            <img src="{{asset('./img/logo2.png')}}" alt="" class="logoDesktop">
        </a>
        <nav>
            <a class="home link" href="/">Inicio</a>
            <a class="link" href="{{route('conoceme')}}">Conócenos</a>
            <a class="link" href="{{route('cursos')}}">Programas</a>
            <a class="link" href="{{route('asesorias')}}">Equipo</a>
            <a class="link" href="{{route('talleres')}}">
                Embajadores y Voluntarios
            </a>
            <a class="link" href="{{route('blog')}}">
                Memorias
            </a>
            <a class="contacto" href="{{route('contacto')}}">Contacto</a>
        </nav>
        @if(session()->has('id'))
            <div class="flex profile">
                <img src="{{asset('./img/user.svg')}}" alt="">
                <a href="{{url('/perfil')}}" >{{session()->get('name')}}</a>
            </div>
        @else
            <div class="flex profile">
                <img src="{{asset('./img/user.svg')}}" alt="">
                <a href="#loginModal" class="ctaLogin" rel="modal:open">Iniciar Sesión</a>
            </div>
        @endif
    </div>
</header>

<div class="headerMob">
    <div class="mg90 contHeaderMob flex">
        <a href="/" class="flex">
            <img src="{{asset('./img/logo2.png')}}" alt="" class="logoMob">
        </a>
        <div class="flex userMob">
            <div>
                <!--content reserved-->
            </div>
            <a href="#loginModal" class="ctaLogin" class="flex">
                <img src="{{asset('./img/user.svg')}}" alt="">
            </a>
            <img src="{{asset('./img/menu.svg')}}" id="nav-toggle" class="hamburguer">
        </div>
    </div>
</div>

<!--contenido movil-->
<div class="contMob" id="nav-menu">
    <div class="flex close">
        <img src="{{asset('./img/close.svg')}}" alt="close" id="nav-close">
    </div>
    <div class="colflex contentMob">
        <img src="{{asset('./img/logo2w.png')}}" alt="LaLa-HelpingKids">
        <div class="colflex enlacesMob">
            <nav class="grid">
                <a class="link" href="/">Inicio</a>
                <a class="link" href="{{route('conoceme')}}">Conócenos</a>
                <a class="link" href="{{route('cursos')}}">Programas</a>
                <a class="link" href="{{route('asesorias')}}">Equipo</a>
                <a class="link" href="{{route('talleres')}}">Embajadores y Voluntarios</a>
                <a class="link" href="{{route('blog')}}">Memorias</a>
                <a class="contacto" href="{{route('contacto')}}">Contacto</a>
            </nav>
        </div>
        <div class="linksMob flex">
            <a class="flex" href="https://wa.me/1{{$info_value->whatsapp}}?text=Hola Claudia, quiero información acerca de:">
                <img src="{{asset('./img/mobile/what.svg')}}" alt="">
            </a>
            <a class="flex" href="{{$info_value->instagram}}">
                <img src="{{asset('./img/mobile/insta.svg')}}" alt="">
            </a>
            <a class="flex" href="{{$info_value->facebook}}">
                <img src="{{asset('./img/mobile/face.svg')}}" alt="">
            </a>
            <a class="flex" href="https://www.tiktok.com/@fundacion.lala">
                <img src="{{asset('./img/tiktok_menu.svg')}}" alt="">
            </a>
        </div>
    </div>
</div>

@component('components.register')
@endcomponent
