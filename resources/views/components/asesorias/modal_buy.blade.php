<div class="colflex contAsesorias">
    <div class="colflex descriptionAsesoria">
        <h2>{{$a->titulo}}</h2>
        <p>{{$a->descripcion}}</p>
        <h3>¿Qué aprenderás en esta asesoría?</h3>
        <ul style="list-style-image: url('{{asset('./img/ok.svg')}}')">
            @php
                $items = \App\Models\ItemAsesorias::where('asesoria_id',$a->id)->get();
            @endphp
            @if(count($items) > 0)
                @foreach($items as $i)
                    <li>{{$i->item_asesoria}}</li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="colflex buyAsesoria">
        <img src="{{asset($a->portada)}}" alt=portadaAsesoria"">
        <a>FECHA: {{$courseBuy->date}}</a>
        <a>HORA: {{$courseBuy->hour->name}}</a>
        @php
            setlocale(LC_ALL,"es_ES");
            $date = date("Y-m-d");
            $courseP_v = \App\Models\ServicePurchase::where('service_id',$a->id)
              ->where('user_id',session()->get('id'))
              ->where('date','>=',$date)
              ->where('status','!=',1)
              ->where('validate_date',1)
              ->orderBy('id','desc')
              ->get();
        @endphp
        @if($courseP_v->count() > 0)
            <a href="{{url('/pay_again/'.$courseP_v[0]->id)}}">PAGAR LA RESERVA</a>
        @endif
    </div>
</div>
