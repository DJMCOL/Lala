<section class="asesorias">
  <div class="containerAsesorias mg90 grid">
    @foreach($asesorias_value as $key=>$a)
      <div class="itemAsesoria">
        <img src="{{asset($a->portada)}}" alt="">
        <div class="colflex">
          <h2>{{$a->titulo}}</h2>
          <p>{{$a->resumen}}</p>
          <div class="flex price">
            <span style="display:none">${{$a->precio}} USD</span>
            <span>{{$a->cupos}} <!--cupos--></span>
          </div>
          <div class="flex ctaMore">
            @if(session()->has('id'))
                  <a class="openAsesoria openAsesoriaClick" href="#modalAsesoria" rel="modal:open" id="{{$a->id}}">Ver más...</a>
                  @php
                      setlocale(LC_ALL,"es_ES");
                      $date = date("Y-m-d");
                      $courseP = \App\Models\ServicePurchase::where('service_id',$a->id)
                        ->where('user_id',session()->get('id'))
                        ->where('date','>=',$date)
                        ->where('status',1)
                        ->orderBy('id','desc')
                        ->get();
                      $courseP_v = \App\Models\ServicePurchase::where('service_id',$a->id)
                        ->where('user_id',session()->get('id'))
                        ->where('date','>=',$date)
                        ->where('status','!=',1)
                        ->where('validate_date',1)
                        ->orderBy('id','desc')
                        ->get();
                  @endphp
                  @if($courseP->count() > 0)
                    <a class="openAsesoriaClick" href="#modalAsesoria" rel="modal:open" id="{{$a->id}}">ADQUIRIDO</a>
                  @elseif($courseP_v->count() > 0)
                      <a class="openAsesoriaClick" href="#modalAsesoria" rel="modal:open" id="{{$a->id}}">RESERVADO</a>
                  @else
                      <a class="openAsesoriaClick" href="#modalAsesoria" rel="modal:open" id="{{$a->id}}">Agendar</a>
                  @endif
            @else
                <a class="openAsesoria openAsesoriaClick" href="#modalAsesoria" rel="modal:open" id="{{$a->id}}">Ver más...</a>
                <a class="openAsesoriaClick" href="#modalAsesoria" rel="modal:open" id="{{$a->id}}">Agendar</a>
            @endif
          </div>
        </div>
      </div>

      <!--MODAL ASESORIA-->
      <div id="modalAsesoria" class="modal modalAsesoria">
        <h1>Asesoría</h1>
        <hr>
        <div class="content_html">

        </div>
      </div>
    @endforeach
  </div>
</section>
