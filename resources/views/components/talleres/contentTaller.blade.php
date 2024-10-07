<section class="resumeCurso">
    <div class="colflex mg90 contresumeCurso">
        <div class="txtResume colflex">
            <h1>{{$taller->titulo}}</h1>
            <p>{!!$taller->descripcion!!}</p>
            @php
                $validate_shop = false;
            @endphp
            @if(session()->has('id'))
                @php
                    setlocale(LC_ALL,"es_ES");
                    $date = date("Y-m-d");
                    $tallerP = \App\Models\TallerPurchase::where('taller_id',$taller->id)
                      ->where('user_id',session()->get('id'))
                      ->where('status',1)
                      ->orderBy('id','desc')
                      ->get();
                @endphp
                @if($tallerP->count() > 0)
                    @php
                        $validate_shop = true;
                    @endphp
                @endif
                @if($validate_shop == true)
                    @if($taller->link == 'En espera' || $taller->link == '')
                        <a>En espera</a>
                    @else
                        <a href="{{$taller->link}}" target="_blank">IR AL LINK</a>
                    @endif
                    <a>FECHA {{$taller->date}}</a>
                @else
                    <a class="buyTallerGo" id="{{$taller->id}}">compralo ahora</a>
                @endif
            @else
                <a href="#shopModal" class="ctaLogin buyTallerLogin" id="{{$taller->id}}" rel="modal:open">compralo ahora</a>
                <a href="#loginModal" class="ctaLogin buyTallerLogin" id="{{$taller->id}}" rel="modal:open">iniciar sesión</a>
            @endif
        </div>
        <div class="imgResume dnone">
            <img src="{{asset($taller->portada)}}" alt="">
        </div>
    </div>
</section>
