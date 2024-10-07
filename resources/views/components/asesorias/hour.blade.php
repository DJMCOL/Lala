<h5>
    Hora
</h5>
<select name="hourServiceSolic" id="hourServiceSolic" onchange="getValueService(this)">
    <option value="">Seleccionar</option>
    @foreach($dataHour as $key => $d)
        @php
            $serviceP = \App\Models\ServicePurchase::where('validate_date',1)
            ->where('date',$date)
            ->where('clock',$d->id)
            ->get();
        @endphp
        @if($serviceP->count() == 0)
            <option value="{{$d->id}}">{{$d->hour}}</option>
        @endif
    @endforeach
</select>
<script>
    function getValueService(sel){
        $('#hourService').val(sel.value);
    }
</script>
