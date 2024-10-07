<section class="talleres">
  <div class="containerTalleres mg90 grid">
    @foreach($talleres_value as $key=>$t)
    <div class="itemTaller">
      <img src="{{asset($t->portada)}}" alt="">
      <div class="colflex">
        <h2>{{$t->titulo}}</h2>
        <p>{{$t->resumen}}</p>
        <div class="flex price">
          <span>{{$t->precio}} USD</span>
            <!--  <span>{{$t->cupos}} cupos</span> -->
        </div>
        <div class="flex ctaMore">
            @php
                $name = str_replace(' ','-',$t->titulo);
                $name = strtolower($name);
                $name = preg_replace('([^A-Za-z0-9 -])', '', $name);
                $name = str_replace(array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),$name);
                $name = str_replace(array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),$name);
                $name = str_replace(array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),$name);
                $name = str_replace(array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),$name);
                $name = str_replace(array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),$name);
                $name = str_replace(array('Ñ', 'ñ', 'Ç', 'ç'),array('N', 'n', 'C', 'c'),$name);
            @endphp
            <!--<a class="openTaller" href="#modalTaller{{$t->id}}" rel="modal:open">Ver más...</a>-->
            <a href="{{url('/taller/'.$name.'/'.$t->id)}}">Ver más...</a>
          @php
              $validate_shop = false;
          @endphp
            @if(session()->has('id'))
                @php
                    setlocale(LC_ALL,"es_ES");
                    $date = date("Y-m-d");
                    $tallerP = \App\Models\TallerPurchase::where('taller_id',$t->id)
                      ->where('user_id',session()->get('id'))
                      ->where('status',1)
                      ->orderBy('id','desc')
                      ->get();
                @endphp
                @if($tallerP->count() > 0)
                    @php
                        $validate_shop = true;
                    @endphp
                    <a href="{{url('/taller/'.$name.'/'.$t->id)}}">ADQUIRIDO</a>
                @else
                    <a href="{{url('/taller/'.$name.'/'.$t->id)}}">comprar</a>
                @endif
            @else
                <a href="{{url('/taller/'.$name.'/'.$t->id)}}" class="buyTallerLogin">comprar</a>
            @endif
        </div>
      </div>
    </div>

    <!--MODAL TALLERES-->

    <div id="modalTaller{{$t->id}}" class="modal modalTaller">
      <h1>Taller</h1>
      <hr>
      <div class="colflex contDescriptionTaller">
        <div class="colflex descriptionTaller">
          <h2>{{$t->titulo}}</h2>
          <p>{!!$t->descripcion!!}</p>
          <h3>¿Qué aprenderás en este taller?</h3>
          <ul style="list-style-image: url('{{asset('./img/ok.svg')}}')">
            @php
              $items = \App\Models\ItemTalleres::where('taller_id',$t->id)->get();
            @endphp
            @if(count($items) > 0)
              @foreach($items as $item)
                <li>{{$item->item_taller}}</li>
              @endforeach
            @endif
          </ul>
            @php
                $name = str_replace(' ','-',$t->titulo);
                $name = strtolower($name);
                $name = preg_replace('([^A-Za-z0-9 -])', '', $name);
                $name = str_replace(array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),$name);
                $name = str_replace(array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),$name);
                $name = str_replace(array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),$name);
                $name = str_replace(array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),$name);
                $name = str_replace(array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),$name);
                $name = str_replace(array('Ñ', 'ñ', 'Ç', 'ç'),array('N', 'n', 'C', 'c'),$name);
            @endphp
          <a href="{{url('/taller/'.$name.'/'.$t->id)}}" class="btn_course_modal">VER TALLER</a>
        </div>
        <div class="colflex buyTaller">
          <img src="{{asset($t->portada)}}" alt="portada taller">
            @if(session()->has('id'))
                @if($validate_shop == true)
                    @if($t->link == 'En espera' || $t->link == '')
                        <a>En espera</a>
                    @else
                        <a href="{{$t->link}}" target="_blank">IR AL LINK</a>
                    @endif
                    <a>FECHA {{$t->date}}</a>
                @else
                    <a class="buyTallerGo" id="{{$t->id}}">compralo ahora</a>
                @endif
            @else
                <a href="#shopModal" class="ctaLogin buyTallerLogin" id="{{$t->id}}" rel="modal:open">compralo ahora</a>
                <a href="#loginModal" class="ctaLogin buyTallerLogin" id="{{$t->id}}" rel="modal:open">iniciar sesión</a>
            @endif
        </div>
      </div>
    </div>

    @endforeach
  </div>
</section>
